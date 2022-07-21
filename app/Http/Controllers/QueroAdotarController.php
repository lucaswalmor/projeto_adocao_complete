<?php

namespace App\Http\Controllers;

use App\Models\Fotos;
use App\Models\QueroDoar;
use Illuminate\Http\Request;

class QueroAdotarController extends Controller
{
    public function queroAdotar() {
        $pets = Fotos::select('*')->join('pet as P', 'P.id', 'fotos.pet_id')->get();

        return view('layouts.quero_adotar', compact('pets'));
    }

    public function maisDetalhes($pet_id) {
        $detalhes = Fotos::select('*')->join('pet as P', 'P.id', 'fotos.pet_id')->join('users as U', 'U.id', 'fotos.user_id')->where('P.id', $pet_id)->get();
        
        return view('layouts.detalhes', compact('detalhes'));
    }

    public function removerPet($pet_id) {
        $detalhes = Fotos::select('*')->join('pet as P', 'P.id', 'fotos.pet_id')
        ->join('users as U', 'U.id', 'fotos.user_id')
        ->where('P.id', $pet_id)->delete();
        
        return redirect()->back()->withErrors(['deletado' => 'Pet removido com sucesso!']);
    }
}
