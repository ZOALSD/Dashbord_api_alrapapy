@extends('admin.index')
@section('content')
<div class="row">
  <section class="col-lg-12 connectedSortable">
    <div class="card" item_name="statistics">
      <div class="card-header d-flex p-0">
        <h3 class="card-title p-3">
        <i class="fas fa-calculator mr-1"></i>
        Statistics
        </h3>
        </div><!-- /.card-header -->
          <div class="card-body">
            
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h1 class="text-yallow">@livewire('show-invoices')</h1>
                  <p>Orders</p>
                </div>
                <div class="icon">
                  <i class="fas fa-cart-plus"></i>
                </div>
                <a href="{{ aurl('admins') }}" class="small-box-footer">Orders <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="row">

          @include('admin.layouts.statistics.module_counters')
          
        </div>
          </div><!-- /.card-body -->
        </div>
  </section>
</div>
<!-- Main row -->
<div class="row">
  <!-- Left col -->
  <section class="col-lg-6 connectedSortable">
    <!-- Custom tabs (Charts with tabs)-->
    <!-- /.row (main row) -->
    @endsection