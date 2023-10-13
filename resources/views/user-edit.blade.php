@extends('layouts.master')


@section('content')
    @if (Session::has('userUpdateSuccess'))
        <p class="text-success">{{ Session::get('userUpdateSuccess') }}</p>
    @endif
    @if (Session::has('userUpdateFail'))
        <p class="text-danger">{{ Session::get('userUpdateFail') }}</p>
    @endif
    <h1 class="text-center">Atualizar Usuário</h1>   

    <form action="{{route('user.update', ['id' => $user->id])}}" method="post">
            @csrf
            @method("PUT")

            <div class="form-group m-2 p-1">
                <label>Nome:</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}">

                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group m-2 p-1">
                <label>Cargo:</label>
                <select name="position_id" class="form-control">
                    @foreach($positions as $position)
                        <option value="{{$position->id}}">{{$position->name}}</option>
                    @endforeach
                </select>

                @error('position')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group m-2 p-1">
                <label>Email:</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}">

                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="m-2 p-1">
                <button type="submit" class="btn btn-sm btn-warning">Atualizar Cadastro</button>
            </div>
    </form>
    <br>
    <br>
    <hr>
    <br>
    @if (auth()->user()->id == $user->id)
    <h2 class="text-center">Alterar Senha</h2>
    @if (Session::has('pwdUpdateSuccess'))
        <p class="text-success">{{ Session::get('pwdUpdateSuccess') }}</p>
    @endif
    @if (Session::has('pwdUpdateFail'))
        <p class="text-danger">{{ Session::get('pwdUpdateFail') }}</p>
    @endif
    <form action="{{route('user.password-update', ['id' => $user->id])}}" method="post">
        @csrf
        @method("PUT")

        <div class="form-group m-2 p-1">
            <label>Informe a Senha Atual:</label>
            <input type="password" name="current_password" class="form-control">
            @if ($errors->first('current_password'))
            <p class="text-danger mt-1"><small>Insira a senha atual!!</small></p> 
            @endif
        </div>
        <div class="form-group m-2 p-1">
            <label>Informe a Nova Senha:</label>
            <input type="password" name="password" class="form-control">
            @if ($errors->first('password'))
            <p class="text-danger mt-1"><small>Insira uma senha válida!</small></p> 
            @endif
        </div>
        <div class="form-group m-2 p-1">
            <label>Confirme a Senha:</label>
            <input type="password" name="password_confirmation" class="form-control">
            @if ($errors->first('password_confirmation'))
            <p class="text-danger mt-1"><small>As duas senhas informadas precisam ser iguais!</small></p> 
            @endif
        </div>

        <div class="m-2 p-1">
            <button type="submit" class="btn btn-sm btn-warning">Atualizar Senha</button>
        </div>

    </form>
    @endif
           
@endsection