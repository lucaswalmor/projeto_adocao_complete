<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logos/favicon.ico')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            {{-- MENSAGEM DE CADASTRO REALIZADO COM SUCESSO --}}
            @if($errors->any())
              <div class="alerta">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <h4>{{$errors->first()}}</h4>                  
                </div>
              </div>              
            @endif
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

                    Todas as áreas do site necessita que você esteja logado, pois precisamos de seus dados para sabermos quem esta adotando ou doando um pet,
                    entao registre-se e faça parte deste bem.

                    Aqui você poderá acessar a página de doação caso queira doar algum pet, nela haverá um formulário de cadastro para você registrar o pet com todas
                    as informações, para que a pessoa interessada em doar ele consiga conhece-lo antes. <br>
                    Temos também a página de adoção que trará todos os pets que estarão para adoção, nesta página estará a primeira foto do pet, terá como você acessar
                    as informações do pet para saber mais sobre ele, nesta página também haverá um botão de "QUERO ADOTAR" que conterá todas as inforações do doador,
                    para que você possa entrar em contato e adotar seu pet.

                </p>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>