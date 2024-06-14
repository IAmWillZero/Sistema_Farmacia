<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        return view('admin.inventario.index');
    }

    public function create()
    {
        return view('admin.inventario.create');
    }
}
