@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h5><strong>{{__('Usuarios')}}</strong></h5>
@stop

@section('content')
<div class="row">
    <div class="col-12 mb-3">
        <a href="" class="btn btn-default" data-toggle="modal" data-target="#importcustomer"><i class="fas fa-upload"></i>&nbsp;{{__('Importar')}}</a>
        <!-- Modal -->
        <div class="modal fade" id="importcustomer" tabindex="-1" role="dialog" aria-labelledby="importcustomerTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">                        
                    <form action="{{-- route('user') --}}" method="POST">
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
        <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#exampleModalCenter">+&nbsp;{{__('Agregar Usuario')}}</button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">                    
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{__('Agregar Usuario')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">{{__('Número de Identifación')}}</label><span class="text-danger"> *</span>
                            <input type="number" name="code_user" class="form-control" max="100000000" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="">{{__('Nombre Completo')}}</label><span class="text-danger"> *</span>
                            <input type="text" name="name" class="form-control" style="text-transform:uppercase" required>
                        </div>
                        <div class="form-group">
                            <label for="">{{__('Email')}}</label><span class="text-danger"> *</span>
                            <input type="email" name="email" class="form-control" style="text-transform:uppercase" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{__('Pais Nac.')}}</label><span class="text-danger"> *</span>
                                <select class="form-control" name="country_birth" id="country_birth" required>
                                    <option value=""></option>
                                    @foreach ($country as $co)
                                        <option value="{{$co['id']}}">{{$co['name_country']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{__('Pais Res.')}}</label><span class="text-danger"> *</span>
                                <select class="form-control " name="country_residence" id="country_residence" required>
                                    <option value=""></option>
                                    @foreach ($country as $co)
                                        <option value="{{$co['id']}}">{{$co['name_country']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">{{__('Compañia')}}</label><span class="text-danger"> *</span>
                            <input type="text" name="company" class="form-control" style="text-transform:uppercase" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{__('Industria')}}</label><span class="text-danger"> *</span>
                                <select class="form-control " name="industry" id="industry" required>
                                    <option value=""></option>
                                    @foreach ($industry as $in)
                                        <option value="{{$in['id']}}">{{$in['name_industry']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{__('Cargo')}}</label><span class="text-danger"> *</span>
                                <select class="form-control " name="job" id="job" required>
                                    <option value=""></option>
                                    @foreach ($job as $jb)
                                        <option value="{{$jb['id']}}">{{$jb['name_job']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{__('Moneda')}}</label>
                                <select class="form-control" name="currency" id="currency" required>
                                    <option value=""></option>
                                    @foreach ($currency as $cu)
                                        <option value="{{$cu['id']}}">{{$cu['code_currency']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{__('Impuesto')}}</label>
                                <input type="number" name="tax" class="form-control" style="text-transform:uppercase" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{__('Permisos')}}</label>
                                <select class="form-control" name="type_user" id="type_user" required>
                                    <option value=""></option>
                                    <option value="0">{{__('ADMIN')}}</option>
                                    <option value="1">{{__('USER')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="">{{__('Accesos')}}</label>
                                <select class="form-control" name="status_user" id="status_user" required>
                                    <option value=""></option>
                                    <option value="0">{{__('ACTIVO')}}</option>
                                    <option value="1">{{__('INACTIVO')}}</option>
                                </select>
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
                            <th>{{__('NOMBRES')}}</th>
                            <th>{{__('EMAIL')}}</th>
                            <th>{{__('CARGO')}}</th>
                            <th>{{__('PAIS')}}</th>
                            <th>{{__('COMPAÑIA')}}</th>
                            <th>{{__('INDUSTRIA')}}</th>
                            <th>{{__('MONEDA')}}</th>
                            <th>{{__('IMPUESTO')}}</th>
                            <th>{{__('ESTADO')}}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $us)
                        <tr class="text-sm">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="cbxcustomer" id="cbx{{$us->id}}" value="{{$us->id}}">
                                    <label for="cbx{{$us->id}}" class="custom-control-label">{{$us->id}}</label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <img src="{{ $us->profile_photo_path  ?  $us->profile_photo_path  : '/img/user_default.png'}}" class="rounded-circle" width="30px" height="30px" alt="">
                                    <p>&nbsp;{{$us->name}}</p>
                                </div>
                            </td>
                            <td>{{$us->email}}</td>
                            <td>
                                @foreach ($job as $jb)
                                    @if ($jb['id'] == $us->job_user)
                                        {{$jb->name_job}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($country as $co)
                                    @if ($co['id'] == $us->country_residence)
                                        {{$co->name_country}}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$us->user_company}}</td>
                            <td>
                                @foreach ($industry as $in)
                                    @if ($in['id'] == $us->industry_company)
                                        {{$in->name_industry}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($currency as $cu)
                                    @if ($cu['id'] == $us->currency_company)
                                        {{$cu->code_currency}}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$us->tax_company}}%</td>
                            <td>
                                @if ($us->status_user == 0)
                                    <span class="badge badge-secondary">INACTIVO</span>
                                @endif
                                @if ($us->status_user == 1)
                                    <span class="badge badge-success">ACTIVO</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modalEdit{{$us->id}}"><i class="fas fa-edit"></i>&nbsp;{{__('Editar')}}</button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="modalEdit{{$us->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">                    
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">{{__('Editar Usuario')}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('user.update',$us->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">{{__('Número de Identifiación')}}</label><span class="text-danger"> *</span>
                                                    <input type="number" name="code_user" class="form-control" value="{{ $us->code_user }}" max="100000000" min="0" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">{{__('Nombre Completo')}}</label><span class="text-danger"> *</span>
                                                    <input type="text" name="name" class="form-control" value="{{ $us->name }}" style="text-transform:uppercase" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">{{__('Email')}}</label><span class="text-danger"> *</span>
                                                    <input type="text" name="email" class="form-control" value="{{ $us->email }}" style="text-transform:uppercase" required>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-6 col-md-6">
                                                        <label for="">{{__('Pais Nac.')}}</label><span class="text-danger"> *</span>
                                                        <select class="form-control test " name="country_birth" id="country_birth" required>
                                                            <option value=""></option>
                                                            @foreach ($country as $co)
                                                                <option value="{{$co['id']}}"
                                                                    @if ($co['id'] == $us->country_birth)
                                                                        selected
                                                                    @endif
                                                                >{{$co['name_country']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6">
                                                        <label for="">{{__('Pais Res.')}}</label><span class="text-danger"> *</span>
                                                        <select class="form-control test " name="country_residence" id="country_residence" required>
                                                            <option value=""></option>
                                                            @foreach ($country as $co)
                                                                <option value="{{$co['id']}}"
                                                                    @if ($co['id'] == $us->country_residence)
                                                                        selected
                                                                    @endif
                                                                >{{$co['name_country']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">{{__('Compañia')}}</label><span class="text-danger"> *</span>
                                                    <input type="text" name="company" class="form-control" value="{{ $us->user_company }}" style="text-transform:uppercase" required>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-6 col-md-6">
                                                        <label for="">{{__('Industria')}}</label><span class="text-danger"> *</span>
                                                        <select class="form-control test " name="industry" id="industry" required>
                                                            <option value=""></option>
                                                            @foreach ($industry as $in)
                                                                <option value="{{$in['id']}}"
                                                                    @if ($in['id'] == $us->industry_company)
                                                                        selected
                                                                    @endif
                                                                >{{$in['name_industry']}}</option>                                            
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6">
                                                        <label for="">{{__('Cargo')}}</label><span class="text-danger"> *</span>
                                                        <select class="form-control test " name="job" id="job" required>
                                                            <option value=""></option>
                                                            @foreach ($job as $jb)
                                                                <option value="{{$jb['id']}}"
                                                                    @if ($jb['id'] == $us->job_user)
                                                                        selected
                                                                    @endif
                                                                >{{$jb['name_job']}}</option>                                            
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-6 col-md-6">
                                                        <label for="">{{__('Moneda')}}</label>
                                                        <select class="form-control test " name="currency" id="currency">
                                                            <option value=""></option>
                                                            @foreach ($currency as $cu)
                                                                <option value="{{$cu['id']}}"
                                                                    @if ($cu['id'] == $us->currency_company)
                                                                        selected
                                                                    @endif
                                                                >{{$cu['name_currency']}}</option>                                            
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6">
                                                        <label for="">{{__('Impuesto')}}</label>
                                                        <input type="number" name="tax" class="form-control" value="{{ $us->tax_company }}" style="text-transform:uppercase">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-6 col-md-6">
                                                        <label for="">{{__('Permisos')}}</label>
                                                        <select class="form-control test " name="type_user" id="type_user">
                                                            @if ($us['type_user'] == 0)
                                                                <option value="0" selected>{{__('USER')}}</option>
                                                                <option value="1">{{__('ADMIN')}}</option>                                                            
                                                            @else
                                                                <option value="0">{{__('USER')}}</option>
                                                                <option value="1" selected>{{__('ADMIN')}}</option>                                                            
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6">
                                                        <label for="">{{__('Acceso')}}</label>
                                                        <select class="form-control test " name="status_user" id="status_user">
                                                            @if ($us['type_user'] == 0)
                                                                <option value="0" selected>{{__('INACTIVO')}}</option>
                                                                <option value="1">{{__('ACTIVO')}}</option>                                                            
                                                            @else
                                                                <option value="0">{{__('INACTIVO')}}</option>
                                                                <option value="1" selected>{{__('ACTIVO')}}</option>                                                            
                                                            @endif
                                                        </select>
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
<script>
    $(document).ready(function() {
        $('#tblcustomer').DataTable({
            "paging":   true,
            "info":     false,
            "pagingType": "simple_numbers",
            "language": {
                "sLengthMenu":    "_MENU_",
                "sSearch":        "<i class='text-secondary fas fa-search'></i>",
                "oPaginate": {
                    "sFirst":    "«",
                    "sLast":    "»",
                    "sNext":    "»",
                    "sPrevious": "«"
                }
            }
        });
        $('.dataTables_paginate').addClass('pagination-sm');
    });
</script>
@stop