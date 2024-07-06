<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cargo;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\cargoRequest;
use Illuminate\Support\Facades\Log;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargos = Cargo::with('area')->orderBy('codigo_cgo', 'asc')->get();

        return view('admin.cargos.index', compact('cargos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cargos.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $codigo_are)
    {
        $cargo = cargo::findOrFail($codigo_are);

        return view('admin.cargos.show', compact('cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $codigo_are)
    {
        $cargo = cargo::findOrFail($codigo_are);
        return view('admin.cargos.edit', compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $codigo_are)
    {
        $cargo = cargo::findOrFail($codigo_are);

        if ($cargo->isClean()) {
            return redirect()->route('cargos.edit', $cargo->codigo_are)
                ->with('warning', 'No hay nada que actualizar.');
        }

        $cargo->fill($request->all());
        $cargo->estado_are = $request->input('estado_are');
        $cargo->save();

        return redirect()->route('cargos.index')->with('success', 'cargo actualizado exitosamente.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $codigo_cgo)
    {
        try {
            $cargo = cargo::findOrFail($codigo_cgo);
            $cargo->delete();

            Log::info("cargo eliminado exitosamente: ID {$codigo_cgo}");

            return redirect()->route('cargos.index')->with('success', 'cargo eliminado exitosamente.');
        } catch (\Exception $e) {
            Log::error("Error al eliminar el cargo: " . $e->getMessage());

            return redirect()->route('cargos.index')->with('error', 'Hubo un error al eliminar el cargo.');
        }
    }
}
