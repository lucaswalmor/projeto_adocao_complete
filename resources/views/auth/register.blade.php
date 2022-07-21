<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registrar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mobile.css') }}">
    <title>Cadastro</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src=" {{ asset('img/logos/logo.png') }}" class="logo" alt="">
                </a>
                <div class="text-header">
                    <h3>PROJETO ADOÇÃO</h3>
                    <h5>O projeto feito para você encontrar seu melhor amigo!</h5>
                </div>
                <button class="navbar-toggler mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="justify-content-end collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
                        </li>
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ route('quero_adotar') }}">Quero
                                        Doar</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link">Quero Doar</a>
                                </li>
                            @endauth
                        @endif
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ route('quero_adotar') }}">Quero
                                        Adotar</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link">Quero Adotar</a>
                                </li>
                            @endauth
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('quero_ajudar') }}">Quero Ajudar</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('login'))
                                @auth
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="nav-link">Sair</a>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="nav-link">Login / Cadastro</a>
                                @endauth
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section class="mt-3">
            <div class="container d-flex justify-content-start">
                <div class="formulario mb-3">
                    <div class="row mb-3">
                        <h3>Cadastro</h3>
                    </div>
                    <form class="row g-3 needs-validation" novalidate method="post" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control @error('nome') is-invalid @enderror capitalize" placeholder="Nome completo" aria-label="Nome" value="{{ old('nome') }}"
                                    name="nome" id="nome" required>
                                @error('nome')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>    
                                @enderror
                            </div>
                            
                        </div>
    
                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" class="form-control telefone @error('telefone') is-invalid @enderror" placeholder="Telefone" aria-label="Telefone" value="{{ old('telefone') }}"
                                    name="telefone" id="telefone" required>
                                    @error('telefone')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>    
                                    @enderror
                            </div>
                            <div class="col-md-5">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" aria-label="Email" value="{{ old('email') }}"
                                    name="email" id="email" required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>    
                                    @enderror
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control @error('instagram') is-invalid @enderror" placeholder="Instagram" aria-label="Instagram" value="{{ old('instagram') }}"
                                    name="instagram" id="instagram" required>
                                    @error('instagram')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>    
                                    @enderror
                            </div>
    
                            <div class="col-md-4">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Senha" aria-label="Senha" value="{{ old('password') }}"
                                    name="password" id="password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>    
                                    @enderror
                            </div>
    
                            <div class="col-md-4">
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirmar Senha" aria-label="Senha" value="{{ old('password_confirmation') }}"
                                    name="password_confirmation" id="password_confirmation" required>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>    
                                    @enderror
                            </div>
    
                            <div class="col-md-4">
                                <input type="text" class="form-control cep @error('cep') is-invalid @enderror" placeholder="Digite seu CEP" aria-label="cep"
                                    name="cep" id="cep" required size="10" maxlength="9">
                                    @error('cep')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>    
                                    @enderror
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Rua" aria-label="Rua" readonly
                                    name="rua" id="rua" required>
                            </div>
                            <div class="col-md-3">
                                <input type="number" class="form-control @error('numero') is-invalid @enderror" placeholder="Nº" aria-label="Número"  value="{{ old('numero') }}"
                                    name="numero" id="numero" required>
                                    @error('numero')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>    
                                    @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Bairro" aria-label="Bairro" readonly
                                    name="bairro" id="bairro" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Cidade" aria-label="Cidade" readonly
                                    name="cidade" id="cidade" required>
                            </div>
                        </div>
    
                        <div class="row">
                        </div>
    
                        <div class="row">
                            <div class="d-flex justify-content-end text-center">
                                <div class="col-8">
                                    <a class="" href="{{ route('login') }}">
                                        {{ __('Já está cadastrado?') }}
                                    </a>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn bg-dark botao_cadastrar">Cadastrar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
        </section>
        <section class="fixed-bottom">
            <div class="container-fluid footer">
              <div class="content">
                  Desenvolvido por Lucas Steinbach {{date('d/m/Y');}}
              </div>
            </div>
        </section>    
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src = "https://code.jquery.com/jquery-3.6.0.min.js"
    integrity = "sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin = "anonymous" ></script>
    {{-- <script src="{{ asset('js/validate_input.js') }}"></script> --}}
    <script src="{{ asset('js/api_cep.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.telefone').mask('(00) 00000-0000');
            $('.cep').mask('00000-000');
        });
    </script>
</body>

</html>