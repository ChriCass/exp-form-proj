@extends('admin.layouts.app')

@section('content')
<section class="content">


        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Todos los Colaboradores</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('home') }}">
                                <i class="fas fa-home"></i> Inicio</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="{{ route('colaboradors.index') }}" onClick="return false;">Colaboradores</a>
                        </li>
                        <li class="breadcrumb-item active">Añadir Colaborador</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Añadir</strong> Colaborador</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu float-end">
                                    <li>
                                        <a href="javascript:void(0);">Action</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">Another action</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    @livewire('admin-dashboard.colaboradors.colaborador-form')
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
