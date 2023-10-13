@extends('layouts.master')


@section('content')
    @if (Session::has('soUpdateSuccess'))
        <p class="text-success">{{ Session::get('soUpdateSuccess') }}</p>
    @endif
    @if (Session::has('soUpdateFail'))
        <p class="text-danger">{{ Session::get('soUpdateFail') }}</p>
    @endif
    <h1 class="text-center">Atualizar Usuário</h1>   

    <form action="{{route('so.update', ['id' => $order->id])}}" method="post">
            @csrf
            @method("PUT")
            <div class="form-group m-2 p-1">
                <label>Técnico Responsável:</label>
                <select name="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{$user->id}}" {{ ($order->user->id == $user->id) ? 'selected' : '' }}>{{$user->name}}</option>
                    @endforeach
                </select>
                @error('user_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group m-2 p-1">
                <label>Ciente:</label>
                <select name="customer_id" class="form-control">
                    @foreach($customers as $customer)
                        <option value="{{$customer->id}}" {{ ($order->customer->id == $customer->id) ? 'selected' : '' }}>{{$customer->name}}</option>
                    @endforeach
                </select>
                @error('customer_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group m-2 p-1">
                <label>Produto:</label>
                <input type="text" name="product" class="form-control" value="{{$order->product}}">

                @error('product')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group m-2 p-1">
                <label>Reclamação do Cliente:</label>
                <input type="text" name="complaint" class="form-control" value="{{$order->complaint}}">

                @error('complaint')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group m-2 p-1">
                <label>Diagnóstico:</label>
                <input type="text" name="diagnosis" class="form-control" value="{{$order->diagnosis}}">

                @error('diagnosis')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group m-2 p-1">
                <label>Orçamento:</label>
                <input type="text" name="value" class="form-control" value="{{$order->value}}">

                @error('value')
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