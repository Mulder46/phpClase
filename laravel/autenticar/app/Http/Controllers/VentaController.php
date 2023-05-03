<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;


class VentaController extends Controller
{
    public function index(){
        $ventas=Venta::all();
        return view('venta/index');
    }
}
