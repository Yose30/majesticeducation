<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvaluacioneController extends Controller
{
    public function index(){
        return view('profesor.evaluaciones');
    }
}
