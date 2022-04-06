@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h5><strong>{{__('REPORTES')}}</strong></h5>
@stop

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="callout">
            <h5><i class=""></i>Casos</h5>
            <p>Este informe muestra todos los cumpleaños en los próximos 30 días.</p>                
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="callout">
            <h5><i class=""></i>Servicios</h5>
            <p>Este informe muestra todos las contrataciones internas y externas en un período determinado.</p>                
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="callout">
            <h5><i class=""></i>Facturación</h5>
            <p>Este informe muestra el salario combinado de los empleados internos activos de todo tu personal</p>                
        </div>  
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="position-relative">
            <div class="callout">
                <h5><i class=""></i>Clientes</h5>
                <p>Este informe muestra a todos los empleados que actualmente están en período de prueba.</p>                
            </div>
            <div class="ribbon-wrapper ribbon-lg">
              <div class="ribbon bg-warning text-lg">
               <b>PRO</b>
              </div>
            </div>            
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop