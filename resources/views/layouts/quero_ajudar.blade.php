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
    <link rel="stylesheet" href="{{ asset('css/quero_ajudar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mobile.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Projeto Adoção - Quero Ajudar</title>
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
                    <a class="nav-link" href="#">Quero Ajudar</a>
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
        <section class="mt-5">
            <div class="sobre-nos">
                <h3>FORMAS DE AJUDAR</h3>
                <p>
                    Que ótimo que você clicou aqui. É muito bonito ver a intenção das pessoas quando o assunto é ajudar uma causa que lhes toca. De imediato, já agradecemos seu envolvimento.
                    
                    Doações esporádicas nos ajudam muito e são super bem-vindas! Você pode escolher uma das duas formas de pagamento das opções abaixo, via MERCADO PAGO você será redirecionado para a plataforma deles sendo assim podendo escolher as opções de ( cartão de credito, débito ou boleto bancário) ou via PIX de acordo com o link abaixo, caso possa contribuir mensalmente com alguma quantia fixa, poderá entrar em contato com nossa equipe via email.

                    Todas as doações serão destinadas a manutenção do site, para podermos mantermos ele online e com atualizações continuas para que todos os pets possam continuar encontrando um lar.
                </p>
                
            </div>
            <div class="sobre-nos">
              <table class="table table-dark table-striped text-center">
                <thead>
                  <tr>
                    <th>Mercado Pago</th>
                    <th>PIX</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="align-middle">
                      <a href="https://mpago.la/1KDYKiS" target="_blank">Doação de R$ 1,00</a>
                    </td>
                      <td rowspan="2">
                        <img src="{{ asset('img/qrcode/qrcode.png')}}" style="height: 150px">                        
                      </td>
                  </tr>
                  <tr>
                    <td class="align-middle">
                      <a href="https://mpago.la/1qo7PFr" target="_blank">Doação de R$ 5,00</a>
                    </td>
                  </tr>
                  <tr>
                    <td class="align-middle">
                      <a href="https://mpago.la/2PKpXWX" target="_blank">Doação de R$ 10,00</a>
                    </td>
                    <td>
                      <a>Doação via pix pode ser feita de qualquer valor</a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a href="https://mpago.la/1VFo561" target="_blank">Doação de R$ 15,00</a>
                    </td>                    
                    <td>
                      <div class="d-flex col-12">
                          <div class="col-10">
                            <input type="text" class="form-control" id="qrcode" value="c4c0cd2f-e0b9-4697-af80-0600e14e062e">
                          </div>
                          <div class="col-2">
                            <button class="copy" data-toggle="popover" title="Código copiado com Sucesso" data-placement="top"><i class="fa-solid fa-copy"></i></button>
                          </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>              
            </div>
        </section>  
        <section>
            <div class="container-fluid footer">
              <div class="col-md-12 d-flex footer-flex mt-3">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
      $('.copy').click(function(){
            //Visto que o 'copy' copia o texto que estiver selecionado, talvez você queira colocar seu valor em um txt escondido
          $('#qrcode').select();
          try {
                  var ok = document.execCommand('copy');
                  if (ok) { $('[data-toggle="popover"]').popover() }
              } catch (e) {
              alert(e)
          }
      });
    </script>
</body>
</html>