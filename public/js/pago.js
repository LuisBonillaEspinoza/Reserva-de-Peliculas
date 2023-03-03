Stripe.setPublishableKey('pk_test_51MhLJgFYyzBeMD9ZC33t90BryKtprPoLqt0zyQU1IaKR9qRMf5VfiEMFQMcDyUhK8H2hDwqN3dngVODWtmMS3pnp009UCHAn5m');

var form = $('#formulario_pago');

form.submit(function(event){
    $('charge-error').addClass('hidden');
    
    form.find('button').prop('disabled',true);

    Stripe.createToken({
        number : $('#card_numero').val(),
        cvc : $('#card_cvc').val(),
        exp_month : $('#card_expiracion_mes').val(),
        exp_year : $('#card_expiracion_anio').val(),
        // name : $('#card_nombre').val()
    },stripeResponseHandler);
    return false;
});

function stripeResponseHandler(status,response){
    if(response.error){
        $('charge-error').removeClass('hidden');
        $('charge-error').text(response.error.message);

        form.find('button').prop('disabled',false);
    }
    else{
        var token = response.id;
        form.append($('<input type="hidden" name="stripeToken" />').val(token));

        form.get(0).submit();
    }
}
