@extends('admin.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Panel principal</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="index.html">
                                    <i class="fas fa-home"></i> inicio</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-xl-3 col-sm-6">
                        @livewire('admin-dashboard.all-colaboradors')
                </div>
                <div class="col-xl-3 col-lg-6">
                    @livewire('admin-dashboard.new-colaboradors')
                </div>
                <div class="col-xl-3 col-lg-6">
                    @livewire('admin-dashboard.promedio-colaboradores')
                </div>
                <div class="col-xl-3 col-lg-6">
                    @livewire('admin-dashboard.active-colaboradors')
                </div>
            </div>
      
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    @livewire('admin-dashboard.vencidos-colaboradors')
                </div>
                <!-- #END# Task Info -->
                <!-- Browser Usage -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    @livewire('admin-dashboard.todo-list')
                </div>
                <!-- #END# Browser Usage -->
            </div>
  
        </div>
    </section>
@endsection
