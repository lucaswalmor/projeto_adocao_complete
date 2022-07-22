<?php

namespace App\Http\Controllers;

use App\Models\Fotos;
use App\Models\QueroDoar;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QueroDoarController extends Controller
{
    public function queroDoar() {
        return view('layouts.quero_doar');
    }

    public function cadastroDoacao(Request $request) {     

        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'especie' => ['required', 'string', 'max:11'],
            'raca' => ['required', 'string', 'max:255'],
            'porte' => ['required', 'string', 'max:255'],
            'pelagem' => ['required', 'string', 'max:255'],
            'cor_pelo' => ['required', 'string', 'max:255'],
            'sexo' => ['required', 'string', 'max:255'],
            'temperamento' => ['required', 'string', 'max:255'],
            'situacao' => ['required', 'string', 'max:255'],
            'historia' => ['required', 'string', 'max:255'],
            'idade' => ['required', 'string', 'max:255'],
            'idade_tipo' => ['required', 'string', 'max:255'],
            'fotos' => ['required']
        ],
        [
            'nome.required' => 'O campo :attribute deve ser preenchido',
            'especie.required' => 'O campo :attribute deve ser preenchido',
            'raca.required' => 'O campo :attribute deve ser preenchido',
            'porte.required' => 'O campo :attribute deve ser preenchido',
            'pelagem.required' => 'O campo :attribute deve ser preenchido',
            'cor_pelo.required' => 'O campo :attribute deve ser preenchido',
            'sexo.required' => 'O campo :attribute deve ser preenchido',
            'temperamento.required' => 'O campo :attribute deve ser preenchido',
            'situacao.required' => 'O campo :attribute deve ser preenchido',
            'historia.required' => 'O campo :attribute deve ser preenchido',
            'idade.required' => 'O campo :attribute deve ser preenchido',
            'idade_tipo.required' => 'O campo Tipo de idade deve ser preenchido',
            'fotos.required' => 'O campo :attribute deve ser preenchido'
        ]);

        $pet_id = QueroDoar::create([
            'nome' => $request->nome,
            'user_id' => $request->user_id,
            'especie' => $request->especie,
            'raca' => $request->raca,
            'porte' => $request->porte,
            'pelagem' => $request->pelagem,
            'cor_pelo' => $request->cor_pelo,
            'sexo' => $request->sexo,
            'temperamento' => $request->temperamento,
            'situacao' => $request->situacao,
            'historia' => $request->historia,
            'idade' => $request->idade,
            'idade_tipo' => $request->idade_tipo
        ]);

        $fotos = $request->fotos;
        if ($fotos) {
            $imgData = [];
            foreach($fotos as $key => $file) {
                $name = $file->getClientOriginalName();
                $path = $file->storeAs('public/pets/'. $pet_id->id, $name);
                $imgData[] = $name;  
                $json = json_encode($imgData);
            }
            Fotos::create(['fotos' => $json, 'user_id' => $request->user_id, 'pet_id' => $pet_id->id]);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
