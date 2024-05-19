<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->codigo_rol == 1) {
            return view('admin.home');
        } elseif ($user->codigo_rol == 2) {
            return view('user.home');
        }

        return view('welcome'); // Asegúrate de tener esta vista
    }
}
