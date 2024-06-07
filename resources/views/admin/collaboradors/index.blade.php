@extends('admin.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
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
                        <li class="breadcrumb-item active">Todos los Colaboradores</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Todos</strong> los Colaboradores
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle"
                                    data-bs-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu float-end">
                                    <li>
                                        <a href="#" onClick="return false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="basicTable" class="table table-hover table-checkable order-column contact_list">
                                <thead>
                                    <tr>
                                        <th class="center">Código de colaborador</th>
                                        <th class="center">Imagen</th>
                                        <th class="center">Tipo de documento</th>
                                        <th class="center">Número</th>
                                        <th class="center">Nombres y Apellidos</th>
                                        <th class="center">Sexo</th>
                                        <th class="center">Cargo</th>
                                        <th class="center">Régimen Pensionario</th>
                                        <th class="center">EPS</th>
                                        <th class="center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($collaboradors as $colaborador)
                                    <tr class="odd gradeX">
                                        <td class="center">{{ $colaborador->codigo_col }}</td>
                                        <td class="table-img center">
                                            <img src="{{ asset('path/to/default/image.jpg') }}" alt="Imagen del colaborador">
                                            <!-- Ajusta el src para la ruta correcta de la imagen del colaborador -->
                                        </td>
                                        <td class="center">{{ $colaborador->tipoDocumento->nombre_tdoc }}</td>
                                        <td class="center">{{ $colaborador->numerodoc_col }}</td>
                                        <td class="center">{{ $colaborador->nombres_col }} {{ $colaborador->apellidopaterno_col }} {{ $colaborador->apellidomaterno_col }}</td>
                                        <td class="center">{{ $colaborador->sexo->nombre_sex }}</td>
                                        <td class="center">{{ $colaborador->cargo->nombre_cgo }}</td>
                                        <td class="center">{{ $colaborador->regimenPensionario->nombre_rp }}</td>
                                        <td class="center">{{ $colaborador->eps->nombre_eps }}</td>
                                        <td class="center">
                                            <a href="{{ route('colaboradors.edit', $colaborador->codigo_col) }}" class="btn btn-tbl-edit">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <form  method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-tbl-delete">
                                                    <i class="material-icons">delete_forever</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
