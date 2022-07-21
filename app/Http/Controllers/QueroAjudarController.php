<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QueroAjudarController extends Controller
{
    public function queroAjudar() {
        return view('layouts.quero_ajudar');
    }
}
