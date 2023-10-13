<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>Login</title>
</head>
<body>
  <h2>Login</h2>

  <div class="text-center">
  
      @if (session()->has('error_login'))
          {{ session()->get('error_login') }}
      @endif
  
      @if (auth()->guest())
      <form action="{{ route('login') }}" method="post">
          @csrf
          {{ $errors->first('email') }}
          <input type="email" name="email" placeholder="email">
          {{ $errors->first('password') }}
          <input type="password" name="password" placeholder="senha">
          
          <button type="submit">Entrar</button>
      </form>
      @else
          <h2>Você já está logado</h2>
      @endif
      
  </div>
</body>
</html>