@extends('adminlte::page')

@section('title', 'Contact')

@section('content_header')
    <h5><strong>{{__('Contactos')}}</strong></h5>
@stop

@section('content')
<div class="row">
    <div class="col-12 mb-3">
        <a href="" class="btn btn-default" data-toggle="modal" data-target="#importcontact"><i class="fas fa-upload"></i>&nbsp;{{__('Importar')}}</a>
        <!-- Modal -->
        <div class="modal fade" id="importcontact" tabindex="-1" role="dialog" aria-labelledby="importcontactTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">                        
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <h5 class="text-warning"><i class="icon fas fa-exclamation-triangle"></i>&nbsp;{{__('Alerta')}}!</h5>
                            <p class="text-justify">{{__('Antes de iniciar importart tu archivo recuerda que')}}:</p>
                            <ol>
                                <li>{{__('El archivo no debe estar dañado')}}.</li>
                                <li>{{__('El número de columnas deben coincidir')}}.</li>
                                <li>{{__('El ID debe ser único')}}.</li>
                            </ol>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                    <label class="custom-file-label" for="file">{{__('Choose File')}}</label>                                    
                                </div>
                            </div>
                        </div>                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cerrar')}}</button>
                            <button type="submit" class="btn btn-danger">{{__('importar')}}</button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
        <a href="" type="button" id="btnexcontact" class="btn btn-default"><i class="fas fa-download"></i>&nbsp;{{__('Exportar')}}</a>
        <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#exampleModalCenter">+&nbsp;{{__('Agregar Contacto')}}</button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{__('Agregar Contacto')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('contact.store') }}" method="POST">
                  @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">{{__('Empresa')}}</label><span class="text-danger"> *</span>
                            <select name="company" id="company" class="form-control" required>
                                <option value=""></option>
                                @foreach ($company as $co)
                                    <option value="{{$co->id}}">{{$co->name_company}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-6">
                              <label for="">{{__('Nombre')}}</label><span class="text-danger"> *</span>
                              <input type="text" name="name" id="name" class="form-control" placeholder="" required>
                          </div>
                          <div class="form-group col-6">
                              <label for="">{{__('Ocupación')}}</label><span class="text-danger"> *</span>
                              <input type="text" name="job" id="job" class="form-control" placeholder="">
                          </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="">{{__('Teléfono')}}</label><span class="text-danger"> *</span>
                                <input type="tel" name="phone" id="phone" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="">{{__('Email')}}</label><span class="text-danger"> *</span>
                                <input type="email" name="email" id="email" class="form-control" placeholder="">
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
  <div class="row">
      <div class="col-12">
          <div class="card shadow">
              <div class="card-header">
                  <h3 class="card-title">{{__('Lista de Contactos')}}</h3>
                  <div class="card-tools">
                      <div class="input-group input-group-sm">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="{{__('Buscar')}}">      
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                  </div>
              </div>
              <div class="card-body">
                  <div class="row">
                    @foreach ($contact as $ct)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                      <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                          {{$ct->company_contact}}
                        </div>
                        <div class="card-body pt-0">
                          <div class="row">
                            <div class="col-8">
                              <h2 class="lead"><b>{{$ct->name_contact}}</b></h2>
                              <p class="text-muted"><i class="fas fa-briefcase"></i>&nbsp;{{$ct->job_contact}}</p>
                              <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>&nbsp;{{__('Teléfono')}}#: {{$ct->phone_contact}}</li>
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span>&nbsp;{{__('Email')}}: {{$ct->email_contact}}</li>
                              </ul>
                            </div>
                            <div class="col-4 text-center">
                                <img src="{{ $ct->file_contact  ?  $ct->file_contact  : '/img/user_default.png'}}" class="img-circle img-fluid" alt="">                              
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#editContact{{$ct->id}}"><i class="fas fa-edit"></i></button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="editContact{{$ct->id}}" tabindex="-1" role="dialog" aria-labelledby="editContactTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">{{__('Editar Contacto')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('contact.update',$ct->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">{{__('Empresa')}}</label><span class="text-danger"> *</span>
                                                            <select name="company" id="company" class="form-control" required>
                                                                @foreach ($company as $co)
                                                                    <option value="{{$co->id}}"
                                                                        @if ($ct->company_id == $co->id)
                                                                            selected
                                                                        @endif
                                                                        >{{$co->name_company}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-row">
                                                        <div class="form-group col-6">
                                                            <label for="">{{__('Nombre')}}</label><span class="text-danger"> *</span>
                                                            <input type="text" name="name" id="name" class="form-control" value="{{$ct->name_contact}}" required>
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="">{{__('Ocupación')}}</label><span class="text-danger"> *</span>
                                                            <input type="text" name="job" id="job" class="form-control" value="{{$ct->job_contact}}">
                                                        </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-6">
                                                                <label for="">{{__('Teléfono')}}</label><span class="text-danger"> *</span>
                                                                <input type="tel" name="phone" id="phone" class="form-control" value="{{$ct->phone_contact}}" required>
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <label for="">{{__('Email')}}</label><span class="text-danger"> *</span>
                                                                <input type="email" name="email" id="email" class="form-control" value="{{$ct->email_contact}}">
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
                                        <form action="{{ route('contact.destroy',$ct->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-default btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
              </div>
              <div class="card-footer">
                {{-- $contact->links('vendor.pagination.custom') --}}
              </div>
          </div>
      </div>
  </div>
@stop

@section('js')
@if (session('create') == 'done')
<script>
    Swal.fire(
    'Registro Creado!',
    'El registro se creo satisfactoriamente.',
    'success')
</script>
@endif
@if (session('update') == 'done')
<script>
    Swal.fire(
    'Registro Actualizado!',
    'El registro se actualizó satisfactoriamente.',
    'success')
</script>
@endif
@if (session('delete') == 'done')
<script>
    Swal.fire(
    'Registro Eliminado!',
    'El registro se eliminó satisfactoriamente.',
    'success')
</script>
@endif
@stop