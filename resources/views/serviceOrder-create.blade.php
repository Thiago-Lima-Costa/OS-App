@extends('layouts.master')


@section('content')
    @if (Session::has('soCreateSuccess'))
    <p class="text-success">{{ Session::get('soCreateSuccess') }}</p>
    @endif
    @if (Session::has('soCreateFail'))
    <p class="text-danger">{{ Session::get('soCreateFail') }}</p>
    @endif
   <h1 class="text-center">Cadastrar Ordem de Serviço</h1>   

   <form action="{{route('so.store')}}" method="post">
        @csrf
        <div class="form-group m-2 p-1">
            <label>Técnico Responsável:</label>
            <select name="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            @if ($errors->first('user_id'))
            <p class="text-danger mt-1"><small>Preenchimento obrigatório</small></p> 
            @endif
        </div>
        <div class="form-group m-2 p-1">
            <label>Cliente:</label>
            <select name="customer_id" class="form-control">
                @foreach($customers as $customer)
                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                @endforeach
            </select>
            @if ($errors->first('customer_id'))
            <p class="text-danger mt-1"><small>Preenchimento obrigatório</small></p> 
            @endif
        </div>

        <div class="form-group m-2 p-1">
            <label>Produto:</label>
            <input type="text" name="product" class="form-control" value="{{old('product')}}">
            @if ($errors->first('product'))
            <p class="text-danger mt-1"><small>Preenchimento obrigatório</small></p> 
            @endif
        </div>
        <div class="form-group m-2 p-1">
            <label>Reclamação do Cliente:</label>
            <input type="text" name="complaint" class="form-control" value="{{old('complaint')}}">
            @if ($errors->first('complaint'))
            <p class="text-danger mt-1"><small>Preenchimento obrigatório</small></p> 
            @endif
        </div>
        <div class="form-group m-2 p-1">
            <label>Diagnóstico:</label>
            <input type="text" name="diagnosis" class="form-control" value="{{old('diagnosis')}}">
            @if ($errors->first('diagnosis'))
            <p class="text-danger mt-1"><small>Preenchimento obrigatório</small></p> 
            @endif
        </div>
        <div class="form-group m-2 p-1">
            <label>Valor:</label>
            <input type="text" name="value" class="form-control" value="{{old('value')}}">
            @if ($errors->first('value'))
            <p class="text-danger mt-1"><small>Preenchimento obrigatório</small></p> 
            @endif
        </div>
       
        <div class="m-2 p-1">
            <button type="submit" class="btn btn-sm btn-warning">Cadastrar</button>
        </div>
   </form>
           
@endsection