<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Colaborador;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ColaboradorRequest;
use Illuminate\Support\Facades\Log;

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collaboradors = Colaborador::with([
            'sexo:nombre_sex,codigo_sex',
            'tipoDocumento:nombre_tdoc,codigo_tdoc',
            'regimenPensionario:nombre_rp,codigo_rp',
            'eps:nombre_eps,codigo_eps',
            'cargo:nombre_cgo,codigo_cgo'
        ])->orderBy('codigo_col', 'asc')->get();

        return view('admin.collaboradors.index', compact('collaboradors'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.collaboradors.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $codigo_col)
    {
        $colaborador = Colaborador::with([
            'tipoDocumento', 'sexo', 'cargo', 'regimenPensionario', 'eps'
        ])->findOrFail($codigo_col);

        return view('admin.collaboradors.show', compact('colaborador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $codigo_col)
    {
        $colaborador = Colaborador::findOrFail($codigo_col);
        return view('admin.collaboradors.edit', compact('colaborador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $codigo_col)
    {
        $colaborador = Colaborador::findOrFail($codigo_col);

        if ($colaborador->isClean()) {
            return redirect()->route('colaboradors.edit', $colaborador->codigo_col)
                ->with('warning', 'No hay nada que actualizar.');
        }

        $colaborador->fill($request->all());
        $colaborador->estado_col = $request->input('estado_col');
        $colaborador->save();

        return redirect()->route('colaboradors.index')->with('success', 'Colaborador actualizado exitosamente.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $codigo_col)
    {
        try {
            $colaborador = Colaborador::findOrFail($codigo_col);
            $colaborador->delete();

            Log::info("Colaborador eliminado exitosamente: ID {$codigo_col}");

            return redirect()->route('colaboradors.index')->with('success', 'Colaborador eliminado exitosamente.');
        } catch (\Exception $e) {
            Log::error("Error al eliminar el colaborador: " . $e->getMessage());

            return redirect()->route('colaboradors.index')->with('error', 'Hubo un error al eliminar el colaborador.');
        }
    }
}
