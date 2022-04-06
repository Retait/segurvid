(function(){

    var amount = document.getElementById('amount');
    var date = document.getElementById('date');
    var receipt = document.getElementById('receipt');

    var btnpayment = document.getElementById('btnpayment');

    var validateReceipt = function(e){
        var receipt = document.getElementById('receipt');
        if(receipt.value == 0 || receipt.value == ""){
            e.preventDefault();
            receipt.className += ' is-invalid';
            return 0;                
        }
    };

    var validateDate = function(e){            
        if(!$('#date').val().trim().length){
            e.preventDefault();
            var date = document.getElementById('date');
            date.className += ' is-invalid';
            return 0;                
        }
    };

    var validateAmount = function(e){            
        if(!$('#amount').val().trim().length){
            e.preventDefault();
            var amount = document.getElementById('amount');
            amount.className += ' is-invalid';
            return 0;                
        }
    };

    var validate = function(e){
        e.preventDefault();
        var odid = document.getElementById('odid').value;
        var deposit = document.getElementById('amount').value;
        var date = document.getElementById('date').value;
        var receipt = document.getElementById('receipt').value;

        // var order_id = json($deposit);
        // var deposit = json($vior['odid']);

        //window.order_id='<?php echo $_SESSION["vior"]; ?>';
        // var order_id = "{{Session::get(['vior'])}}";
        // var deposit = ' {{Session::get(["deposit"])}}';

        validateAmount(e);
        validateDate(e);
        validateReceipt(e);
        if (validateAmount(e) != 0 && 
            validateDate(e) != 0 && 
            validateReceipt(e) != 0 ){

            var json = {
                odid,
                deposit,
                date,
                receipt
            }
            
            $.ajaxSetup({
                headers:{'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}
            });
    
            $.ajax({
                type:'post',
                url: '/admin/invoice/store',
                data: json,
                dataType: 'json',
                success:function(response){
                    
                    if (response == 'ok') {
                        Swal.fire({
                            title: "¡Venta Exitosa!",
                            text: "La venta se realizó satisfactoriamente",
                            icon: "success"
                        }).then(function() {
                            window.location.href = "/admin/case/list";
                        });                            
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '¡Error en la operación!'
                            });
                    }
                },error:function(response) {                
                    console.log(response);
                }
            }); 
        }
    };

    amount.onchange = function(){document.getElementById("amount").classList.remove('is-invalid');};
    date.onchange = function(){document.getElementById("date").classList.remove('is-invalid');};
    receipt.onchange = function(){document.getElementById("receipt").classList.remove('is-invalid');};
    
    btnpayment.addEventListener('click', validate);

}())
