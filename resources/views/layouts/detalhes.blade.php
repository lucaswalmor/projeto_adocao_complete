<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detalhes.css') }}">
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
        <section class="mt-3">
            <div class="container text-center">
                <p>
                <h3>
                    Para garantir o bem-estar dos cães adotados, temos algumas preocupações e premissas que norteiam a
                    entrevista e o acompanhamento da adaptação do bichinho.
                </h3>
                <br>
                <h4>Veja abaixo:</h4>
                <br>
                - As adoções são feitas diretamente com o doador, que será disponibilizado o contato pelo site para que
                você possa entrar em contato com ele e combinar a sua adoção.
                <br>
                - Pedimos para que o doador se comprometa a saber da situação do adotante para saber se sua nova família
                estará apta emocionalmente a ter um novo pet em sua casa. Se terá tempo, paciência, dedicação. Cães são
                como crianças. Precisam de atenção.
                <br>
                - O pet precisa ter espaço físico, segurança, comida, água e dedicação. Caso seja um quintal aberto, é
                preciso garantir que o cão tenha um espaço coberto e fechado para se proteger da chuva e do sol.
                <br>
                - O tutor deve garantir assistência veterinária em caso de doenças e incômodos do animal. Bem como se
                preocupar com as vacinações anuais.
                <br>
                - Em caso de real impossibilidade de manter a adoção, o adotante deverá registra-lo novamente no site e
                buscar uma familia o mais urgente possivel para o pet.
                </p>
            </div>
        </section>

        <section class="mt-5 mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 detalhes-img">
                        @foreach ($detalhes as $item)
                            @php
                                $foto = json_decode($item->fotos);
                            @endphp
                            @foreach ($foto as $key => $array)
                                <div class="card card_detalhes" style="width: 18rem;">
                                    <img src="{{ asset('storage/pets/' . $item->pet_id . '/' . $array) }}"
                                        class="d-block w-100 abrirModal" id="{{ $key }}" onclick="expandImage(this)">
                                </div>

                                <!-- Modal Imagens-->
                                <div class="modal fade" id="myModal_{{$key}}" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <img src="" id="foto_{{ $key }}" />
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                            <!-- Modal Dados Usuario-->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title" id="exampleModalLabel">Entre em contato com o doador</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="input-group flex-nowrap mb-3">
                                                <span class="input-group-text" id="addon-wrapping"><a href="https://www.instagram.com/{{ $item->instagram }}" target="_blank" rel="noopener noreferrer" style="text-decoration: none; color: #333;"><i class="fa-brands fa-instagram"></i></a></span>
                                                <input type="text" class="form-control input-detalhes" value="{{ $item->instagram }}" aria-label="Username" aria-describedby="addon-wrapping" disabled>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control input-detalhes" value="{{ $item->email }}" aria-label="Recipient's username" aria-describedby="basic-addon2" disabled>
                                                <span class="input-group-text" id="basic-addon2"><a href="mailto:{{ $item->email }}" target="_blank" style="text-decoration: none; color: #333;"><i class="fa-solid fa-envelope"></i></a></span>
                                            </div>
                                            <div class="input-group flex-nowrap mb-3">
                                                <span class="input-group-text" id="addon-wrapping"><a href="https://api.whatsapp.com/send?phone={{$item->telefone}}" target="_blank" style="text-decoration: none; color: #333;"><i class="fa-solid fa-phone"></i></a></span>
                                                <input type="text" class="form-control input-detalhes" value="{{ $item->telefone }}" aria-label="Username" aria-describedby="addon-wrapping" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{ $item->cidade }}" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{ $item->bairro }}" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{ $item->rua }} Nº {{ $item->numero }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <table class="table tabela table-striped table-dark table-hover">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">Informações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detalhes as $item)
                                    <tr>
                                        <th>Nome:</th>
                                        <td>{{ $item->nome }}</td>
                                    </tr>
                                    <tr>
                                        <th>Espécie:</th>
                                        <td>{{ $item->especie }}</td>
                                    </tr>
                                    <tr>
                                        <th>Raça:</th>
                                        <td>{{ $item->raca }}</td>
                                    </tr>
                                    <tr>
                                        <th>Porte:</th>
                                        <td>{{ $item->porte }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sexo:</th>
                                        <td>{{ $item->sexo }}</td>
                                    </tr>
                                    <tr>
                                        <th>Situação:</th>
                                        <td>{{ $item->situacao }}</td>
                                    </tr>
                                    <tr>
                                        <th>História:</th>
                                        <td>{{ $item->historia }}</td>
                                    </tr>
                                    <tr>
                                        <th>Idade:</th>
                                        <td>{{ $item->idade }} {{ $item->idade_tipo}}</td>
                                    </tr>
                                    <tr>
                                        <th>Cor:</th>
                                        <td>{{ $item->cor_pelo }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pelagem:</th>
                                        <td>{{ $item->pelagem }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <button class="btn col-12 botao_adotar" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Quero Adotar
                        </button>
                    </div>
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>        
        function expandImage(id) {
            var id_img = $(id).attr("id");
            var url = $(id).attr("src");
            $("#foto_" + id_img).attr("src", url);
            $("#myModal_"+ id_img).modal("show");
        }

        $(document).ready(function() {
            $(".botao_adotar").click(function() {
                $("#myModal").modal("show");
            });
        });
    </script>

</body>

</html>
