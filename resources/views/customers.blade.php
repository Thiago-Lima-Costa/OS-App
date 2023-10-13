@extends('layouts.master')


@section('content')
    
    <table class="table table-striped m-2">
        <thead>
            <tr>
                <th class="text-center">Cliente</th>
                <th class="text-center">Telefone</th>
                <th class="text-center">Ordens de Serviço</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($customers as $customer)
                <tr>
                    <td class="text-center">{{$customer->name}}</td>
                    <td class="text-center">{{$customer->phone}}</td>
                    <td class="text-center"> {{$customer->serviceOrder->count()}}  Ordens de Serviço</td>
                </tr>
            @empty
                </tbody>
                <h3>Não existem usuários cadastrados!</h3>
            @endforelse
            
        </tbody>
    </table>

@endsection