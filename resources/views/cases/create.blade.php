@extends('adminlte::page')

@section('title', 'Cases')

@section('content_header')
    <h5><strong>{{__('Registrar Casos')}}</strong></h5>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-md-10">
          <form action="{{ route('case.store')}}" method="POST">
          @csrf
            <div class="card shadow">
                <div class="card-body p-0">
                  <div class="bs-stepper linear">
                    <div class="bs-stepper-header" role="tablist">
                      <!-- your steps here -->
                      <div class="step active" data-target="#customer-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="customer-part" id="customer-part-trigger" aria-selected="true">
                          <span class="bs-stepper-circle">1</span>
                          <span class="bs-stepper-label"></span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#accident-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="accident-part" id="accident-part-trigger" aria-selected="false" disabled="disabled">
                          <span class="bs-stepper-circle">2</span>
                          <span class="bs-stepper-label"></span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#order-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="order-part" id="order-part-trigger" aria-selected="false" disabled="disabled">
                          <span class="bs-stepper-circle">3</span>
                          <span class="bs-stepper-label"></span>
                        </button>
                      </div>
                    </div>
                    <div class="bs-stepper-content">
                      <!-- your steps content here -->
                      <div id="customer-part" class="content active dstepper-block" role="tabpanel" aria-labelledby="customer-part-trigger">
                          <div class="row">
                              <div class="col-md-12">
                                <div class="form-row">
                                  <div class="form-group col-lg-6 col-md-6">
                                    <label for="">{{__('ID')}}</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" name="code" id="code" maxlength="8" style="text-transform:uppercase">
                                      <span class="input-group-append">
                                        <button type="button" id="btnsearch" class="btn btn-dark btn-flat"><i class="fas fa-search"></i></button>
                                      </span>
                                    </div>
                                    
                                  </div>
                                  <div class="form-group col-lg-6 col-md-6">
                                    <label for="">{{__('Nombres del Paciente')}}</label>
                                    <input type="text" class="form-control" name="customer" id="customer" style="text-transform:uppercase">
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-lg-4 col-md-4">
                                    <label for="">{{__('Móvil')}}</label>
                                    <input type="tel" class="form-control" name="mobile_customer" id="mobile_customer">
                                  </div>
                                  <div class="form-group col-lg-4 col-md-4">
                                    <label for="">{{__('Teléfono')}}</label>
                                    <input type="tel" class="form-control" name="phone_customer" id="phone_customer">
                                  </div>
                                  <div class="form-group col-lg-4 col-md-4">
                                    <label for="">{{__('Correo Electrónico')}}</label>
                                    <input type="email" class="form-control" name="email" id="email" style="text-transform:uppercase">
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-lg-4 col-md-4">
                                    <label for="">{{__('País')}}</label>
                                    <select name="country" id="country" class="form-control">
                                      <option value=""></option>
                                      @foreach ($country as $ct)
                                      <option value="{{ $ct['id'] }}">{{ $ct['name_country'] }}</option>                                          
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group col-lg-4 col-md-4">
                                    <label for="">{{__('Ciudad')}}</label>
                                    <input type="text" name="city" id="city" class="form-control" style="text-transform:uppercase">
                                  </div>
                                  <div class="form-group col-lg-4 col-md-4">
                                    <label for="">{{__('Dirección')}}</label>
                                    <input type="text" class="form-control" name="address" id="address" style="text-transform:uppercase">
                                  </div>                                  
                                </div>
                                <button type="button" class="btn btn-primary float-right" id="btncustomer">{{__('Siguiente')}}</button>
                              </div>
                          </div>
                      </div>
                      <div id="accident-part" class="content" role="tabpanel" aria-labelledby="accident-part-trigger">
                        <div class="form-row">
                          <div class="form-group col-lg-3 col-md-3">
                            <label for="">{{__('ID Solicitante')}}</label>
                            <input type="text" class="form-control" name="code_partner" id="code_partner" style="text-transform:uppercase">
                          </div>
                          <div class="form-group col-lg-3 col-md-3">
                            <label for="">{{__('Nombres Solicitante')}}</label>
                            <input type="text" class="form-control" name="partner" id="partner" style="text-transform:uppercase">                            
                          </div>
                          <div class="form-group col-lg-3 col-md-3">
                            <label for="">{{__('Teléfono Solicitante')}}</label>
                            <input type="tel" class="form-control" name="phone_partner" id="phone_partner">
                          </div>
                          <div class="form-group col-lg-3 col-md-3">
                            <label for="">{{__('Parentesco')}}</label>
                            <select class="form-control" name="kin" id="kin">
                              <option value=""></option>
                              @foreach ($kin as $kd)
                                <option value="{{$kd->id}}">{{$kd->name_kin}}</option>                                  
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="cbxpartner" id="cbxpartner">
                          <label for="cbxpartner" class="custom-control-label">Sin solicitante</label>
                        </div>
                        <hr>
                        <div class="form-row">
                          <div class="form-group col-lg-3 col-md-3">
                            <label for="">{{__('Fecha Accidente')}}</label>
                            <input type="date" class="form-control" name="date_accident" id="date_accident">
                          </div>
                          <div class="form-group col-lg-3 col-md-3">
                            <label for="">{{__('Hora Accidente')}}</label>
                            <input type="time" class="form-control" name="time_accident" id="time_accident">
                          </div>
                          <div class="form-group col-lg-3 col-md-3">
                            <label for="">{{__('Centro Atención')}}</label>
                            <select name="company" id="company" class="form-control">
                              <option value=""></option>
                              @foreach ($company as $co)
                                <option value="{{ $co->id }}">{{ $co->name_company }}</option>                                  
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group col-lg-3 col-md-3">
                            <label for="">{{__('Seguro')}}</label>
                            <select name="insurance" id="insurance" class="form-control">
                              <option value=""></option>
                              @foreach ($insurance as $in)
                                <option value="{{ $in->id }}">{{ $in->name_insurance }}</option>                                  
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-6">
                            <label for="">{{__('Tipo Accidente')}}</label>
                            <select class="form-control" name="type_accident" id="type_accident">
                              <option value=""></option>
                              @foreach ($tyac as $ta)
                                <option value="{{ $ta->id }}">{{ $ta->type_accident }}</option>                                  
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group col-6">
                            <label for="">{{__('Lugar Accidente')}}</label>
                            <input type="text" name="location" id="location" class="form-control" style="text-transform:uppercase">
                          </div>
                        </div>
                        <button type="button" class="btn btn-primary float-right" id="btnaccident">{{__('Siguiente')}}</button>
                        <button type="button" class="btn btn-primary" onclick="stepper.previous()">{{__('Anterior')}}</button>
                      </div>
                      <div id="order-part" class="content" role="tabpanel" aria-labelledby="order-part-trigger">
                        <div class="form-row">
                          <div class="form-group col-lg-4 col-md-4">
                            <label for="">{{__('Fecha')}}</label>
                            <input type="date" class="form-control" name="date_order" id="date_order">
                          </div>
                          <div class="form-group col-lg-4 col-md-4">
                            <label for="">{{__('Servicio')}}</label>
                            <select name="service" id="service" class="form-control">
                              <option value=""></option>
                              @foreach ($service as $se)
                                <option value="{{ $se->id }}">{{ $se->name_service }}</option>                                  
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group col-lg-4 col-md-4">
                            <label for="">{{__('Porcentaje')}}</label>
                            <input type="number" name="percentage" id="percentage" class="form-control" placeholder="%">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="">{{__('Descripción')}}</label>
                          <textarea class="form-control" name="description" id="description" cols="3" rows="3"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="stepper.previous()">{{__('Anterior')}}</button>
                        <button type="button" class="btn btn-primary float-right" id="btnmodal">{{__('Validar')}}</button>
                        <!-- Modal -->
                        <div class="modal fade" id="ModalCase" tabindex="-1" role="dialog" aria-labelledby="ModalCaseTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">{{__('Validar Caso')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">                                  
                                  <div class="col-6">
                                    <dl class="row" id="listcustomer">
                                      <dt class="col-sm-3">{{__('DNI')}}</dt>
                                      <dd class="col-sm-9" id="dd_code"></dd>
                                      <dt class="col-sm-3">{{__('Paciente')}}</dt>
                                      <dd class="col-sm-9 text-uppercase" id="dd_customer"></dd>
                                      <dt class="col-sm-3">{{__('Teléfono')}}</dt>
                                      <dd class="col-sm-9" id="dd_phone"></dd>
                                      <dt class="col-sm-3">{{__('Dirección')}}</dt>
                                      <dd class="col-sm-9 text-uppercase" id="dd_address"></dd>
                                      <dt class="col-sm-3">{{__('Email')}}</dt>
                                      <dd class="col-sm-9 text-uppercase" id="dd_email"></dd>
                                    </dl>
                                  </div>
                                  <div class="col-6">                                    
                                    <dl class="row" id="listpartner">
                                      <dt class="col-sm-3">{{__('DNI')}}</dt>
                                      <dd class="col-sm-9" id="dd_cpartner"></dd>
                                      <dt class="col-sm-3">{{__('Solicitante')}}</dt>
                                      <dd class="col-sm-9 text-uppercase" id="dd_partner"></dd>
                                      <dt class="col-sm-3">{{__('Teléfono')}}</dt>
                                      <dd class="col-sm-9" id="dd_mpartner"></dd>
                                    </dl>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-12">
                                    <table class="table table-bordered table-sm" id="tblmodal">
                                    </table>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cerrar')}}</button>
                                <button type="submit" class="btn btn-primary">{{__('Guardar')}}</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('bs-stepper/css/bs-stepper.min.css') }}">
@stop

@section('js')
    <script src="{{ asset('bs-stepper/js/bs-stepper.min.js') }}"></script>
    <script src="{{ asset('js/case.js') }}"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
      });
    </script>
  @if (session('create') == 'done')
    <script> 
        Swal.fire(
        '¡Registro exitoso!',
        'Se agregó un nuevo registro.',
        'success'
        )
    </script>
  @endif
@stop