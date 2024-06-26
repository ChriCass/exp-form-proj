<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Horario;
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
        $horarios = Horario::with([
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
    public function show(string $codigo_cco)
    {
        // Encuentra el horario por su ID
        $horario = Horario::with([
            
        ])->findOrFail($codigo_cco);

        // Retorna la vista con los detalles del horario
        return view('admin.horarios.show', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $codigo_cco)
    {
        $horario = Horario::findOrFail($codigo_cco);

        return view('admin.horarios.edit', compact('horario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HorarioRequest $request, string $codigo_cco)
    {
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $codigo_cco)
    {
        try {
            $horario = Horario::findOrFail($codigo_cco);
            $horario->delete();

            Log::info("Horario eliminado exitosamente: ID {$codigo_cco}");

            return redirect()->route('horarios.index')->with('success', 'horario eliminado exitosamente.');
        } catch (\Exception $e) {
            Log::error("Error al eliminar el horario: " . $e->getMessage());

            return redirect()->route('horarios.index')->with('error', 'Hubo un error al eliminar el horario.');
        }
    }
}
