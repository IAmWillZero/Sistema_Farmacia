<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function empresa()
    {
        return view('admin.configuracion.empresa');
    }

    public function usuarios()
    {
        return view('admin.configuracion.usuarios');
    }
}
