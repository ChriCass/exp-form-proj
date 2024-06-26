@extends('admin.layouts.app')

@section('content')
    <section class="content">


        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Todos los Contratos</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('admin.home') }}">
                                <i class="fas fa-home"></i> Inicio
                            </a>
                        </li>
                        
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="{{ route('contratos.index') }}" onClick="return false;">Contrato</a>
                        </li>
                        <li class="breadcrumb-item active">Detalles de Contrato</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Detalles</strong> del Contrato   
                        </h2>
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
                    <div class="container">
                        

                        <div class="card">
                            {{-- <div class="card-header">
                                <h3>{{ $contrato->colaborador->nombres_col }} {{ $contrato->colaborador->apellidopaterno_col }}
                                    {{ $contrato->colaborador->apellidomaterno_col }}</h3>
                            </div> --}}
                            <div class="card-body">
                                <p><strong>Colaborador:</strong> 
                                    {{ $contrato->colaborador->nombres_col }} 
                                    {{ $contrato->colaborador->apellidopaterno_col }} 
                                    {{ $contrato->colaborador->apellidomaterno_col }}
                                </p>
                                <p><strong>Horario:</strong> 
                                    {{ $contrato->horario->horainicio_hor }} - 
                                    {{ $contrato->horario->horafin_hor }}
                                </p>
                                <p><strong>Fecha de Inicio:</strong> {{ $contrato->fechainicio_cco }}</p>
                                <p><strong>Fecha Final:</strong> {{ $contrato->fechafin_cco }}</p>
                                <p><strong>Remuneración:</strong> {{ $contrato->remuneracion_cco }}</p>
                                <p><strong>Estado:</strong> {{ $contrato->estado_cco ? 'Activo' : 'Inactivo' }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('contratos.index') }}" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
