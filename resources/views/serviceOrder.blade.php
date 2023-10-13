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
        <div class="col bg-body-tertiary">

          <div class="border p-1">
          <h2 class="text-center">Ordem de Serviço Nº{{$order->id}}</h2>
          <p class="text-center"><span><strong>Técnico responsável:</strong> {{$order->user->name}}</span>  -  <span><strong>Data da abertura</strong> {{$order->created_at->format('d/m/Y')}}</span></p>
          <hr>
          <h5 class="text-center">Informações do Cliente</h5>
          <p><strong>Nome: </strong>{{$order->customer->name}}</p>
          <p><strong>Telefone: </strong>{{$order->customer->phone}}</p>
          <br>
          <hr>
          <h5 class="text-center">Produto</h5>
          <p>{{$order->product}}</p>
          <br>
          <hr>
          <h5 class="text-center">Reclamação do Cliente</h5>
          <p>{{$order->complaint}}</p>
          <br>
          <hr>
          <h5 class="text-center">Diagnóstico e Serviço a Ser Executado</h5>
          <p>{{$order->diagnosis}}</p>
          <br>
          <hr>
          <h5 class="text-center">Orçamento</h5>
          <p>R$ {{$order->value}}</p>
          <br>
          </div>
          <a href="{{route('so.edit', $order->id)}}" class="btn btn-sm btn-warning m-1">Editar O.S.</a>
          <p><small>Última Modificação {{$order->updated_at->format('d/m/Y')}}</small></p>
            
        </div>

        </div>

        <div>
            <footer class="py-3 my-4">
               <div class="text-center">
                <a href="{{route('so.print')}}" class="btn btn-primary">Gerar Arquivo Para Impressão</a>
                <a href="{{route('so.index')}}" class="btn btn-primary">Voltar</a>
               </div>
              <p class="text-center border-top p-3 m-3 text-body-secondary">Eletrônica Modelo - Sistema O.S.</p>
            </footer>
        </div>
    </div>
</body>
</html>