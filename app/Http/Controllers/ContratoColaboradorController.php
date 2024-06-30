<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContratoColaborador;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContratoColaboradorRequest;
use Illuminate\Support\Facades\Log;

class ContratoColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contratos = ContratoColaborador::with([
            'colaborador:nombres_col,apellidopaterno_col,apellidomaterno_col,codigo_col',
            'horario:horainicio_hor,horafin_hor,codigo_hor',
        ])
        ->where('estado_cto', 1) // Filtrar por contratos activos
        ->orderBy('codigo_cco', 'asc') // Ordenar por código de contrato de menor a mayor
        ->get();

        return view('admin.contratos.index', compact('contratos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contratos.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $codigo_cco)
    {
        // Encuentra el contrato por su ID
        $contrato = ContratoColaborador::with([
            'colaborador', 'horario'
        ])->findOrFail($codigo_cco);

        // Retorna la vista con los detalles del contrato
        return view('admin.contratos.show', compact('contrato'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $codigo_cco)
    {
        $contrato = ContratoColaborador::findOrFail($codigo_cco);

        return view('admin.contratos.edit', compact('contrato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContratoColaboradorRequest $request, string $codigo_cco)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $codigo_cco)
    {
        try {
            $contrato = ContratoColaborador::findOrFail($codigo_cco);
            $contrato->delete();

            Log::info("Contrato eliminado exitosamente: ID {$codigo_cco}");

            return redirect()->route('contratos.index')->with('success', 'contrato eliminado exitosamente.');
        } catch (\Exception $e) {
            Log::error("Error al eliminar el contrato: " . $e->getMessage());

            return redirect()->route('contratos.index')->with('error', 'Hubo un error al eliminar el contrato.');
        }
    }
}
