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
    <link rel="stylesheet" href="{{ asset('css/quero_adotar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mobile.css') }}">
    <title>Projeto Adoção - Quero Adotar</title>
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
                                    <a class="nav-link" aria-current="page" href="{{ route('quero_doar') }}">Quero
                                        Doar</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link">Quero Doar</a>
                                </li>
                            @endauth
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="#">Quero Adotar</a>
                        </li>
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
        <section class="mt-5">
            <div class="container-fluid containerCards">
                {{-- MENSAGEM DE CADASTRO REALIZADO COM SUCESSO --}}
                @if($errors->any())
                  <div class="alerta">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <h4>{{$errors->first()}}</h4>                  
                    </div>
                  </div>              
                @endif
                <input type="hidden" name="id_mais_detalhes" id="id_mais_detalhes">
                @foreach ($pets as $item)
                    @php
                        $foto = json_decode($item->fotos);
                    @endphp
                    <div class="card">
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($foto as $array)
                                    <div class="carousel-item active">
                                        <img src="{{ asset('storage/pets/' . $item->pet_id . '/' . $array )}}" class="d-block w-100" alt="...">
                                    </div>                          
                                @endforeach              
                            </div>
                        </div>   
                        <div class="card-body text-white bg-dark">
                            <div class="col-12">
                                <h5 class="card-title">{{ $item->nome}}</h5>
                            </div>
                            <div class="col-12 d-flex">
                                <div class="col-6">
                                    <a href="{{ route('mais_detalhes', $item->pet_id)}}" class="mais_detalhes">Detalhes</a>
                                </div>
                                <div class="col-6">
                                    @if (Auth::user()->id == $item->user_id)
                                        <a href="{{ route('delete', $item->pet_id)}}" class="mais_detalhes">Remover Pet</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>  
        <section>
            <div class="container-fluid footer">
                <div class="col-md-12 d-flex footer-flex">
                <div class="col-md-6 d-flex align-items-center justify-content-center"">                  
                  Desenvolvido por Lucas Steinbach
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                  <div class="col-6 d-flex justify-content-center">
                    <h5>Contato para desenvolvimento</h5>
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
