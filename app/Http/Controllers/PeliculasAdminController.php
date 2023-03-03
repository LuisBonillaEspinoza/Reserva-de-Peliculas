<?php

namespace App\Http\Controllers;

use App\Models\Peliculas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Categoria;
use App\Models\Carrito;
use App\Http\Requests\PeliculasRequest;
//Para validar
use Illuminate\Support\Facades\Auth;
Use Session;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
use App\Models\Ordenes;
use App\Models\DetalleOrden;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\CompraMail;
use Illuminate\Support\Facades\Mail;

class PeliculasAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->rol_user == 1){
            return view('administrador.peliculas.index');
        }
        else if(!Auth::check()){
            return redirect()->route('peliculas.no-login');
        }
        return view('user.peliculas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::check() && Auth::user()->rol_user == 2){
            return redirect()->route('login.index');
        }
        else if(!Auth::check()){
            return redirect()->route('peliculas.no-login');
        }

        $categoria = Categoria::all();
        return view('administrador.peliculas.create',compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PeliculasRequest $request)
    {
        
        $datos = $request->validated();

        $filename = time().'_'.$datos['file_pelicula']->getClientOriginalName();
        $filesize = $datos['file_pelicula']->getSize();
        $datos['file_pelicula']->storeAs('public/'.$filename);

        $peliculas = new Peliculas;
        $peliculas->nombre_pelicula = $datos['nombre_pelicula'];
        $peliculas->precio_pelicula = $datos['precio_pelicula'];
        $peliculas->descripcion_pelicula = $datos['descripcion_pelicula'];
        $peliculas->path_pelicula = $filesize;
        $peliculas->imagen_pelicula = $filename;
        $peliculas->estado_pelicula = '1';
        $peliculas->estreno_pelicula = '1';
        $peliculas->categoria_pelicula = $datos['categoria_pelicula'];

        $peliculas->save();

        return redirect()->route('peliculas.create')->with('success','Pelicula Registrada Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peliculas $peliculas)
    {
        if(Auth::check() && Auth::user()->rol_user == 1){
            return view('administrador.peliculas.show',compact('peliculas'));
        }
        else if(!Auth::check()){
            return redirect()->route('peliculas.no-login');
        }
        return view('user.peliculas.show',compact('peliculas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peliculas $peliculas)
    {
        if(Auth::check() && Auth::user()->rol_user == 2){
            return redirect()->route('login.index');
        }
        else if(!Auth::check()){
            return redirect()->route('peliculas.no-login');
        }

        $categoria = Categoria::all();
        return view('administrador.peliculas.edit',compact('peliculas','categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PeliculasRequest $request,$id_pelicula)
    {
        if(Auth::check() && Auth::user()->rol_user == 2){
            return redirect()->route('login.index');
        }
        else if(!Auth::check()){
            return redirect()->route('login.index');
        }

        $categoria = Categoria::all();

        $datos = $request->validated();

        $peliculas = Peliculas::find($id_pelicula);

        $peliculas->nombre_pelicula = $datos['nombre_pelicula'];
        $peliculas->precio_pelicula = $datos['precio_pelicula'];
        $peliculas->descripcion_pelicula = $datos['descripcion_pelicula'];
        $peliculas->estado_pelicula = '1';
        $peliculas->estreno_pelicula = '1';
        $peliculas->categoria_pelicula = $datos['categoria_pelicula'];

        if($datos['file_pelicula']){

            $guardado = public_path().'/storage/'.$peliculas->imagen_pelicula;
            unlink($guardado);

            $filename = time().'_'.$datos['file_pelicula']->getClientOriginalName();
            $filesize = $datos['file_pelicula']->getSize();
            $datos['file_pelicula']->storeAs('public/'.$filename);

            $peliculas->path_pelicula = $filesize;
            $peliculas->imagen_pelicula = $filename;
    
        }

        $peliculas->save();

        return view('administrador.peliculas.edit',compact('peliculas','categoria'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peliculas $peliculas): RedirectResponse
    {
        //
    }

    //Añadir un producto al carrrito
    public function anadir_carrito($id_pelicula, Request $request){
        
        $peliculas = Peliculas::find($id_pelicula);
        $oldCart = Session::has('carrito') ? Session::get('carrito') : null;

        $carrito = new Carrito($oldCart);
        $carrito->añadir($peliculas,$id_pelicula);

        $request->session()->put('carrito',$carrito);
        return redirect()->route('peliculas.index');
    }

    //Obtener la vista del carrito
    public function carrito(){
        if(!Session::has('carrito')){
            return redirect()->route('peliculas.carrito_datos');
        }

        $oldCart = Session::get('carrito');
        $carrito = new Carrito($oldCart);
        
        $peliculas_carrito = $carrito->peliculas;
        $precio_carrito = $carrito->total_precio;
        return view('user.carrito.index',compact('precio_carrito','peliculas_carrito'));
    }

    //Obtener la vista del pago
    public function pago(){
        if(!Session::has('carrito')){
            return redirect()->route('peliculas.carrito_datos');
        }

        $oldCart = Session::get('carrito');

        $carrito = new Carrito($oldCart);
        $total = $carrito->total_precio;
        return view('user.pago.index',compact('total'));
    }

    //Realizar Pago
    public function realizar_pago(Request $request){
        if(!Session::has('carrito')){
            return redirect()->route('peliculas.carrito_datos');
        }

        $oldCart = Session::get('carrito');
        $carrito = new Carrito($oldCart);

        Stripe::setApiKey('sk_test_51MhLJgFYyzBeMD9ZENn67ucu35Mu8cxvp8elDnzj9hasIVTCBcj9ikgbLs69XOyjEIHRKu3HLxgNx5fRFQID0DBw00AcEpPIR8');

        $customer = Customer::create(array(

            "address" => [
                
                    "line1" => "Virani Chowk",
                    "postal_code" => "360001",
                    "city" => "Rajkot",
                    "state" => "GJ",
                    "country" => "IN",

                ],

            "email" => "demo@gmail.com",

            "name" => "Hardik Savani",

            "source" => $request->stripeToken

         ));

        try{
            Charge::create(array(
                'amount' => $carrito->total_precio*100,
                'currency' => 'usd',
                'source' => $request->input('stripeToken'),
                'description' => 'Prueba',
                "customer" => 'cus_NSHeHgWA15sSZd'
            ));
        }
        catch(\Exception $e){
            return redirect()->route('pago.index')->with('error',$e->getMessage());
        }

        //Guardar pago en la base de datos
        $ordenes = new Ordenes;

        $ordenes->id_usuario = Auth::user()->id;

        $ordenes->save();

        $detalle_orden = new DetalleOrden;
        $peliculas_carrito = $carrito->peliculas;
        $total_carrito = $carrito->total_precio;
        $ultima_orden = Ordenes::latest('id')->first();

        foreach($peliculas_carrito as $peliculas_carritos){
            $detalle_orden->nombre_detalle = $peliculas_carritos['pelicula']['nombre_pelicula'];
            $detalle_orden->precio_detalle = $peliculas_carritos['precio'];
            $detalle_orden->cantidad_detalle = $peliculas_carritos['cantidad'];
            $detalle_orden->bruto_detalle = $peliculas_carritos['precio'] * $peliculas_carritos['cantidad'];
            $detalle_orden->id_pelicula = $peliculas_carritos['pelicula']['id'];
            $detalle_orden->id_orden = $ultima_orden['id'];
        }

        $detalle_orden->save();

        $ultima_orden->neto_ordenes = $carrito->total_precio;
        $ultima_orden->save();

        $data['email'] = Auth::user()->email_user;
        $data['titulo'] = "Envio de Comprobante";
        $data['total_carrito'] = $carrito->total_precio;
        $data['peliculas_carrito'] = $carrito->peliculas;
        $data['body'] = "Compra exitosa, puede ver los detalles en el siguiente PDF";

        $pdf = Pdf::loadView('compra',$data);
        // $pdf->stream('compra.pdf');

        // Mail::to(Auth::user()->email_user)->send(new CompraMail());

        Mail::send('compra',$data,function($message) use ($data,$pdf){
            $message->to($data['email'], $data['email'])
            ->subject($data['titulo'])
            ->attachData($pdf->output(),"comprobante.pdf");
        });

        Session::forget('carrito');
        return redirect()->route('peliculas.index');
    }

    public function pdf(){
        $oldCart = Session::get('carrito');
        $carrito = new Carrito($oldCart);

        $peliculas_carrito = $carrito->peliculas;
        $total_carrito = $carrito->total_precio;
        //Generar PDF
        $pdf = Pdf::loadView('compra',compact('peliculas_carrito','total_carrito'));
        return $pdf->download('compra.pdf');
    }
}
