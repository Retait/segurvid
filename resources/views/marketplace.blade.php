@extends('adminlte::page')

@section('title', 'Contact')

@section('content_header')
    <h5><strong>{{__('Contactos')}}</strong></h5>
@stop

@section('content')
<div class="row">
    <div class="col-lg-4 col-md-4 col-12">    
        <div class="card card-solid shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <i class="fas fa-4x fa-coins text-secondary"></i>
                    </div>
                    <div class="col-md-9">
                        <h5 class="info-box-text text-bold">{{__('MÓDULO DE FINANZAS')}}</h5>
                        <p>{{('La gestión de todos los ingresos y gastos es fundamental para la toma de decisiones.')}}</p>
                    </div>
                    <div class="col-md-12">                        
                        <hr>
                        <button class="btn btn-warning text-bold btn-sm float-right">{{__('SUSCRÍBETE')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-12">    
        <div class="card card-solid shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <i class="fas fa-4x fa-users text-secondary"></i>
                    </div>
                    <div class="col-md-9">
                        <h5 class="info-box-text text-bold">{{__('MODULO DE RECURSOS HUMANOS')}}</h5>
                        <p>{{('Tener un control diario de asistencia, nómina de empleados y calendarios.')}}</p>
                    </div>
                    <div class="col-md-12">                        
                        <hr>
                        <button class="btn btn-warning text-bold btn-sm float-right">{{__('SUSCRÍBETE')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-12">    
        <div class="card card-solid shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <i class="fas fa-4x fa-boxes text-secondary"></i>
                    </div>
                    <div class="col-md-9">
                        <h5 class="info-box-text text-bold">{{__('MODULO DE LOGÍSTICA')}}</h5>
                        <p>{{('Controla tus almacenes y puntos de venta, así como tus vehículos y conductores.')}}</p>
                    </div>
                    <div class="col-md-12">                        
                        <hr>
                        <button class="btn btn-warning text-bold btn-sm float-right">{{__('SUSCRÍBETE')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
@stop