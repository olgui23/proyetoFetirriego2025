<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiCultivoController extends Controller
{
    public function reportes()
    {
        return view('mi_cultivo.reportes');
    }

    public function calendario()
    {
        return view('mi_cultivo.calendario');
    }
}

