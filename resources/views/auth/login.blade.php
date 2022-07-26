<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/quero_adotar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mobile.css') }}">
    <title>Login</title>
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
                                <a class="nav-link" aria-current="page" href="{{ route('quero_doar') }}">Quero Doar</a>
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
                                <a class="nav-link" aria-current="page" href="{{ route('quero_adotar') }}">Quero Adotar</a>
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
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link">Sair</a>
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
        <div class="container justify-content-center align-items-center mt-5 d-flex">
            <div class="login-card mb-5">
                <form class="formulario-login" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="col-12 text-center">
                        <h3>Login</h3>
                    </div>
                    {{-- MENSAGEM DE CADASTRO REALIZADO COM SUCESSO --}}
                    @if($errors->any())
                      <div class="alerta">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <h4>{{$errors->first()}}</h4>                  
                        </div>
                      </div>              
                    @endif
                    <div class="mb-3 col-12">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" autofocus>
                    </div>
                    <div class="mb-3 col-12">
                      <label for="senha" class="form-label">Senha</label>
                      <input type="password" name="password" class="form-control" id="senha">
                    </div>
                    <div class="mb-3 col-12 row">

                        <div class="mb-1 col-12">
                            <div class="form-check mb-1 col-12">
                                <input class="form-check-input" type="checkbox" value="" name="remember" id="remember_me">
                                <label class="form-check-label" for="remember_me">
                                    {{ __('Remember me') }}
                                </label>
                            </div>
                        </div>
            
                        {{-- <div class="mb-2 col-12">
                            @if (Route::has('password.request'))
                                <a class="esqueceu_senha" href="{{ route('password.request') }}">
                                    {{ __('Esqueceu sua senha?') }}
                                </a>
                            @endif
                        </div> --}}
                        <a href="{{ route('register') }}" class="botao_registrar mb-3"><button type="button" class="btn">Registrar-se</button></a> 
                        <button type="submit" class="btn botao_login">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
        <section>
            <div class="container-fluid footer">
              <div class="col-md-12 d-flex footer-flex">
                <div class="col-md-6 d-flex align-items-center justify-content-center">                  
                  Parceiros
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                  <div class="col-6 d-flex justify-content-center">              
                    Desenvolvido por Lucas Steinbach <br>
                    Contato para desenvolvimento ->
                  </div>
                  <div class="col-6 d-flex flex-column links-contato">
                    <span><a href="https://www.instagram.com/lucassteinbach/" target="_blank"><i class="fa-brands fa-instagram"></i>Instagram</a></span>
                    <span><a href="https://www.facebook.com/lucas.walmor" target="_blank"><i class="fa-brands fa-facebook"></i>Facebook</a></span>
                    <span><a href="https://api.whatsapp.com/send?phone=5534992021394&text=Ol%C3%A1%20Lucas%2C%20gostaria%20de%20fazer%20um%20or%C3%A7amento%20de%20site." target="_blank"><i class="fa-brands fa-whatsapp"></i>WhatsApp</a></span>
                    <span><a href="mailto:lucaswsb52@gmail.com" target="_blank"><i class="fa-solid fa-envelope"></i>Email</a></span>
                  </div>
                </div>
              </div>
            </div>
        </section>  
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>