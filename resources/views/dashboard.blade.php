@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h5><strong>{{__('Dashboard')}}</strong>
@stop

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info shadow">
        <div class="inner">
          <h3>{{ $order }}</h3>
          <p>{{__('Pedidos')}}</p>
        </div>
        <div class="icon">
          <i class="fas fa-shopping-bag"></i>
        </div>
        <a href="{{route('case.list')}}" class="small-box-footer">{{__('Ver más')}}&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-success shadow">
        <div class="inner">
          <h3>{{ $sale }}</h3>
          <p>{{__('Ventas')}}</p>
        </div>
        <div class="icon">
          <i class="fas fa-chart-bar"></i>
        </div>
        <a href="{{route('invoice')}}" class="small-box-footer">{{__('Ver más')}}&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning shadow">
        <div class="inner">
          <h3>{{ $customer }}</h3>
          <p>{{__('Clientes')}}</p>
        </div>
        <div class="icon">
          <i class="fas fa-chart-line"></i>
        </div>
        <a href="{{route('customer.show')}}" class="small-box-footer">{{__('Ver más')}}&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-danger shadow">
        <div class="inner">
          <h3>{{ $invoice }}</h3>
          <p>{{__('Ganancias')}}</p>
        </div>
        <div class="icon">
          <i class="fas fa-chart-pie"></i>
        </div>
        <a href="{{route('invoice')}}" class="small-box-footer">{{__('Ver más')}}&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 col-md-8 col-12">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between">
            <h3 class="card-title">Online Store Visitors</h3>
            <a href="javascript:void(0);">View Report</a>
          </div>
        </div>
        <div class="card-body">
            <canvas id="myChart1"></canvas> 
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-12">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between">
            <h3 class="card-title">Sales</h3>
            <a href="javascript:void(0);">View Report</a>
          </div>
        </div>
        <div class="card-body">
            <canvas id="myChart2"></canvas>
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
    var labels = @json($gtitle);
    var data = @json($gcontent);
    var ctx = document.getElementById('myChart1');
    var myChart = new Chart(ctx, {
        type: 'line',
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
      var ctx = document.getElementById('myChart2');
      var myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
              labels: ['Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov'],
              datasets: [{
                  label: '# Ventas',
                  data: [12, 19, 3, 5, 2, 3],
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
@stop