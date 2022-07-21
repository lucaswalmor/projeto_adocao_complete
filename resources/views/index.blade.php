<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logos/favicon.ico')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mobile.css') }}">
    <title>Projeto Adoção</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="#" >
                <img src=" {{ asset('img/logos/logo.png') }}" class="logo" alt="">
              </a>
              <div class="text-header">
                <h3>PROJETO ADOÇÃO</h3>
                <h5>O projeto feito para você encontrar seu melhor amigo!</h5>
              </div>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="justify-content-end collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ">
                  
                  
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
                          <a class="nav-link" href="{{ route('quero_adotar') }}">Quero Adotar</a>
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
                  @if (Route::has('login'))
                    @auth
                      <li class="nav-item">
                        <a class="nav-link" href="#">Seja Bem Vindo {{ Auth::user()->nome }}</a>
                      </li>
                    @endauth
                  @endif      
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
        <section class="mt-5">
            <div class="principal">
              @if (Route::has('login'))
                @auth
                  <a href="{{ route('quero_doar') }}">
                    <button class="botao_doar">
                        <img src="{{ asset('img/icone_doar_1.png') }}" alt="">
                        <span>Quero Doar</span>
                    </button>
                  </a>
                @else
                  <a href="{{ route('login') }}">
                    <button class="botao_doar">
                        <img src="{{ asset('img/icone_doar_1.png') }}" alt="">
                        <span>Quero Doar</span>
                    </button>
                  </a>
                @endauth
              @endif

              @if (Route::has('login'))
                @auth
                  <a href="{{ route('quero_adotar') }}">
                    <button class="botao_doar">
                        <img src="{{ asset('img/icone_doar_2.png') }}" alt="">
                        <span>Quero Adotar</span>
                    </button>
                  </a>
                @else
                  <a href="{{ route('login') }}">
                    <button class="botao_doar">
                        <img src="{{ asset('img/icone_doar_2.png') }}" alt="">
                        <span>Quero Adotar</span>
                    </button>
                  </a>
                @endauth
              @endif
              <a href="{{ route('quero_ajudar')}}">
                <button class="botao_doar">
                    <img src="{{ asset('img/icone_doar_3.png') }}" alt="">
                    <span>Quero Ajudar</span>
                </button>
              </a>
            </div>
        </section>
        <section>
            <div class="sobre-nos">
                <h3>Sobre Projeto Doação</h3>
                <p>
                O Projeto Doação nasceu em 2022, em Uberaba. Com o intuito de pessoas que desejam doar seus animais, ou conhecem pessoas que queiram doar, sendo assim trazendo um lar para todos os pets.
                </p>
                <h3>COMO ATUAMOS</h3>
                <p>
                    Nosso site funciona como ponte ao facilitar que o pet chegue ao lar definitivo sendo acolhido como um novo membro da família.
                </p>
            </div>
        </section>   
    </main>
    <footer>
      <section>
          <div class="container-fluid footer">
            <div class="content">
              Desenvolvido por Lucas Steinbach {{date('d/m/Y');}}
            </div>
          </div>
      </section>            
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>