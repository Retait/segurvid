@extends('adminlte::page')

@section('title', 'Sale')

@section('content_header')
    <h5><strong>{{__('Ventas')}}</strong></h5>
@stop

@section('content')
<div class="row">
    <div class="col-12 mb-3">
        <a href="{{--route('export/sale')--}}" type="button" id="btnexsale" class="btn btn-default"><i class="fas fa-download"></i>&nbsp;{{__('Exportar')}}</a>
    </div>        
</div>
<div class="row">
    <div class="col-12 col-lg-8 col-md-8">
        <div class="card shadow">
            <div class="card-body table-responsive">
                <table class="table table-sm" id="tblsale">
                    <thead>
                        <tr class="text-sm text-secondary">
                            <th>{{('FACTURA')}}</th>
                            <th>{{('FECHA')}}</th>
                            <th>{{('PEDIDO')}}</th>
                            <th>{{('EMPLEADO')}}</th>
                            <th>{{('SERVICIO')}}</th>
                            <th>{{('DEPÓSITO')}}</th>
                            <th>{{('%')}}</th>
                            <th>{{('PAGO')}}</th>
                            <th>{{('TOTAL')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visa as $vs)
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="cbx{{$vs->ivid}}">
                                    <label for="cbx{{$vs->ivid}}" class="custom-control-label">{{$vs->code_invoice}}</label>
                                </div>
                            </td>
                            <td>{{$vs->date_invoice}}</td>
                            <td>{{$vs->date_order}}</td>
                            <td>
                                <div class="d-flex">
                                    <img src="{{ $vs->phofile_photo_path  ?  $vs->phofile_photo_path  : '/img/user_default.png'}}" class="rounded-circle" width="30px" height="30px" alt="">
                                    <p>&nbsp;{{$vs->name}}</p>
                                </div>
                            </td>
                            <td>{{$vs->code_service}}</td>
                            <td>{{$vs->deposit_invoice}}</td>
                            <td>{{$vs->cost_order}}</td>
                            <td>
                                <span class="badge bg-dark">{{__($vs->name_payment)}}</span>
                            </td>
                            <td>{{$vs->total_invoice}}</td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 col-md-4">
        <div class="row">
            <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                <div class="info-box bg-light shadow">
                    <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">{{__('Mis ventas')}}</span>
                        <span class="info-box-number text-center text-muted mb-0">{{ $countSaler }}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                <div class="info-box bg-light shadow">
                    <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">{{__('Total de ventas')}}</span>
                        <span class="info-box-number text-center text-muted mb-0">{{ $countSale }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">            
            <div class="col-12">
                <div class="card">  
                  <div class="card-body">
                      <canvas id="myChart1"></canvas> 
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script type="text/javascript">
    var labels = @json($gtitle);
    var data = @json($gcontent);
    var ctx = document.getElementById('myChart1');
    var myChart = new Chart(ctx, {
        type: 'polarArea',
        data: {
            labels,
            datasets: [{
                label: '# Ventas',
                data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#tblsale').DataTable({
            "paging":   true,
            "ordering": false,
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