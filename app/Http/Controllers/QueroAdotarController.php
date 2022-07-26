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
        $detalhes = Fotos::select('*', 'P.nome as nome_pet')->join('pet as P', 'P.id', 'fotos.pet_id')->join('users as U', 'U.id', 'fotos.user_id')->where('P.id', $pet_id)->get();
        return view('layouts.detalhes', compact('detalhes', 'pet_id'));
    }

    public function removerPet($pet_id) {
        $detalhes = Fotos::select('*')->join('pet as P', 'P.id', 'fotos.pet_id')
        ->join('users as U', 'U.id', 'fotos.user_id')
        ->where('P.id', $pet_id)->delete();
        
        return redirect()->back()->withErrors(['deletado' => 'Pet removido com sucesso!']);
    }

    public function editarDetalhes($pet_id) {
        $detalhes = Fotos::select('*', 'P.nome as nome_pet')->join('pet as P', 'P.id', 'fotos.pet_id')->join('users as U', 'U.id', 'fotos.user_id')->where('P.id', $pet_id)->first();

        return view('layouts.editar_detalhes', compact('detalhes', 'pet_id'));
    }

    public function updateDetalhes(Request $request) {
        QueroDoar::where('user_id', $request->user_id)
        ->where('id', $request->pet_id)    
        ->update([
            'nome' => $request->nome,
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
                $path = $file->storeAs('public/pets/'. $request->pet_id->id, $name);
                $imgData[] = $name;  
                $json = json_encode($imgData);
            }
            Fotos::create(['fotos' => $json, 'user_id' => $request->user_id, 'pet_id' => $request->pet_id->id]);
        }
        
        return redirect()->route('mais_detalhes', $request->pet_id)->withErrors(['deletado' => 'Pet removido com sucesso!']);
    }
}
