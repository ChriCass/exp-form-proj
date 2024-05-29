<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Colaborador;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
