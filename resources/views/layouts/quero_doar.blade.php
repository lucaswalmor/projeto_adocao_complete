<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
  <link rel="stylesheet" href="{{ asset('css/quero_doar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/mobile.css') }}">
  <title>Projeto Adoção - Quero Doar</title>
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
                    <a class="nav-link" aria-current="page" href="{{ route('quero_adotar') }}">Quero Doar</a>
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
    <section class="mt-3 mb-3">
      <div class="container d-flex justify-content-start">
        <div class="formulario">
          <div class="row mb-3">
            <h3>Registre seu pet para adoção</h3>
          </div>
          <form class="row g-3 needs-validation" novalidate  action="{{ route('cadastro_doacao') }}" method="POST" enctype="multipart/form-data"> 
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <div class="row">
              <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Nome do pet" aria-label="Nome" name="nome" id="nome" required>
              </div>

              <div class="col-md-4">
                <input type="number" class="form-control" placeholder="Idade em anos" aria-label="Idade" name="idade" id="idade">
              </div>

              <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Raça" aria-label="Raça" name="raca" id="raca">
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Cor do pet" aria-label="Cor do pet" name="cor_pelo" id="cor_pelo">
              </div>
              <div class="col-md-4">
                <select class="form-select" name="temperamento" id="temperamento" required>
                  <option selected disabled>Temperamento...</option>
                  <option>Dócil</option>
                  <option>Agressivo</option>
                </select>
              </div>
              
              <div class="col-md-4">
                <select class="form-select" name="sexo" required>
                  <option selected disabled>Sexo...</option>
                  <option>Macho</option>
                  <option>Fêmea</option>
                </select>
              </div>

            </div>

            <div class="row">
              <div class="col-md-4">
                <select class="form-select" name="porte" id="porte" required>
                  <option selected disabled>Porte...</option>
                  <option>Grande</option>
                  <option>Médio</option>
                  <option>Pequeno</option>
                </select>
              </div>
              <div class="col-md-4">
                <select class="form-select" name="pelagem" id="pelagem" required>
                  <option selected disabled>Pelagem...</option>
                  <option>Grande</option>
                  <option>Média</option>
                  <option>Curta</option>
                </select>
              </div>
              <div class="col-md-4">
                <select class="form-select" name="especie" id="especie" required>
                  <option selected disabled>Espécie...</option>
                  <option>Canino</option>
                  <option>Felino</option>
                  <option>Roedor</option>
                  <option>Réptil</option>
                  <option>Ave</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="">
                <textarea class="form-control" placeholder="Situação (informar se as vacinas estão em dia, se o pet esta bem de saúde e etc)" id="situacao" name="situacao" required></textarea>
              </div>
            </div>

            <div class="row">
              <div class="">
                <textarea class="form-control" placeholder="Conte-nos um pouco sobre a história do pet para que seu próximo dono conheça ele um pouco mais" id="historia" name="historia"></textarea>
              </div>
            </div>

            <div class="row mt-2">
              <div class="">
                <label for="fotos" class="form-label">Fotos do pet</label>
                <input class="form-control" type="file" id="fotos" name="fotos[]"  multiple="multiple" required  accept="image/gif, image/png, image/jpeg, image/pjpeg">
              </div>
            </div>

            <div class="row">
              <div class=" d-flex justify-content-end">
                <button type="submit" class="btn bg-dark botao_cadastrar">Cadastar Pet</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </main>
  <footer>
    <section>
        <div class="container-fluid footer ">
          <div class="content">
            Desenvolvido por Lucas Steinbach {{date('d/m/Y');}}
          </div>
        </div>
    </section>            
  </footer>
  
  <script src="{{ asset('js/validate_input.js') }}"></script>
  <script src="{{ asset('js/show_images.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <script src = "https://code.jquery.com/jquery-3.6.0.min.js"
  integrity = "sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin = "anonymous" > </script>


</body>

</html>