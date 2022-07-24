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
            @livewire('show-invoices')
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