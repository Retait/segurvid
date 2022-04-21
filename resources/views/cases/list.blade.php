@extends('adminlte::page')

@section('title', 'Validate')

@section('content_header')
    <h5><strong>{{__('Lista de Casos')}}</strong></h5>
@stop

@section('content')
<div class="row">
    <div class="col-12 mb-3">
        <a href="{{--route('export/order')--}}" type="button" id="btnexorder" class="btn btn-default"><i class="fas fa-download"></i>&nbsp;{{__('Exportar')}}</a>
        <a href="{{ route('case')}}" type="button" class="btn btn-danger float-right">+&nbsp;{{__('Agregar Caso')}}</a>
    </div>        
</div>
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body table-responsive">
                <table class="table table-sm" id="tblorder">
                    <thead>
                        <tr class="text-sm text-secondary">
                            <th>{{__('ID')}}</th>
                            <th>{{__('FECHA')}}</th>
                            <th>{{__('SERVICIO')}}</th>
                            <th>{{__('STATUS')}}</th>
                            <th>{{__('ATENCIÓN')}}</th>
                            <th>{{__('ACCIDENTE')}}</th>
                            <th>{{__('CLIENTE')}}</th>
                            <th>{{__('SEGURO')}}</th>
                            <th>{{__('PORCENTAJE')}}</th>
                            <th>{{__('SOLICITANTE')}}</th>
                            <th>{{__('TELÉFONO')}}</th>
                            <th>{{__('CONTRATO')}}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vior as $vo)
                        <tr class="text-sm">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="cbx{{ $vo->soid}}">
                                    <label for="cbx{{ $vo->soid}}" class="custom-control-label">{{ $vo->code_order}}</label>
                                </div>
                            </td>
                            <td>{{ $vo->date_order}}</td>
                            <td>
                                @if ($vo->status_order == 1)
                                    <i class="far fa-paper-plane text-info"></i>&nbsp;Pendiente
                                @endif
                                @if ($vo->status_order == 2)
                                    <i class="fas fa-check text-success"></i>&nbsp;Pagado
                                @endif
                                @if ($vo->status_order == 3)
                                    <i class="fas fa-redo text-secondary"></i>&nbsp;Reembolsado
                                @endif
                                @if ($vo->status_order == 4)
                                    <i class="fas fa-times text-danger"></i>&nbsp;Cancelado
                                @endif
                            </td>
                            <td>{{ $vo->name_service}}</td>
                            <td>{{ $vo->name_company}}</td>
                            <td>{{ $vo->date_accident}}</td>
                            <td>
                                <div class="d-flex">
                                    <img src="{{ $vo->photo_customer  ?  $vo->photo_customer  : '/img/user_default.png'}}" class="rounded-circle" width="30px" height="30px" alt="">
                                    <p>&nbsp;{{ $vo->name_customer}}</p>
                                </div>
                            </td>
                            <td>{{ $vo->name_insurance}}</td>
                            <td>{{ $vo->cost_order}}%</td>
                            <td>{{ $vo->name_partner}}</td>
                            <td>{{ $vo->phone_partner}}</td>
                            <td>
                                <form action="{{ route('order.print',$vo->odid) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-default btn-sm"><i class="fas fa-print"></i>{{__('Imprimir')}}</button>
                                </form>
                            </td>
                            <td>
                                @if ($vo->status_order == 1)
                                    <div class="btn-group">
                                        <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#modalinvoice{{$vo->odid}}"><i class="fas fa-check"></i>&nbsp;{{__('Aprobar')}}</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modalinvoice{{$vo->odid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('invoice.sale',$vo->odid) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <h5 class="text-secondary"><i class="fas fa-exclamation-circle"></i>&nbsp;{{__('Nota')}}:</h5>
                                                        <p>{{__('Ingresa el monto total del cheque o depósito al cliente para poder calcular el porcentaje.')}}</p>
                                                        <div class="form group">
                                                            <label for="total">{{__('Total')}}</label>
                                                            <input type="number" class="form-control" name="total" id="total" step="0.01" placeholder="0.00" required min="0">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cerrar')}}</button>
                                                        <button type="submit" class="btn btn-warning">{{__('Aprobar')}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>                  
                                        <form action="{{route('case.cancel',$vo->odid)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-default btn-sm"><i class="fas fa-times"></i>Anular</button>
                                        </form>                      
                                        {{-- <a href="{{route('cancel')}}" class="btn btn-default btn-sm"><i class="fas fa-times"></i></a> --}}
                                    </div>
                                @else
                                    <a href="{{route('invoice')}}" class="btn btn-default btn-sm"><i class="fas fa-eye"></i>&nbsp;{{__('Ver')}}</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#tblorder').DataTable({            
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
@if (session('cancel') == 'done')
<script> 
    Swal.fire(
    'Hecho!',
    'El registro se anuló correctamente',
    'success'
    )
</script>
@endif
@stop