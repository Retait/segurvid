(function(){
    
    var div = document.getElementById('auth');
    var input = document.getElementById('code');
    var btnenable = document.getElementById('btnenable');

    var onSubmit = function(e){
    e.preventDefault();

        var code = document.getElementById('code').value;
        var validate = /^[0-9]+$/;

        var span = document.createElement('span');
        span.setAttribute('class','text-danger text-sm');
        var txtnull  = document.createTextNode('');

        if(code.length == 6){
        
            if(code.match(validate)){
                
                
                var json = {
                    dato: code
                }
                
                $.ajaxSetup({
                    headers:{'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}
                });

                $.ajax({
                    type:'post',
                    url: 'enable2fa',
                    data: json,
                    dataType: 'json',
                    success:function(response){
                        
                        if (response == 'ok') {
                            Swal.fire({
                                title: "Activación exitosa!",
                                text: "Google Authenticator se activo satisfactoriamente!",
                                icon: "success"
                            }).then(function() {
                                window.location.href = "/security";
                            });                            
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Código incorrecto!'
                              })
                        }
                    },error:function(response) {
                        console.log('response');
                    }
                }); 

            }else{
                span.appendChild(txtnull);
                var txtempty  = document.createTextNode('Please text only numbers');
                span.appendChild(txtempty);
                input.className += ' is-invalid';
            }
        }else{
            span.appendChild(txtnull);
            var txtempty  = document.createTextNode('Insert the 6 digit code.');
            span.appendChild(txtempty);
            input.className += ' is-invalid';
        }
    }

    input.onchange = function(){
        document.getElementById("code").classList.remove('is-invalid');        
    };
        
    btnsubmit.addEventListener('click', onSubmit);
}())