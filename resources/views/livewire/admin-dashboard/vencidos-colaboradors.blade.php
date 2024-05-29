<div>
    <div class="card">
        <div class="header">
            <h2>
                <strong>Contratos</strong> por vencer
            </h2>
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <a href="#" onClick="return false;" class="dropdown-toggle"
                        data-bs-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="dropdown-menu pull-right">
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
      <!-- resources/views/livewire/admin-dashboard/vencidos-colaboradors.blade.php -->

<div class="body">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Colaborador</th>
                    <th>Area</th>
                    <th>Cargo</th>
                    <th>Tiempo en la empresa</th>
                    <th>Fecha fin del contrato</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contratos as $contrato)
                <tr>
                    <td>{{ $contrato->nombres_col }} {{ $contrato->apellidopaterno_col }}</td>
                    <td>{{ $contrato->nombre_are }}</td>
                    <td>{{ $contrato->nombre_cgo }}</td>
                    <td>
                        @php
                            $fechaInicio = \Carbon\Carbon::parse($contrato->fechainicio_cco);
                            $fechaFin = \Carbon\Carbon::parse($contrato->fechafin_cco);
                            $diff = $fechaInicio->diff($fechaFin);
                            
                            $tiempoEmpresa = '';
                            if ($diff->y > 0) {
                                $tiempoEmpresa .= $diff->y . ' años ';
                            }
                            if ($diff->m > 0) {
                                $tiempoEmpresa .= $diff->m . ' meses ';
                            }
                            if ($diff->d > 0) {
                                $tiempoEmpresa .= $diff->d . ' días';
                            }
                        @endphp
                        {{ trim($tiempoEmpresa) }}
                    <td class="text-danger">{{ $contrato->fechafin_cco }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    </div>
</div>
