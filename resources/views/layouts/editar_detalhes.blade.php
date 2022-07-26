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
    <section class="mt-3 mb-3">
      <div class="container d-flex justify-content-start">
        <div class="formulario">
          <div class="row mb-3">
            <h3>Editar Informações do pet</h3>
          </div>
          <form class="row g-3 needs-validation" novalidate  action="{{ route('update_detalhes') }}" method="POST" enctype="multipart/form-data"> 
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="pet_id" value="{{$pet_id}}">
            <div class="row">
              <div class="col-md-4">
                <input type="text" class="form-control capitalize @error('nome') is-invalid @enderror" placeholder="Nome do pet" aria-label="Nome" name="nome" id="nome" required value="{{ $detalhes->nome_pet }}">
                @error('nome')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>    
                @enderror
              </div>

              <div class="col-md-4">
                <input type="number" class="form-control @error('idade') is-invalid @enderror" placeholder="Idade em anos" aria-label="Idade" name="idade" id="idade" value="{{ $detalhes->idade }}">
                @error('idade')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>    
                @enderror
              </div>

              <div class="col-md-4">
                <select class="form-select @error('idade_tipo') is-invalid @enderror" name="idade_tipo" id="idade_tipo" required>
                  <option selected disabled>...</option>
                  <option value="Anos" {{ $detalhes->idade_tipo == 'Anos' ? 'selected' : '' }}> Anos</option>
                  <option value="Meses" {{ $detalhes->idade_tipo == 'Meses' ? 'selected' : '' }}> Meses</option>
                </select>
                @error('idade_tipo')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>    
                @enderror
              </div>
            </div>

            <div class="row">

              <div class="col-md-4">
                <input type="text" class="form-control capitalize @error('raca') is-invalid @enderror" placeholder="Raça" aria-label="Raça" name="raca" id="raca" value="{{ $detalhes->raca }}">
                @error('raca')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>    
                @enderror
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control capitalize @error('cor_pelo') is-invalid @enderror" placeholder="Cor do pet" aria-label="Cor do pet" name="cor_pelo" id="cor_pelo" value="{{ $detalhes->cor_pelo }}">
                @error('cor_pelo')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>    
                @enderror
              </div>
              <div class="col-md-4">
                <select class="form-select @error('temperamento') is-invalid @enderror" name="temperamento" id="temperamento" required>
                  <option selected disabled>Temperamento...</option>
                  <option value="Dócil" {{ $detalhes->temperamento == 'Dócil' ? 'selected' : '' }}> Dócil</option>
                  <option value="Agressivo" {{ $detalhes->temperamento == 'Agressivo' ? 'selected' : '' }}> Agressivo</option>
                </select>
                @error('temperamento')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>    
                @enderror
              </div>
            </div>

            <div class="row">              
              <div class="col-md-3">
                <select class="form-select @error('sexo') is-invalid @enderror" name="sexo" required>
                  <option selected disabled>Sexo...</option>
                  <option value="Macho" {{ $detalhes->sexo == 'Macho' ? 'selected' : '' }}> Macho</option>
                  <option value="Fêmea" {{ $detalhes->sexo == 'Fêmea' ? 'selected' : '' }}> Fêmea</option>
                </select>
                @error('sexo')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>    
                @enderror
              </div>
              <div class="col-md-3">
                <select class="form-select @error('porte') is-invalid @enderror" name="porte" id="porte" required>
                  <option selected disabled>Porte...</option>
                  <option value="Grande" {{ $detalhes->porte == 'Grande' ? 'selected' : '' }}> Grande</option>
                  <option value="Médio" {{ $detalhes->porte == 'Médio' ? 'selected' : '' }}> Médio</option>
                  <option value="Pequeno" {{ $detalhes->porte == 'Pequeno' ? 'selected' : '' }}> Pequeno</option>
                </select>
                @error('porte')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>    
                @enderror
              </div>
              <div class="col-md-3">
                <select class="form-select @error('pelagem') is-invalid @enderror" name="pelagem" id="pelagem" required>
                  <option selected disabled>Pelagem...</option>
                  <option value="Grande" {{ $detalhes->pelagem == 'Grande' ? 'selected' : '' }}> Grande</option>
                  <option value="Média" {{ $detalhes->pelagem == 'Média' ? 'selected' : '' }}> Média</option>
                  <option value="Curta" {{ $detalhes->pelagem == 'Curta' ? 'selected' : '' }}> Curta</option>
                </select>
                @error('pelagem')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>    
                @enderror
              </div>
              <div class="col-md-3">
                <select class="form-select @error('especie') is-invalid @enderror" name="especie" id="especie" required>
                  <option selected disabled>Espécie...</option>
                  <option value="Canino" {{ $detalhes->especie == 'Canino' ? 'selected' : '' }}> Canino</option>
                  <option value="Felino" {{ $detalhes->especie == 'Felino' ? 'selected' : '' }}> Felino</option>
                  <option value="Roedor" {{ $detalhes->especie == 'Roedor' ? 'selected' : '' }}> Roedor</option>
                  <option value="Réptil" {{ $detalhes->especie == 'Réptil' ? 'selected' : '' }}> Réptil</option>
                  <option value="Ave" {{ $detalhes->especie == 'Ave' ? 'selected' : '' }}> Ave</option>
                </select>
                @error('especie')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>    
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="">
                <textarea class="form-control @error('situacao') is-invalid @enderror" placeholder="Situação (informar se as vacinas estão em dia, se o pet esta bem de saúde e etc)" id="situacao" name="situacao" required> {{ $detalhes->situacao }} </textarea>
                @error('situacao')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>    
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="">
                <textarea class="form-control @error('historia') is-invalid @enderror" placeholder="Conte-nos um pouco sobre a história do pet para que seu próximo dono conheça ele um pouco mais" id="historia" name="historia">{{ $detalhes->historia }}</textarea>
                @error('historia')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>    
                @enderror
              </div>
            </div>

            <div class="row mt-2">
              <div class="">
                <label for="fotos" class="form-label">Fotos do pet</label>
                <input class="form-control @error('fotos') is-invalid @enderror" type="file" id="fotos" name="fotos[]"  multiple="multiple" required  accept="image/gif, image/png, image/jpeg, image/pjpeg">
                @error('fotos')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>    
                @enderror
              </div>
            </div>

            <div class="row">
              <div class=" d-flex justify-content-end">
                <button type="submit" class="btn bg-dark botao_cadastrar">Editar Pet</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>  
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
  <script src="{{ asset('js/show_images.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <script src = "https://code.jquery.com/jquery-3.6.0.min.js"
  integrity = "sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin = "anonymous" > </script>


</body>

</html>