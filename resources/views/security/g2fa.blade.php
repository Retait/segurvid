@extends('adminlte::page')

@section('title', 'Google Auth')

@section('content_header')
    <h5><strong>{{__('Autenticación')}}</strong></h5>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-8 col-md-8">

        <div class="card shadow">
            <div class="card-body p-0">
              <div class="bs-stepper linear">
                <div class="bs-stepper-header" role="tablist">
                  <!-- your steps here -->
                  <div class="step active" data-target="#download-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="download-part" id="download-part-trigger" aria-selected="true">
                      <span class="bs-stepper-circle">1</span>
                      <span class="bs-stepper-label"></span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#scanner-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="scanner-part" id="scanner-part-trigger" aria-selected="false" disabled="disabled">
                      <span class="bs-stepper-circle">2</span>
                      <span class="bs-stepper-label"></span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#recovery-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="recovery-part" id="recovery-part-trigger" aria-selected="false" disabled="disabled">
                      <span class="bs-stepper-circle">3</span>
                      <span class="bs-stepper-label"></span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#enable-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="enable-part" id="enable-part-trigger" aria-selected="false" disabled="disabled">
                      <span class="bs-stepper-circle">4</span>
                      <span class="bs-stepper-label"></span>
                    </button>
                  </div>
                </div>
                <div class="bs-stepper-content">
                  <!-- your steps content here -->
                    <div id="download-part" class="content active dstepper-block" role="tabpanel" aria-labelledby="download-part-trigger">
                        <div class="row justify-content-center mt-5 mb-5">
                            <div class="col-12 col-lg-6 col-md-6">
                                <h4 class="text-center"><strong>{{__('Descarga e instala la aplicación de autenticación de google')}}</strong></h4>                                
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-6 col-lg-3 col-md-3 text-center">
                                <!--a href="" class="btn btn-block btn-default btn-sm">Descargar</a>
                                <i class="fab fa-3x fa-apple text-secondary"></i>
                                <p>App Store</p-->
                                <a href="https://apps.apple.com/pe/app/google-authenticator/id388497605" target="_blank" class="btn btn-default btn-block text-secondary">
                                    <i class="fab fa-3x fa-apple pt-3 pb-3"></i>
                                </a>
                            </div>
                            <div class="col-6 col-lg-3 col-md-3 text-center">
                                <!--a href="" class="btn btn-block btn-default btn-sm">Descargar</a>
                                <i class="fab fa-3x fa-android text-secondary"></i>
                                <p>Play Store</p-->
                                <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2" target="_blank" class="btn btn-default btn-block text-secondary">
                                    <i class="fab fa-3x fa-android pt-3 pb-3"></i>
                                </a>
                            </div>                            
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-6 col-md-6 mt-5">
                                <p class="text-justify">También puedes acceder a tu tienda móvil y descargar la app <strong>Google Authenticator</strong> o hacerlo a través de nuestros enlaces.</p>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-6 col-md-6">                              
                                <button class="btn btn-default float-right" onclick="stepper.next()">Siguiente</button>
                            </div>
                        </div>
                    </div>
                  <div id="scanner-part" class="content" role="tabpanel" aria-labelledby="scanner-part-trigger">
                    <div class="row justify-content-center mt-5 mb-5">
                        <div class="col-12 col-lg-6 col-md-6">
                            <h4 class="text-center"><strong>{{__('Escanea el código QR desde tu App Google Authenticator')}}</strong></h4>                                
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="text-center img-fluid">
                                {!! $QR_Image !!}
                            </div>
                            <h5 class="text-center text-secondary text-bold">{{ $secret }}</h5>
                            <br>
                            <p class="text-justify">{{__('Configure su autenticación de dos factores escaneando el código QR desde su aplicativo móvil o introduce el código manualmente.')}}</p>
                            
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6 col-md-6">                                
                            <button class="btn btn-default" onclick="stepper.previous()">Anterior</button>
                            <button class="btn btn-default float-right" onclick="stepper.next()">Siguiente</button>
                        </div>
                    </div>
                  </div>
                  <div id="recovery-part" class="content" role="tabpanel" aria-labelledby="recovery-part-trigger">
                    <div class="row justify-content-center mt-5 mb-5">
                        <div class="col-12 col-lg-6 col-md-6">
                            <h4 class="text-center"><strong>{{__('Guarda esta clave de recuperación en un lugar seguro')}}</strong></h4>                                
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="text-center img-fluid">
                                <i class="fas fa-5x fa-file-signature text-secondary"></i>
                            </div>
                            <br>
                            <h5 class="text-center text-secondary text-bold">{{ $secret }}</h5>
                            <br>
                            <p class="text-justify">{{__('Esta clave te permitirá recuperar la autenticación si pierdes tu dispositivo móvil. De lo contrario el restablecimiento del autenticador de google tardará 7 dias.')}}</p>
                            
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6 col-md-6">                               
                            <button class="btn btn-default" onclick="stepper.previous()">Anterior</button>
                            <button class="btn btn-default float-right" onclick="stepper.next()">Siguiente</button>
                        </div>
                    </div>
                  </div>
                  <div id="enable-part" class="content" role="tabpanel" aria-labelledby="enable-part-trigger">
                    <div class="row justify-content-center mt-5 mb-5">
                        <div class="col-12 col-lg-6 col-md-6">
                            <h4 class="text-center"><strong>{{__('Habilita la aplicación de autenticacón verificando tu cuenta')}}</strong></h4>                                
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6 col-md-6">
                            <p>{{__('Introduce el código de 6 digitos de la aplicacion de autenticación de google.')}}</p>
                            <div class="form-group" id="auth">
                                <label for="">{{('Código de autenticación')}}</label>
                                <input type="text" class="form-control" name="code" id="code" maxlength="6" placeholder="__ __ __ __ __ __">
                            </div>
                            <div class="form-group">
                                
                            </div>
                        </div>                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6 col-md-6">                               
                            <button class="btn btn-default" onclick="stepper.previous()">Anterior</button>
                            <button class="btn btn-dark float-right" id="btnenable">{{__('Activar')}}</button>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('bs-stepper/css/bs-stepper.min.css') }}">
@stop

@section('js')
    <script src="{{ asset('bs-stepper/js/bs-stepper.min.js') }}"></script>
    <script src="{{ asset('js/eg2fa.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
      });
    </script>
@stop