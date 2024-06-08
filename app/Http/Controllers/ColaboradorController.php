<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Colaborador;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ColaboradorRequest;

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
        ])->get();

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
        // Encuentra el colaborador por su ID
        $colaborador = Colaborador::with([
            'tipoDocumento', 'sexo', 'cargo', 'regimenPensionario', 'eps'
        ])->findOrFail( $codigo_col);

        // Retorna la vista con los detalles del colaborador
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
    public function update(ColaboradorRequest $request, string $codigo_col)
    {
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
