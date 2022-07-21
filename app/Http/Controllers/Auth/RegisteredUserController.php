<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'telefone' => ['required', 'string', 'max:15'],
            'instagram' => ['required', 'string', 'max:255'],
            'cep' => ['required', 'string', 'max:9'],
            'rua' => ['required', 'string', 'max:255'],
            'bairro' => ['required', 'string', 'max:255'],
            'cidade' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],
        [
            'nome.required' => 'O campo :attribute deve ser preenchido',
            'telefone.required' => 'O campo :attribute deve ser preenchido',
            'instagram.required' => 'O campo :attribute deve ser preenchido',
            'cep.required' => 'O campo :attribute deve ser preenchido',
            'rua.required' => 'O campo :attribute deve ser preenchido',
            'bairro.required' => 'O campo :attribute deve ser preenchido',
            'cidade.required' => 'O campo :attribute deve ser preenchido',
            'numero.required' => 'O campo :attribute deve ser preenchido',
            'email.required' => 'O campo :attribute deve ser preenchido',
            'password.required' => 'O campo :attribute deve ser preenchido'
        ]);

        $user = User::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'instagram' => $request->instagram,
            'cep' => $request->cep,
            'rua' => $request->rua,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'numero' => $request->numero,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            
        ]);

        event(new Registered($user));

        Auth::login($user);
        
        return redirect(RouteServiceProvider::HOME)->withErrors(['ok' => 'Cadastro Realizado com sucesso']);
    }
}
