<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\DetalleHorario;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HorarioRequest;
use Illuminate\Support\Facades\Log;
class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = DetalleHorario::with([
            'horario:horainicio_hor,horafin_hor,codigo_hor'
        ])->get();

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
    public function show(string $codigo_hor)
    {
        // Encuentra el horario por su ID
        $horario = DetalleHorario::with([
            'horarios'
        ])->findOrFail($codigo_hor);

        // Retorna la vista con los detalles del horario
        return view('admin.horarios.show', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $codigo_hor)
    {
        $horario = Horario::findOrFail($codigo_hor);

        return view('admin.horarios.edit', compact('horario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HorarioRequest $request, string $codigo_hor)
    {
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $codigo_hor)
    {
        try {
            $horario = Horario::findOrFail($codigo_hor);
            $horario->delete();

            Log::info("Horario eliminado exitosamente: ID {$codigo_hor}");

            return redirect()->route('horarios.index')->with('success', 'horario eliminado exitosamente.');
        } catch (\Exception $e) {
            Log::error("Error al eliminar el horario: " . $e->getMessage());

            return redirect()->route('horarios.index')->with('error', 'Hubo un error al eliminar el horario.');
        }
    }
}
