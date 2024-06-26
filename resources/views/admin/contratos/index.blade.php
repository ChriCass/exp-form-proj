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
                                <h4 class="page-title">Todos los Contratos</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{ route('admin.home') }}">
                                    <i class="fas fa-home"></i> Inicio
                                </a>
                            </li>
                            
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="{{ route('contratos.index') }}" onClick="return false;">Contratos</a>
                            </li>
                            <li class="breadcrumb-item active">Todos los Contratos</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Todos</strong> los Contratoses
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
                                            <th class="center">Código de contrato</th>
                                            <th class="center">Colaborador</th>
                                            <th class="center">Hora de inicio</th>
                                            <th class="center">Hora final</th>
                                            <th class="center">Fecha de inicio</th>
                                            <th class="center">Fecha final</th>
                                            <th class="center">Remuneración</th>
                                            <th class="center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($contratos as $contrato)
                                        <tr class="odd gradeX">
                                            <td class="center">{{ $contrato->codigo_cco }}</td>
                                            <td class="center">
                                                {{ $contrato->colaborador->nombres_col }} 
                                                {{ $contrato->colaborador->apellidopaterno_col }} 
                                                {{ $contrato->colaborador->apellidomaterno_col }}
                                            </td>
                                            <td class="center">{{ $contrato->horario->horainicio_hor }}</td>
                                            <td class="center">{{ $contrato->horario->horafin_hor }}</td>
                                            <td class="center">{{ $contrato->fechainicio_cco }}</td>
                                            <td class="center">{{ $contrato->fechafin_cco }}</td>
                                            <td class="center">{{ $contrato->remuneracion_cco }}</td>
                                            <td class="center">
                                                <a href="{{ route('contratos.edit', $contrato->codigo_cco) }}" class="btn btn-tbl-edit">
                                                    <i class="material-icons">create</i>
                                                </a>
                                                <button type="button" class="btn btn-tbl-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-codigo="{{ $contrato->codigo_cco }}">
                                                    <i class="material-icons">delete_forever</i>
                                                </button>
                                                <a href="{{ route('contratos.show', $contrato->codigo_cco) }}" class="btn btn-info">Ver Detalles</a>
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
                        ¿Estás seguro de que deseas eliminar este contratos?
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
                var action = '{{ route("contratos.destroy", ["contrato" => ":codigo_cco"]) }}';
                action = action.replace(':codigo_cco', codigoCco);
                var form = document.getElementById('deleteForm');
                form.action = action;
            });
        });
    </script>
@endsection
