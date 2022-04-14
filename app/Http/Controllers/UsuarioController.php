<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index() {
        return 'Desde Index';
    }

    /* La clase Request continuene todos los metodos que nosotros necesitamos */
    public function show(Request $request) {
        return 'Hola'. ' ' . $request->usuario;
    }
}
