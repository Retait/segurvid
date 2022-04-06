@extends('adminlte::page')

@section('title', 'Customer')

@section('content_header')
    <h5><strong>{{__('Clientes')}}</strong></h5>
@stop

@section('content')
<div class="row">
    <div class="col-12 mb-3">
        <a href="" class="btn btn-default" data-toggle="modal" data-target="#importcustomer"><i class="fas fa-upload"></i>&nbsp;{{__('Importar')}}</a>
        <!-- Modal -->
        <div class="modal fade" id="importcustomer" tabindex="-1" role="dialog" aria-labelledby="importcustomerTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">                        
                    <form action="{{-- route('import.customer') --}}" method="POST" enctype="multipart/form-data">
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
        <a href="{{ route('export.customer') }}" type="button" id="btnexcustomer" class="btn btn-default"><i class="fas fa-download"></i>&nbsp;{{__('Exportar')}}</a>
        <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#exampleModalCenter">+&nbsp;{{__('Agregar Cliente')}}</button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">                    
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{__('Agregar Cliente')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('customer.create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">{{__('ID')}}</label><span class="text-danger"> *</span>
                            <input type="text" name="code" class="form-control" style="text-transform:uppercase" maxlength="8">
                        </div>
                        <div class="form-group">
                            <label for="">{{__('Nombre Completo')}}</label><span class="text-danger"> *</span>
                            <input type="text" name="name" class="form-control" style="text-transform:uppercase">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{__('Pais')}}</label><span class="text-danger"> *</span>
                                <select class="form-control test " name="country" id="test">
                                    <option value=""></option>
                                    @foreach ($country as $co)
                                        <option value="{{$co['id']}}">{{$co['name_country']}}</option>                                            
                                    @endforeach
                                </select>
                            </div>                            
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{__('Ciudad')}}</label><span class="text-danger"> *</span>
                                <input type="text" name="city" class="form-control" style="text-transform:uppercase">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{__('Dirección')}}</label><span class="text-danger"> *</span>
                                <input type="text" name="address" class="form-control" style="text-transform:uppercase">
                            </div>
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{__('Móvil')}}</label><span class="text-danger"> *</span>
                                <input type="tel" name="mobile" maxlength="17" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{__('Teléfono')}}</label>
                                <input type="tel" name="phone" maxlength="17" class="form-control">
                            </div>
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{__('Email')}}</label>
                                <input type="email" name="email" class="form-control" style="text-transform:uppercase">
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
    <div class="col-12 col-lg-12 col-md-12">
        <div class="card shadow">
            <div class="card-body table-responsive">
                <table class="table table-sm" id="tblcustomer">
                    <thead>
                        <tr class="text-sm text-bold">
                            <th>{{__('ID')}}</th>
                            <th>{{__('CLIENTE')}}</th>
                            <th>{{__('PAÍS')}}</th>
                            <th>{{__('CUIDAD')}}</th>
                            <th>{{__('DIRECCION')}}</th>
                            <th>{{__('MÓVIL')}}</th>
                            <th>{{__('TELÉFONO')}}</th>
                            <th>{{__('EMAIL')}}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer as $ct)
                        <tr class="text-sm">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="cbxcustomer" id="cbx{{$ct->id}}" value="{{$ct->id}}">
                                    <label for="cbx{{$ct->id}}" class="custom-control-label">{{$ct->code_customer}}</label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <img src="{{ $ct->photo_customer  ?  $ct->photo_customer  : '/img/user_default.png'}}" class="rounded-circle" width="30px" height="30px" alt="">
                                    <p>&nbsp;{{$ct->name_customer}}</p>
                                </div>
                            </td>
                            <td>
                                <img src="{{ asset('storage/flag/'.$ct->country_customer.'.svg')}}" class="img-fluid" width="20px" height="20px" alt="">                                    
                            </td>
                            <td>{{$ct->city_customer}}</td>
                            <td>{{$ct->address_customer}}</td>
                            <td>{{$ct->mobile_customer}}</td>
                            <td>{{$ct->phone_customer}}</td>
                            <td>{{$ct->email_customer}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modalEdit{{$ct->id}}"><i class="fas fa-edit"></i>&nbsp;{{__('Editar')}}</button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="modalEdit{{$ct->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">                    
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">{{__('Agregar Cliente')}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('customer.update',$ct->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">{{__('ID')}}</label><span class="text-danger"> *</span>
                                                    <input type="text" name="code" class="form-control" value="{{ $ct->code_customer }}" style="text-transform:uppercase" maxlength="8">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">{{__('Nombre Completo')}}</label><span class="text-danger"> *</span>
                                                    <input type="text" name="name" class="form-control" value="{{ $ct->name_customer }}" style="text-transform:uppercase">
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-6 col-md-6">
                                                        <label for="">{{__('Pais')}}</label><span class="text-danger"> *</span>
                                                        <select class="form-control test " name="country" id="test">
                                                            <option value=""></option>
                                                            @foreach ($country as $co)
                                                                <option value="{{$co['id']}}">{{$co['name_country']}}</option>                                            
                                                            @endforeach
                                                        </select>
                                                    </div>                            
                                                    <div class="form-group col-lg-6 col-md-6">
                                                        <label for="">{{__('Ciudad')}}</label><span class="text-danger"> *</span>
                                                        <input type="text" name="city" class="form-control" value="{{ $ct->city_customer }}" style="text-transform:uppercase">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-6 col-md-6">
                                                        <label for="">{{__('Dirección')}}</label><span class="text-danger"> *</span>
                                                        <input type="text" name="address" class="form-control" value="{{ $ct->address_customer }}" style="text-transform:uppercase">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6">
                                                        <label for="">{{__('Móvil')}}</label><span class="text-danger"> *</span>
                                                        <input type="tel" name="mobile" value="{{ $ct->mobile_customer }}" maxlength="17" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-6 col-md-6">
                                                        <label for="">{{__('Teléfono')}}</label>
                                                        <input type="tel" name="phone" value="{{ $ct->phone_customer }}" maxlength="17" class="form-control">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6">
                                                        <label for="">{{__('Email')}}</label>
                                                        <input type="email" name="email" class="form-control" value="{{ $ct->email_customer }}" style="text-transform:uppercase">
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
                            </td>
                        </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- $customer->links('vendor.pagination.custom') --}}
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@if (session('create') == 'done')
<script> 
    Swal.fire(
    '¡Registro exitoso!',
    'El registro se agregó correctamente.',
    'success'
    )
</script>
@endif
@if (session('edit') == 'done')
<script> 
    Swal.fire(
    '¡Registro actualizado!',
    'El registro se actualizó correctamente.',
    'success'
    )
</script>
@endif
@if (session('exist') == 'done')
<script> 
    Swal.fire(
    '¡Ooopppss!',
    'El registro existe verifique el ID.',
    'error'
    )
</script>
@endif
@stop