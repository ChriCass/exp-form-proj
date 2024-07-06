<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\areaRequest;
use Illuminate\Support\Facades\Log;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Area::orderBy('codigo_are', 'asc')->get();

        return view('admin.areas.index', compact('areas'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.areas.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $codigo_are)
    {
        $area = Area::findOrFail($codigo_are);

        return view('admin.areas.show', compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $codigo_are)
    {
        $area = Area::findOrFail($codigo_are);
        return view('admin.areas.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $codigo_are)
    {
        $area = Area::findOrFail($codigo_are);

        if ($area->isClean()) {
            return redirect()->route('areas.edit', $area->codigo_are)
                ->with('warning', 'No hay nada que actualizar.');
        }

        $area->fill($request->all());
        $area->estado_are = $request->input('estado_are');
        $area->save();

        return redirect()->route('areas.index')->with('success', 'area actualizado exitosamente.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $codigo_are)
    {
        try {
            $area = Area::findOrFail($codigo_are);
            $area->delete();

            Log::info("Area eliminada exitosamente: ID {$codigo_are}");

            return redirect()->route('areas.index')->with('success', 'Area eliminada exitosamente.');
        } catch (\Exception $e) {
            Log::error("Error al eliminar el area: " . $e->getMessage());

            return redirect()->route('areas.index')->with('error', 'Hubo un error al eliminar el area.');
        }
    }
}
