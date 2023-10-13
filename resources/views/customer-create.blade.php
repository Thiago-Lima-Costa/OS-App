@extends('layouts.master')


@section('content')
    @if (Session::has('customerCreateSuccess'))
    <p class="text-success">{{ Session::get('customerCreateSuccess') }}</p>
    @endif
    @if (Session::has('customerCreateFail'))
    <p class="text-danger">{{ Session::get('customerCreateFail') }}</p>
    @endif

   <h1 class="text-center">Cadastrar Novo Cliente</h1>   

   <form action="{{route('customer.store')}}" method="post">
        @csrf

        <div class="form-group m-2 p-1">
            <label>Nome:</label>
            <input type="text" name="name" class="form-control" value="{{old('name')}}">
            @if ($errors->first('name'))
            <p class="text-danger mt-1"><small>Insira o nome do cliente!</small></p> 
            @endif
        </div>
        <div class="form-group m-2 p-1">
            <label>Telefone:</label>
            <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
            @if ($errors->first('phone'))
            <p class="text-danger mt-1"><small>Insira um número de telefone!</small></p> 
            @endif
        </div>
        <div class="m-2 p-1">
            <button type="submit" class="btn btn-sm btn-warning">Cadastrar</button>
        </div>
   </form>
           
@endsection