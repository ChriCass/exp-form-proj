@extends('admin.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Todos los Colaboradores</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{ route('admin.home') }}">
                                    <i class="fas fa-home"></i> Inicio
                                </a>
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
                                        data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
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
                                        @foreach($collaboradors as $colaborador)
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
                                                <button type="button" class="btn btn-tbl-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-codigo="{{ $colaborador->codigo_col }}">
                                                    <i class="material-icons">delete_forever</i>
                                                </button>
                                                <a href="{{ route('colaboradors.show', $colaborador->codigo_col) }}" class="btn btn-info">Ver Detalles</a>
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
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Confirmar Eliminación</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro de que deseas eliminar este colaborador?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <form id="deleteForm" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var codigoCol = button.getAttribute('data-codigo');
                var action = '{{ route("colaboradors.destroy", ["colaborador" => ":codigo_col"]) }}';
                action = action.replace(':codigo_col', codigoCol);
                var form = document.getElementById('deleteForm');
                form.action = action;
            });
        });
    </script>
@endsection
