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
                    <div class="col-3">
                        <img class="img-fluid" src="/storage/logo/logo-shopify.svg" alt="">
                    </div>
                    <div class="col-9">
                        <h5 class="info-box-text text-bold">SHOPIFY</h5>
                        <p>{{__('Conecta con los productos de tu tienda online.')}}</p>
                    </div>
                    <div class="col-md-12">                        
                        <hr>
                        <button class="btn btn-warning text-bold btn-sm float-right">{{__('INSTALL')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-12">    
        <div class="card card-solid shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <img class="img-fluid" src="/storage/logo/logo-woocommerce.svg" alt="">
                    </div>
                    <div class="col-9">
                        <h5 class="info-box-text text-bold">WOOCOMMERCE</h5>
                        <p>{{__('Conecta con los productos de tu tienda online.')}}</p>
                    </div>
                    <div class="col-md-12">                        
                        <hr>
                        <button class="btn btn-warning text-bold btn-sm float-right">{{__('INSTALL')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-12">    
        <div class="card card-solid shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <img class="img-fluid" src="/storage/logo/logo-prestashop.svg" alt="">
                    </div>
                    <div class="col-9">
                        <h5 class="info-box-text text-bold">PRESTASHOP</h5>
                        <p>{{__('Conecta con los productos de tu tienda online.')}}</p>
                    </div>
                    <div class="col-md-12">                        
                        <hr>
                        <button class="btn btn-warning text-bold btn-sm float-right">{{__('INSTALL')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
@stop