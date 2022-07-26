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

    public function filtro(Request $request) {

        $teste = $request->get('filtro');
        $pets = Fotos::select('*')->join('pet as P', 'P.id', 'fotos.pet_id')
        ->where('especie', $teste)
        ->get();


        if ($request->has('filtro')) {
            $pets = Fotos::select('*')->join('pet as P', 'P.id', 'fotos.pet_id')
            ->where('especie', $teste)
            ->get();

            if(count($pets) < 1) {
                return redirect()->back()->withErrors(['msg' => 'Não há pets com a espécie selecionada, porfavor selecione outra espécie']);
            } else {
                return view('layouts.quero_adotar', compact('pets'));           
            }
        } else {
            $pets = Fotos::select('*')->join('pet as P', 'P.id', 'fotos.pet_id')->get();
        }

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
