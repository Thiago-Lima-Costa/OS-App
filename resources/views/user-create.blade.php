@extends('layouts.master')


@section('content')
    @if (Session::has('userCreateSuccess'))
    <p class="text-success">{{ Session::get('userCreateSuccess') }}</p>
    @endif
    @if (Session::has('userCreateFail'))
    <p class="text-danger">{{ Session::get('userCreateFail') }}</p>
    @endif
   <h1 class="text-center">Cadastrar Novo Usuário</h1>   

   <form action="{{route('user.store')}}" method="post">
        @csrf

        <div class="form-group m-2 p-1">
            <label>Nome:</label>
            <input type="text" name="name" class="form-control" value="{{old('name')}}">
            @if ($errors->first('name'))
            <p class="text-danger mt-1"><small>Insira o nome do usuário!</small></p> 
            @endif
        </div>
        <div class="form-group m-2 p-1">
            <label>Cargo:</label>
            @foreach($positions as $position)
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="position_id" value="{{$position->id}}" {{ (old('position_id') == $position->id) ? 'checked' : '' }}>{{$position->name}}
                </div>
            @endforeach
            @if ($errors->first('position_id'))
            <p class="text-danger mt-1"><small>Escolha o cargo do usuário!</small></p> 
            @endif
        </div>
        <div class="form-group m-2 p-1">
            <label>Email:</label>
            <input type="text" name="email" class="form-control" value="{{old('email')}}">
            @if ($errors->first('email'))
            <p class="text-danger mt-1"><small>Insira um e-mail válido!</small></p> 
            @endif
        </div>
        <div class="form-group m-2 p-1">
            <label>Senha:</label>
            <input type="password" name="password" class="form-control">
            @if ($errors->first('password'))
            <p class="text-danger mt-1"><small>Insira uma senha válida!</small></p> 
            <p class="text-danger mt-1"><small>As duas sennhas informadas precisam ser iguais!</small></p> 
            @endif
        </div>
        <div class="form-group m-2 p-1">
            <label>Confirme a Senha:</label>
            <input type="password" name="password_confirmation" class="form-control">
            @if ($errors->first('password_confirmation'))
            <p class="text-danger mt-1"><small>Por favor informe a senha novamente!</small></p> 
            @endif
        </div>
        <div class="m-2 p-1">
            <button type="submit" class="btn btn-sm btn-warning">Cadastrar</button>
        </div>
   </form>
           
@endsection