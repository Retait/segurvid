@extends('adminlte::page')

@section('title', 'Validate')

@section('content_header')
    <h5><strong>{{__('Factura')}}</strong></h5>
    {{session(['vior' => $vior]);}}
    {{session(['deposit' => $deposit]);}}
@stop

@section('content')

<div class="row">
    <div class="col-10 mx-auto shadow">
        <div class="invoice p-3 mb-3">
            <div class="row">
                <div class="col-12">
                <h4>
                    <i class="fas fa-globe"></i>&nbsp;{{Auth::user()->user_company}}
                    <small class="float-right">{{__('Fecha')}}: {{ now()->format('Y-m-d') }}</small>
                </h4>
                </div>
            </div>
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    {{__('De')}}
                <address>
                    <strong>{{Auth::user()->name}}</strong><br>
                    {{Auth::user()->address_company}}<br>
                    {{Auth::user()->city_company}}<br>
                    {{__('Teléfono')}}: {{Auth::user()->phone_company}}<br>
                    {{__('Email')}}: {{Auth::user()->email_company}}
                </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    {{__('Para')}}
                <address>
                    @foreach ($vior as $vo)
                        <strong>{{ $vo->name_customer }}</strong><br>
                        {{ $vo->address_customer }}<br>
                        {{ $vo->city_customer }}<br>
                        {{__('Phone')}}: {{ $vo->mobile_customer }} {{ $vo->phone_customer }}<br>
                        {{__('Email')}}: {{ $vo->email_customer }}
                    @endforeach
                </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                
                <b>{{__('Factura')}}: {{ $code }}</b><br>
                <br>
                @foreach ($vior as $vo)
                    <b>{{__('Orden ID')}}:</b> {{ $vo->code_order }}<br>
                    <b>Fecha Pago:</b> {{ now()->format('Y-m-d') }}<br>
                @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-sm text-secondary">
                            <th>{{__('ID')}}</th>
                            <th>{{__('SERVICIO')}}</th>
                            <th>{{__('DEPÓSITO')}}</th>
                            <th>{{__('PORCENTAJE')}}</th>
                            <th>{{__('SUBTOTAL')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vior as $vo)
                            <tr>
                                <td>{{$code}}</td>
                                <td>{{ $vo->name_service }}</td>
                                <td>{{ number_format($deposit, 2) }}</td>
                                <td>{{ $vo->cost_order }}%</td>
                                <td>{{ number_format($subtotal, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                <p class="lead">{{__('Métodos de Pago')}}:</p>
                <i class="fab fa-3x fa-cc-visa text-secondary"></i>
                <i class="fab fa-3x fa-cc-mastercard text-secondary"></i>
                <i class="fab fa-3x fa-cc-amex text-secondary"></i>
                <i class="fab fa-3x fa-cc-paypal text-secondary"></i>
                </div>
                <div class="col-6">
                <p class="lead">{{__('Importe Adeudado')}}</p>

                <div class="table-responsive">
                    @foreach ($vior as $vo)
                    <table class="table">
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>{{Auth::user()->currency_company}}&nbsp;{{ number_format($subtotal, 2) }}</td>
                        </tr>
                        <tr>
                            <th>IGV({{Auth::user()->tax_company}}%):</th>
                            <td>{{Auth::user()->currency_company}}&nbsp;{{ number_format($tax, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>{{Auth::user()->currency_company}}&nbsp;{{ number_format($total, 2) }}</td>
                        </tr>
                    </table>
                    @endforeach
                </div>
                </div>
            </div>
          <div class="row no-print">
            <div class="col-12">
                <div class="form-group">
                    <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i>&nbsp;{{__('imprimir')}}</a>
                    @foreach ($vior as $vo)
                        @if ($vo->status_order == 1)
                        {{-- <form action="{{ route('invoice.store') }}" method="POST">
                            @csrf
                        </form> --}}
                            <button type="button" class="btn btn-success float-right"  data-toggle="modal" data-target="#modal">
                                <i class="far fa-credit-card"></i>&nbsp;{{__('Realizar Pago')}}
                            </button>
                        @endif
                    @endforeach 
                    <button type="button" class="btn btn-danger float-right" style="margin-right: 5px;">
                        <i class="fas fa-download"></i>&nbsp;{{__('Generar PDF')}}
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">                            
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-cash-tab" data-toggle="pill" href="#pills-cash" role="tab" aria-controls="pills-cash" aria-selected="false">{{__('Efectivo')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-card-tab" data-toggle="pill" href="#pills-card" role="tab" aria-controls="pills-card" aria-selected="true">{{__('Tarjeta')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-paypal-tab" data-toggle="pill" href="#pills-paypal" role="tab" aria-controls="pills-paypal" aria-selected="false">{{__('Paypal')}}</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-cash" role="tabpanel" aria-labelledby="pills-cash-tab">
                                    @foreach ($vior as $vo)
                                    <form action="{{-- route('order/cash',$vo->soid) --}}" method="GET">                                            
                                        <input type="hidden" name="odid" id="odid" value="{{$vo->odid}}">
                                    @endforeach
                                        <div class="form-row">
                                            <div class="form-group col-12 col-lg-6 col-md-6 m-0">
                                                <label for="">{{__('Depósito')}}</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-coins"></i></span>
                                                    </div>
                                                    @foreach ($vior as $vo)   
                                                        <input type="number" class="form-control" step="0.01" name="amount" id="amount" value="{{$deposit}}" required disabled>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-lg-6 col-md-6 m-0">
                                                <label for="">{{__('Fecha')}}</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" value="{{--now()->format('Y-m-d')--}}" name="date" id="date" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-6 mb-0">
                                                <label for="">{{__('Comprobante')}}</label>
                                                <select class="form-control" name="receipt" id="receipt">
                                                    <option value=""></option>
                                                    @foreach ($payment as $py)
                                                        <option value="{{$py->id}}">{{$py->name_payment}}</option>                                                        
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-6 mb-0">
                                                <label for="">{{__('Foto')}}</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="photo" name="photo" accept="image/*">
                                                    <label class="custom-file-label" for="customFile">{{__('Choose File')}}</label>                                    
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-outline-success float-right" name="btnpayment" id="btnpayment">{{__('Pagar')}}</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="pills-card" role="tabpanel" aria-labelledby="pills-card-tab">
                                    @foreach ($vior as $vo)
                                    <form action="{{-- route('order/card',$vo->soid) --}}" method="GET">                                            
                                    @endforeach
                                        <div class="form-group">
                                            <label for="">{{__('Número')}}</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                                </div>
                                                <input type="number" class="form-control" name="number" id="number" placeholder="0000 0000 0000 0000" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-12 col-lg-6 col-md-6 mb-0">
                                                <label for="">{{__('Vencimiento')}}</label>&nbsp;<span class="text-secondary text-sm">(MM/AAAA)</span>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="expiration" id="expiration" placeholder="00/0000" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-lg-6 col-md-6 mb-0">
                                                <label for="">CVV</label>&nbsp;<span class="text-secondary text-sm"><i class="fas fa-question-circle"></i></span>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="cvv" id="cvv" maxlength="3" placeholder="000" required>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-outline-success float-right">{{__('Pagar')}}</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="pills-paypal" role="tabpanel" aria-labelledby="pills-paypal-tab">
                                    <div class="form-group">
                                        <label for="">{{__('Usuario')}}</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="email" class="form-control" placeholder="example@mail.com">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{__('Contraseña')}}</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            </div>
                                            <input type="password" class="form-control" placeholder="*******">
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-outline-success float-right">{{__('Iniciar sesión')}}</button>
                                </div>                                
                            </div>
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
@section('js')
    <script src="{{ asset('js/payment.js') }}"></script>
@stop