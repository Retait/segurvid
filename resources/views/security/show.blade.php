@extends('adminlte::page')

@section('title', 'Security')

@section('content_header')
    <h5><strong>{{('Seguridad')}}</strong></h5>
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="row">            
            <div class="col-md-12">
                <div class="info-box bg-default shadow">
                    <span class="info-box-icon"><i class="fab fa-google text-secondary"></i></span>        
                    <div class="info-box-content">
                        <div class="row">
                            <div class="col-12 col-lg-10 col-md-10 col-sm-10"><h5>{{ __('Google Authentication')}}</h5></div>
                            <div class="col-12 col-lg-2 col-md-2 col-sm-2">
                                @if (Auth::user()->two_factor_secret)
                                    <button type="button" class="btn btn-block btn-dark btn-sm float-right" data-toggle="modal" data-target="#disable">{{__('Disable')}}</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="disable" tabindex="-1" role="dialog" aria-labelledby="disableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">                        
                                                <form action="{{ route('dg2fa')}}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <h5>{{__('Confirmar Password')}}</h5>
                                                        <p class="text-justify">{{__('For your security, please confirm your password to continue.')}}</p>
                                                        <div class="form-group">
                                                            <input type="password" class="form-control" name="pg2fa" id="pg2fa" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Cancelar')}}</button>
                                                        <button type="submit" class="btn btn-dark">{{__('Deshabilitar')}}</button>
                                                    </div>
                                                </form>                    
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <button class="btn btn-block btn-dark btn-sm float-right" data-toggle="modal" data-target="#enable">{{__('Enable')}}</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="enable" tabindex="-1" role="dialog" aria-labelledby="enableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('g2fa')}}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <h5>{{__('Confirmar Password')}}</h5>
                                                        <p class="text-justify">{{__('For your security, please confirm your password to continue.')}}</p>
                                                        <div class="form-group">
                                                            <input type="password" class="form-control" name="pg2fa" id="pg2fa" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Cancelar')}}</button>
                                                        <button type="submit" class="btn btn-dark">{{__('Habilitar')}}</button>
                                                    </div>
                                                </form>                    
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <p class="text-justify">{{ __('Agregue seguridad a su cuenta mediante la autenticación de dos factores')}}</p>
                    </div>                    
                </div>                
            </div>
            <div class="col-md-12">
                <div class="info-box bg-default shadow">
                    <div class="info-box-content">
                        <div class="row">
                            <div class="col-12">
                                <h5>{{ __('Login Password')}}</h5>
                                <p class="text-justify">{{__('Asegúrese de que su cuenta esté usando una contraseña larga y aleatoria para mantenerse seguro')}}</p>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="currently" class="col-sm-4 col-form-label">{{__('Contraseña Actual')}}</label>
                                    <div class="col-sm-8">
                                      <input type="password" class="form-control" name="current" id="current" placeholder="*******">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="currently" class="col-sm-4 col-form-label">{{__('Nueva Contraseña')}}</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" minlength="8" name="new" id="new" placeholder="*******">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="currently" class="col-sm-4 col-form-label">{{__('Repita Contraseña')}}</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" minlength="8" name="repeat" id="repeat" placeholder="*******">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="button" id="btnchange" class="btn btn-block btn-dark float-right">{{ __('Cambiar')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
            <div class="col-md-12">
                <div class="info-box bg-default shadow">
                    <span class="info-box-icon"><i class="fas fa-user-secret text-secondary"></i></span>        
                    <div class="info-box-content">
                        <div class="row">
                            <div class="col-12 col-lg-10 col-md-10 col-sm-10"><h5>{{ __('Account activity')}}</h5></div>
                            <div class="col-12 col-lg-2 col-md-2 col-sm-2">
                                <button type="button" class="btn btn-block btn-dark btn-sm float-right">{{ __('More')}}</button>
                            </div>
                        </div>
                        <ul class="list-unstyled">
                        @foreach ($session as $se)
                            <li><i class="fas fa-desktop text-secondary"></i>&nbsp;{{ date("Y-m-d H:i:s", $se->last_activity)}}</li>
                        @endforeach
                        </ul>
                    </div>                    
                </div>                
            </div>  
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <div class="info-box bg-default shadow">
                    <div class="overlay dark">
                        <i class="fas fa-3x fa-lock"></i>
                    </div>
                    <span class="info-box-icon"><i class="fas fa-comment text-secondary"></i></span>        
                    <div class="info-box-content">
                        <div class="row">
                            <div class="col-12 col-lg-10 col-md-10 col-sm-10"><h5>{{ __('SMS Authentication')}}</h5></div>
                            <div class="col-12 col-lg-2 col-md-2 col-sm-2">
                                <button type="button" class="btn btn-block bg-gradient-warning btn-sm float-right">{{ __('Enable')}}</button>
                            </div>
                        </div>
                        <p class="text-justify">{{ __('Used for withdrawals and security modifications')}}</p>
                    </div>                    
                </div>                
            </div>
            <div class="col-md-12">
                <div class="info-box bg-default shadow">                    
                    <div class="overlay dark">
                        <i class="fas fa-3x fa-lock"></i>
                    </div>
                    <div class="info-box-content">
                        <div class="row">
                            <div class="col-12 col-lg-10 col-md-10 col-sm-10"><h5>{{ __('Device Managment')}}</h5></div>
                            <div class="col-12 col-lg-2 col-md-2 col-sm-2">
                                <button type="button" class="btn btn-block bg-gradient-warning btn-sm float-right">{{ __('Manage')}}</button>
                            </div>
                        </div>                        
                    </div>                    
                </div>                
            </div>   
            <div class="col-md-12">
                <div class="info-box bg-default shadow">
                    <div class="overlay dark">
                        <i class="fas fa-3x fa-lock"></i>
                    </div>
                    <div class="info-box-content">
                        <div class="row">
                            <div class="col-12 col-lg-10 col-md-10 col-sm-10"><h5>{{ __('Address Management')}}</h5></div>
                            <div class="col-12 col-lg-2 col-md-2 col-sm-2">
                                <button type="button" class="btn btn-block bg-gradient-warning btn-sm float-right">{{ __('Manage')}}</button>
                            </div>
                            <div class="col-10">
                                <p class="text-justify">
                                    {{ __('Address Management allows you to save and write memos for each of your withdrawal addresses. 
                                    The optional Whitelist function helps protect your funds by only allowing withdrawals to whitelisted addresses.')}}
                                </p> 
                            </div>
                        </div>                        
                          <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-default custom-switch-on-warning">
                                <input type="checkbox" class="custom-control-input" id="customSwitch3">
                                <label class="custom-control-label" for="customSwitch3">Whitelist Off</label>                                
                            </div>
                          </div>                                                       
                    </div>                    
                </div>                
            </div>
            <div class="col-md-12">
                <div class="info-box bg-default shadow">                    
                    <div class="overlay dark">
                        <i class="fas fa-3x fa-lock"></i>
                    </div>
                    <div class="info-box-content">
                        <div class="row">
                            <div class="col-12 col-lg-10 col-md-10 col-sm-10"><h5>{{ __('Anti-phishing Code')}}</h5></div>
                            <div class="col-12 col-lg-2 col-md-2 col-sm-2">
                                <button type="button" class="btn btn-block bg-gradient-warning btn-sm float-right">{{ __('Enable')}}</button>
                            </div>
                            <div class="col-10">
                                <p class="text-justify">
                                    {{ __('By setting up an Anti-Phishing Code, 
                                    you will be able to tell if your notification emails are coming from Lassos or phishing attempts.')}}
                                </p> 
                            </div>
                        </div> 
                                              
                    </div>                    
                </div>                
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
@if (session('error') == 'done')
<script>
    Swal.fire(
    'Ooops!',
    'Los datos ingresados no son correctos.',
    'error')
</script>
@endif
@if (session('disable') == 'done')
<script>
    Swal.fire(
    '¡Hecho!',
    'Autenticación desabilitada exitosamente.',
    'success')
</script>
@endif
<script src="{{ asset('js/pwd.js') }}"></script>
@stop