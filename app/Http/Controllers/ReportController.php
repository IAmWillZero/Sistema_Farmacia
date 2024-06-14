<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function ventas()
    {
        return view('admin.reportes.ventas');
    }

    public function inventario()
    {
        return view('admin.reportes.inventario');
    }
}
