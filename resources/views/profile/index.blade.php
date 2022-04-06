@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
    <h5><strong>{{__('PERFÍL')}}</strong></h5>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-body box-profile">
                    <div class="text-center">
                      <img src="{{ Auth::user()->profile_photo_path  ?  Auth::user()->profile_photo_path  : '/img/user_default.png'}}" class="profile-user-img img-fluid img-circle" alt="">
                    </div>
                    <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>  
                    <p class="text-muted text-center">
                      @foreach ($job as $jb)
                          @if ($jb['id'] ==  Auth::user()->job_user)
                              {{__($jb['name_job'])}}
                          @endif
                      @endforeach                      
                    </p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                        <b>{{__('CLIENTES')}}</b><span class=" text-bold text-secondary float-right">{{ $customer}}</span>
                        </li>
                        <li class="list-group-item">
                        <b>{{__('PEDIDOS')}}</b><span class=" text-bold text-secondary float-right">{{ $order}}</span>
                        </li>
                        <li class="list-group-item">
                        <b>{{__('FACTURACIÓN')}}</b><span class=" text-bold text-secondary float-right">{{ $invoice}}</span>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#photo"><b>{{__('Cambiar foto')}}</b></a>
                    <!-- Modal -->
                    <div class="modal fade" id="photo" tabindex="-1" role="dialog" aria-labelledby="photoTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">                        
                              <form action="{{ route('profile.photo') }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <div class="modal-body">
                                      <h5 class="text-warning"><i class="icon fas fa-exclamation-triangle"></i>&nbsp;{{__('Atención')}}!</h5>
                                      <p class="text-justify">{{__('Antes de actualizar su foto asegúrese que')}}:</p>
                                      <ol>
                                          <li>{{__('Solo se aceptan archivos .png')}}</li>
                                          <li>{{__('El rostro debe verse con clarida y sin accesorios')}}.</li>
                                          <li>{{__('El tamaño maximo del archivo debe ser de 1Mb')}}.</li>
                                      </ol>
                                      <div class="form-group">
                                          <div class="custom-file">
                                              <input type="file" class="custom-file-input" id="photo" name="photo" accept="image/png">
                                              <label class="custom-file-label" for="photo">{{__('Choose File')}}</label>                                    
                                          </div>
                                      </div>
                                  </div>                        
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cerrar')}}</button>
                                      <button type="submit" class="btn btn-danger">{{__('Guardar')}}</button>
                                  </div>
                              </form>                    
                          </div>
                      </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
          <div class="card shadow">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#employee" data-toggle="tab">{{__('Empleado')}}</a></li>
                <li class="nav-item"><a class="nav-link" href="#company" data-toggle="tab">{{__('Empresa')}}</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="employee">
                    <form action="{{ route('profile.store') }}" class="form-horizontal" method="POST">
                      @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">{{__('Nombre')}}</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" value="{{Auth::user()->name}}" disabled>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">{{__('Email')}}</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" value="{{Auth::user()->email}}" disabled>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="job" class="col-sm-2 col-form-label">{{__('Ocupación')}}</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="birth" disabled>
                                @foreach ($job as $jb)
                                <option value="{{$jb['id']}}"
                                @if ($jb['id'] ==  Auth::user()->job_user)
                                  selected
                                @endif                                
                                >{{$jb['name_job']}}</option>                                    
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="birth" class="col-sm-2 col-form-label">{{__('País de Nacimiento')}}</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="birth" disabled>
                                @foreach ($country as $ct)
                                  <option value="{{ $ct['id']}}"
                                  @if ($ct['id'] ==  Auth::user()->country_birth)
                                      selected
                                  @endif
                                  >{{__($ct['name_country'])}}</option>                                    
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="residence" class="col-sm-2 col-form-label">{{__('País de residencia')}}</label>
                            <div class="col-sm-4">
                              <select class="form-control" name="residence" disabled>
                                @foreach ($country as $ct)
                                  <option value="{{ $ct['id']}}"
                                  @if ($ct['id'] ==  Auth::user()->country_residence)
                                      selected
                                  @endif
                                  >{{__($ct['name_country'])}}</option>                                    
                                @endforeach
                              </select>
                            </div>
                            <label for="city" class="col-sm-2 col-form-label">{{__('Ciudad')}}</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="city" value="{{Auth::user()->city}}" style="text-transform:uppercase">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="zipcode" class="col-sm-2 col-form-label">{{__('Código Postal')}}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="zipcode" value="{{Auth::user()->zipcode_user}}" placeholder="012345">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">{{__('Dirección')}}</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="address" value="{{Auth::user()->address_user}}" placeholder="New Avenue #123" style="text-transform:uppercase">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">{{__('Teléfono')}}</label>
                            <div class="col-sm-10">
                              <input type="tel" class="form-control" name="phone" value="{{Auth::user()->phone_user}}" placeholder="00 987 654 321">                                  
                            </div>
                          </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-warning float-right">{{__('Actualizar')}}</button>
                          </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="company">
                  <form action="{{ route('profile.company') }}" class="form-horizontal" method="POST">
                    @csrf
                    <div class="form-group row">
                      <label for="company" class="col-sm-2 col-form-label">{{__('Compañia')}}</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{Auth::user()->user_company}}" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="industry" class="col-sm-2 col-form-label">{{__('Industria')}}</label>
                      <div class="col-sm-10">                            
                        <select class="form-control" name="" id="" disabled>
                            @foreach ($industry as $in)
                                <option value="{{$in['id']}}"
                                    @if ($in['id'] ==  Auth::user()->industry_company)
                                        selected
                                    @endif
                                >{{$in['name_industry']}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="country" class="col-sm-2 col-form-label">{{__('País')}}</label>
                      <div class="col-sm-4">                            
                        <select class="form-control" disabled>
                          @foreach ($country as $ct)
                            <option value="{{ $ct['id']}}"
                            @if ($ct['id'] ==  Auth::user()->country_company)
                                selected
                            @endif
                            >{{__($ct['name_country'])}}</option>
                          @endforeach
                        </select>
                      </div>
                      <label for="currency" class="col-sm-2 col-form-label">{{__('Moneda')}}</label>
                      <div class="col-sm-4">                            
                        <select class="form-control" disabled>
                          @foreach ($currency as $cu)
                            <option value="{{$cu['id']}}"
                            @if ($cu['code_iso'] ==  Auth::user()->currency_company)
                                selected
                            @endif
                            >{{$cu['name_currency']}}</option>
                          @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="tax" class="col-sm-2 col-form-label">{{__('Impuesto de Venta')}}</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="tax" value="{{Auth::user()->tax_company}}%" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="zipcode" class="col-sm-2 col-form-label">{{__('Código Postal')}}</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="zipcode" value="{{Auth::user()->zipcode_company}}" placeholder="012345">
                      </div>
                    </div>
                    <div class="form-group row">                      
                      <label for="city" class="col-sm-2 col-form-label">{{__('Ciudad')}}</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="city" value="{{Auth::user()->city}}" style="text-transform:uppercase">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">{{__('Dirección')}}</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="address" value="{{Auth::user()->address_company}}" placeholder="New Avenue #123" style="text-transform:uppercase">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="phone" class="col-sm-2 col-form-label">{{__('Teléfono')}}</label>
                      <div class="col-sm-10">
                        <input type="tel" class="form-control" name="phone" value="{{Auth::user()->phone_company}}" placeholder="00 987 654 321">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-warning float-right">{{__('Actualizar')}}</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@stop
@section('js')
@if (session('update') == 'done')
<script>
    Swal.fire(
    'Registro Actualizado!',
    'El registro se actualizó satisfactoriamente.',
    'success')
</script>
@endif
<script>
  $('.custom-file-input').on('change', function(event) {
  var inputFile = event.currentTarget;
  $(inputFile).parent()
      .find('.custom-file-label')
      .html(inputFile.files[0].name);
  }); 
  </script>
@stop