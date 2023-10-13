@extends('layouts.master')

@section('content')
    <div class="row p-3">
        <div class="col">
            <a href="{{route('so.index')}}" class="btn btn-primary">Ordens de Serviço</a>
        </div>
        <div class="col">
            <a href="{{route('so.create')}}" class="btn btn-primary">Cadastrar O.S.</a>
        </div>
        <div class="col">
            <a href="{{route('customer.index')}}" class="btn btn-primary">Clientes</a>
        </div>
    </div>
    <div>
        <form action="">
            
        </form>
    </div>
@endsection
