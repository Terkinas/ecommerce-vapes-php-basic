(function($) {

	$(document).ready(function() {

        "use strict"

        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var stripe = Stripe($('#stripe_publishable').val());

        var donateButton = $('#donate');
        donateButton.prop('disabled',true);

        var customer_checkbox = $('#link-checkbox');

        customer_checkbox.change(
            function(){
                if ($(this).is(':checked')) {
                    donateButton.prop('disabled',false);
                }
                else {
                    donateButton.prop('disabled',true);
                }
            });
        
        donateButton.on('click', function(e) {
            e.preventDefault();
            donateButton.prop('disabled',true);
            var amount = document.getElementById('amount').value;
            var customer_email = document.getElementById('customer_email').value;


            document.getElementById('payicon').style.display = 'none';
            document.getElementById('payloadingicon').classList.add('opacity-100');
            
            
            if(amount=='' || customer_email==''){
                alert('Type in your email');
                return;
            }
            $.ajax({
        
                url: '/stripe/initiateCheckout',
                type: 'POST',
                
                data: {
                    amount: 10,
                    email: customer_email
                },
                
                success: function (data) { 
                    stripe.redirectToCheckout({
                        sessionId: data
                    })
                },
                error : function (data){
                    donateButton.prop('disabled',false);
                    alert('Something went wrong!');
                    
                }
            });


            
            
            
        });

    })

})(jQuery);	