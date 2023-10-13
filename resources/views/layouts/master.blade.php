<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    

    <title>{{$title}}</title>
</head>
<body class="">
    <div class="container">
        <div>
            <header class="p-3 mb-3 border-bottom bg-body-tertiary">
                <div class="container">
                    <div class="row d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <div class="col">
                        <h2 class="text-primary">Eletônica Exemplo</h2>
                        </div>
                        <div class="col">
                        <h4 class="text-center">Sistema O.S.</h4>
                        </div>
                        <div class="col">
                        
                        </div>
                    </div>
                </div>
              </header>
        </div>
        <div class="row">
            <div class="col-3">
                <aside>
                    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px;">
                        <h3>{{auth()->user()->name}}</h3>
                        <p>{{auth()->user()->position->name}}</p>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                          <li class="nav-item">
                            <a href="/" class="nav-link link-body-emphasis">
                              Home
                            </a>
                          </li>
                          <li>
                            <a href="{{route('so.index')}}" class="nav-link link-body-emphasis">
                              Ordens de Serviço
                            </a>
                          </li>
                          <li>
                            <a href="{{route('so.create')}}" class="nav-link link-body-emphasis">
                              Cadastrar O.S.
                            </a>
                          </li>
                          <li>
                            <a href="{{route('customer.index')}}" class="nav-link link-body-emphasis">
                              Clientes
                            </a>
                          </li>
                          <li>
                            <a href="{{route('customer.create')}}" class="nav-link link-body-emphasis">
                              Cadastrar Cliente
                            </a>
                          </li>
                          <li>
                            <a href="{{route('user.index')}}" class="nav-link link-body-emphasis">
                              Usuários
                            </a>
                          </li>
                          @if (auth()->user()->position_id == 1)
                          <li>
                            <a href="{{route('user.create')}}" class="nav-link link-body-emphasis">
                              Cadastrar Novo Usuário
                            </a>
                          </li>
                          @endif
                        </ul>
                        <hr>
                        <div class="">
                          <a href="{{route('logout')}}" class="nav-link link-body-emphasis text-center">
                            Sair
                          </a>
                        </div>
                      </div>
                </aside>
            </div>
           
           <!-- ## Conteúdo dinâmico da página ##-->
            <div class="col bg-body-tertiary">
            
              @yield('content')
                
            </div>

        </div>

        <div>
            <footer class="py-3 my-4">
              <p class="text-center border-top p-3 m-3 text-body-secondary">Eletrônica Modelo - Sistema O.S.</p>
            </footer>
        </div>
    </div>
</body>
</html>