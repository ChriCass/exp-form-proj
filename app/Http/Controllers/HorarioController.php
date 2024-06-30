<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\DetalleHorario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = Horario::leftJoin('detalle_horarios', 'horarios.codigo_hor', '=', 'detalle_horarios.codigo_hor')
            ->select('horarios.*', 'detalle_horarios.codigo_dho', 'detalle_horarios.horainicio_dho', 'detalle_horarios.horafin_dho', 'detalle_horarios.tipo_dho', 'detalle_horarios.dia_dho')
            ->orderBy('horarios.codigo_hor')
            ->orderBy('detalle_horarios.horainicio_dho')
            ->get();

        return view('admin.horarios.index', compact('horarios'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.horarios.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $codigo_hor, string $codigo_dho)
    {
        $horario = Horario::findOrFail($codigo_hor);
        $detallehorario = DetalleHorario::where('codigo_dho', $codigo_dho)->firstOrFail();
        $horario->detalle = $detallehorario;

        return view('admin.horarios.show', compact('horario'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($codigo_hor, $codigo_dho = null)
    {
        $horario = Horario::findOrFail($codigo_hor);
        $detalle = $codigo_dho ? DetalleHorario::findOrFail($codigo_dho) : null;
        return view('admin.horarios.edit', compact('horario', 'detalle'));
    }

    public function update(Request $request, $codigo_hor)
    {
        Log::info('Entrando al método update para el horario con código: ' . $codigo_hor);

        Log::info('Datos recibidos en la solicitud', ['request' => $request->all()]);

        // Validar la solicitud
        $validated = $request->validate([
            'horainicio_hor' => 'required|date_format:H:i',
            'horafin_hor' => 'required|date_format:H:i:s',
        ]);
        Log::info('Validación completada', ['validated' => $validated]);

        try {
            DB::beginTransaction();

            // Buscar el horario
            $horario = Horario::findOrFail($codigo_hor);
            Log::info('Horario encontrado: ' . $horario->codigo_hor);

            // Actualizar el horario
            $horario->horainicio_hor = $request->horainicio_hor;
            $horario->horafin_hor = $request->horafin_hor;
            $horario->save();
            Log::info('Horario guardado: ' . json_encode($horario));

            DB::commit();
            Log::info('Horario actualizado exitosamente.');
            return redirect()->route('horarios.index')->with('success', 'Horario actualizado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al actualizar el horario: ' . $e->getMessage());
            return redirect()->route('horarios.edit', $codigo_hor)->with('error', 'Hubo un error al actualizar el horario.');
        }
    }



    public function updateDetalle(Request $request, $codigo_dho)
    {
        Log::info('Entrando al método updateDetalle para el detalle con código: ' . $codigo_dho);
        Log::info('Datos recibidos en la solicitud', ['request' => $request->all()]);

        $detalleHorario = DetalleHorario::findOrFail($codigo_dho);
        $horario = Horario::findOrFail($detalleHorario->codigo_hor);

        Log::info('Horario encontrado: ', ['horario' => $horario]);
        Log::info('Detalle del horario encontrado: ', ['detalleHorario' => $detalleHorario]);

        // Validar la solicitud con una regla personalizada para el formato de tiempo
        $request->validate([
            'horainicio_dho' => ['required', function ($attribute, $value, $fail) {
                if (!\DateTime::createFromFormat('H:i', $value) && !\DateTime::createFromFormat('H:i:s', $value)) {
                    $fail($attribute . ' must match the format H:i or H:i:s.');
                }
            }],
            'horafin_dho' => ['required', function ($attribute, $value, $fail) {
                if (!\DateTime::createFromFormat('H:i', $value) && !\DateTime::createFromFormat('H:i:s', $value)) {
                    $fail($attribute . ' must match the format H:i or H:i:s.');
                }
            }],
            'tipo_dho' => 'required|string',
            'dia_dho' => 'required|string',
        ]);

        // Convertir a formato H:i si es necesario
        $horainicio_dho = \DateTime::createFromFormat('H:i:s', $request->horainicio_dho) ? \DateTime::createFromFormat('H:i:s', $request->horainicio_dho)->format('H:i:s') : \DateTime::createFromFormat('H:i', $request->horainicio_dho)->format('H:i:s');
        $horafin_dho = \DateTime::createFromFormat('H:i:s', $request->horafin_dho) ? \DateTime::createFromFormat('H:i:s', $request->horafin_dho)->format('H:i:s') : \DateTime::createFromFormat('H:i', $request->horafin_dho)->format('H:i:s');

        $horainicio_hor = \DateTime::createFromFormat('H:i:s', $horario->horainicio_hor)->format('H:i:s');
        $horafin_hor = \DateTime::createFromFormat('H:i:s', $horario->horafin_hor)->format('H:i:s');

        Log::info('Horas procesadas', [
            'horainicio_dho' => $horainicio_dho,
            'horafin_dho' => $horafin_dho,
            'horainicio_hor' => $horainicio_hor,
            'horafin_hor' => $horafin_hor,
        ]);

        // Validar que la hora de inicio del detalle no sea menor a la hora de inicio del horario
        if ($horainicio_dho < $horainicio_hor) {
            Log::warning('La Hora de Inicio del Detalle es menor que la Hora de Inicio del Horario', [
                'horainicio_dho' => $horainicio_dho,
                'horainicio_hor' => $horainicio_hor,
            ]);
            return redirect()->back()->withErrors(['horainicio_dho' => 'La Hora de Inicio del Detalle no puede ser menor que la Hora de Inicio del Horario.'])->withInput();
        }

        // Validar que la hora de fin del detalle no sea mayor a la hora de fin del horario
        if ($horafin_dho > $horafin_hor) {
            Log::warning('La Hora de Fin del Detalle es mayor que la Hora de Fin del Horario', [
                'horafin_dho' => $horafin_dho,
                'horafin_hor' => $horafin_hor,
            ]);
            return redirect()->back()->withErrors(['horafin_dho' => 'La Hora de Fin del Detalle no puede ser mayor que la Hora de Fin del Horario.'])->withInput();
        }

        try {
            DB::beginTransaction();

            Log::info('Validación completada');

            $detalleHorario->horainicio_dho = $horainicio_dho;
            Log::info('Hora de inicio actualizada: ' . $detalleHorario->horainicio_dho);

            $detalleHorario->horafin_dho = $horafin_dho;
            Log::info('Hora de fin actualizada: ' . $detalleHorario->horafin_dho);

            $detalleHorario->tipo_dho = $request->tipo_dho;
            Log::info('Tipo actualizado: ' . $detalleHorario->tipo_dho);

            $detalleHorario->dia_dho = $request->dia_dho;
            Log::info('Día actualizado: ' . $detalleHorario->dia_dho);

            $detalleHorario->save();
            Log::info('Detalle del horario guardado: ' . json_encode($detalleHorario));

            DB::commit();
            Log::info('Detalle del horario actualizado exitosamente.');
            return redirect()->route('horarios.index')->with('success', 'Detalle del horario actualizado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al actualizar el detalle del horario: ' . $e->getMessage());
            return redirect()->route('horarios.edit', $detalleHorario->codigo_hor)->with('error', 'Hubo un error al actualizar el detalle del horario.');
        }
    }























    public function editDetalle($codigo_dho)
    {
        $detalle = DetalleHorario::findOrFail($codigo_dho);
        return view('admin.horarios.edit_detalle', compact('detalle'));
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $codigo_hor)
    {
        Log::info("Código de horario recibido en destroy: " . $codigo_hor);

        try {
            DB::beginTransaction();

            $horario = Horario::findOrFail($codigo_hor);
            Log::info("Horario encontrado: " . json_encode($horario));

            if ($horario->detalles()->count() > 0) {
                Log::info("No se puede eliminar el horario con ID: {$codigo_hor} porque tiene detalles asociados.");
                return redirect()->route('horarios.index')->with('error', 'No se puede eliminar el horario porque tiene detalles asociados.');
            }

            $horario->delete();
            Log::info("Horario eliminado exitosamente: ID {$codigo_hor}");

            DB::commit();

            return redirect()->route('horarios.index')->with('success', 'Horario eliminado exitosamente.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            Log::error("Horario no encontrado: ID {$codigo_hor}");
            return redirect()->route('horarios.index')->with('error', 'Horario no encontrado.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error al eliminar el horario: " . $e->getMessage());
            return redirect()->route('horarios.index')->with('error', 'Hubo un error al eliminar el horario.');
        }
    }

    public function destroyDetalle(string $codigo_dho)
    {
        Log::info("Código de detalle recibido en destroyDetalle: " . $codigo_dho);

        try {
            DB::beginTransaction();

            $detalleHorario = DetalleHorario::findOrFail($codigo_dho);
            $codigo_hor = $detalleHorario->codigo_hor;

            Log::info("Detalle encontrado: " . json_encode($detalleHorario));
            Log::info("Código de horario relacionado: " . $codigo_hor);

            $detalleHorario->delete();
            Log::info("Detalle eliminado exitosamente: ID {$codigo_dho}");

            // Verificar si el horario no tiene más detalles
            $detallesRestantes = DetalleHorario::where('codigo_hor', $codigo_hor)->count();

            Log::info("Detalles restantes para el horario {$codigo_hor}: {$detallesRestantes}");

            if ($detallesRestantes == 0) {
                Horario::findOrFail($codigo_hor)->delete();
                Log::info("Horario {$codigo_hor} eliminado porque no tiene más detalles.");
            }

            DB::commit();

            return redirect()->route('horarios.index')->with('success', 'Detalle del horario eliminado exitosamente.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            Log::error("Detalle del horario no encontrado: ID {$codigo_dho}");
            return redirect()->route('horarios.index')->with('error', 'Detalle del horario no encontrado.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error al eliminar el detalle del horario: " . $e->getMessage());
            return redirect()->route('horarios.index')->with('error', 'Hubo un error al eliminar el detalle del horario.');
        }
    }












    public function store(Request $request)
    {
        Log::info('Datos recibidos en la solicitud', ['request' => $request->all()]);

        $validated = $request->validate([
            'horainicio_hor' => 'required|date_format:H:i',
            'horafin_hor' => 'required|date_format:H:i',
            'estado_hor' => 'required|boolean',
            'dia_dho' => 'array',
            'dia_dho.*' => 'required|string',
            'tipo_dho' => 'array',
            'tipo_dho.*' => 'required|string',
            'horainicio_dho' => 'array',
            'horainicio_dho.*' => 'required|date_format:H:i',
            'horafin_dho' => 'array',
            'horafin_dho.*' => 'required|date_format:H:i',
            'estado_dho' => 'array',
            'estado_dho.*' => 'required|boolean',
        ]);

        try {
            DB::beginTransaction();

            $horario = Horario::create([
                'horainicio_hor' => $request->horainicio_hor,
                'horafin_hor' => $request->horafin_hor,
                'estado_hor' => $request->estado_hor,
            ]);

            if (!empty($request->dia_dho)) {
                foreach ($request->dia_dho as $index => $dia) {
                    DetalleHorario::create([
                        'codigo_hor' => $horario->codigo_hor,
                        'dia_dho' => $dia,
                        'tipo_dho' => $request->tipo_dho[$index],
                        'horainicio_dho' => $request->horainicio_dho[$index],
                        'horafin_dho' => $request->horafin_dho[$index],
                        'estado_dho' => $request->estado_dho[$index],
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('horarios.index')->with('success', 'Horario creado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al crear el horario: ' . $e->getMessage());
            return redirect()->route('horarios.create')->with('error', 'Hubo un error al crear el horario.');
        }
    }
}
