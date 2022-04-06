(function(){

    var pwdcurrent = document.getElementById('current');
    var pwdnew = document.getElementById('new');
    var pwdrepeat = document.getElementById('repeat');
    var btnchange = document.getElementById('btnchange');
    
    var onChange = function(e){
        e.preventDefault();
    
        var txtcurrent = document.getElementById('current').value;
        var txtnew = document.getElementById('new').value;
        var textrepeat = document.getElementById('repeat').value;
    
        if(txtcurrent){
            if(txtnew.length >= 8){
                if(txtnew == textrepeat){
                    
                    var json = {
                        current: txtcurrent,
                        pwdnew: txtnew
                    }
                    
                    $.ajaxSetup({
                        headers:{'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}
                    });
    
                    $.ajax({
                        type:'post',
                        url: 'pwd',
                        data: json,
                        dataType: 'json',
                        success:function(response){
                            
                            if (response == 'ok') {
                                Swal.fire({
                                    title: "Registro Exitoso!",
                                    text: "¡Las credenciales se actualizaron exitosamente!",
                                    icon: "success"
                                }).then(function() {
                                    window.location.href = "security";
                                });                            
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: '¡Contraseña incorrecta!'
                                });
                                pwdcurrent.className += ' is-invalid';
                                document.getElementById("new").classList.remove('is-invalid');
                                document.getElementById("repeat").classList.remove('is-invalid');
                            }
                        },error:function(response) {
                            console.log('response');
                        }
                    }); 
    
                }else{
                    console.log('Las contraseñas no coinciden');
                    pwdnew.className += ' is-invalid';
                    pwdrepeat.className += ' is-invalid';
                }
            }else{
                console.log('su nueva contraseña debe tener mas de 8 caracteres');
                pwdnew.className += ' is-invalid';
            }
        }else{
            console.log('escriba su contraseña antual');
            pwdcurrent.className += ' is-invalid';
        }
    
    }
        
    pwdcurrent.onchange = function(){document.getElementById("current").classList.remove('is-invalid');};
    pwdnew.onchange = function(){document.getElementById("new").classList.remove('is-invalid');};
    pwdrepeat.onchange = function(){document.getElementById("repeat").classList.remove('is-invalid');};
    
    btnchange.addEventListener('click', onChange);
    }())