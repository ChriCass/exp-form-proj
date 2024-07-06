<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ColaboradorRequest;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('colaborador', 'rol')->orderBy('id', 'asc')->get();

        return view('admin.users.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::with('colaborador', 'rol')->findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $codigo_col)
    {
        $user = User::findOrFail($codigo_col);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $codigo_col)
    {
        $user = User::findOrFail($codigo_col);

        if ($user->isClean()) {
            return redirect()->route('users.edit', $user->codigo_col)
                ->with('warning', 'No hay nada que actualizar.');
        }

        $user->fill($request->all());
        $user->estado_col = $request->input('estado_col');
        $user->save();

        return redirect()->route('users.index')->with('success', 'User actualizado exitosamente.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $codigo_col)
    {
        try {
            $user = User::findOrFail($codigo_col);
            $user->delete();

            Log::info("User eliminado exitosamente: ID {$codigo_col}");

            return redirect()->route('users.index')->with('success', 'User eliminado exitosamente.');
        } catch (\Exception $e) {
            Log::error("Error al eliminar el user: " . $e->getMessage());

            return redirect()->route('users.index')->with('error', 'Hubo un error al eliminar el user.');
        }
    }
}
