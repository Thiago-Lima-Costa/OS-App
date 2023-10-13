@extends('layouts.master')


@section('content')
    @if (Session::has('delSoSuccess'))
    <p class="text-success">{{ Session::get('delSoSuccess') }}</p>
    @endif
    @if (Session::has('delSoFail'))
    <p class="text-danger">{{ Session::get('delSoFail') }}</p>
    @endif
    <table class="table table-striped m-2">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Funcionário</th>
                <th class="text-center">Cliente</th>
                <th class="text-center">Valor</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td class="text-center">{{$order->id}}</td>
                    <td class="text-center">{{$order->user->name}}</td>
                    <td class="text-center">{{$order->customer->name}}</td>
                    <td class="text-center">R$ {{$order->value}}</td>
            
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{route('so.show', $order->id)}}" class="btn btn-sm btn-success m-1">Visualizar</a>
                            @if (auth()->user()->position_id == 1 || auth()->user()->id == $order->user->id)
                                <a href="{{route('so.edit', $order->id)}}" class="btn btn-sm btn-warning m-1">Editar</a>
                                <form action="{{route('so.destroy', $order->id)}}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-sm btn-danger m-1">Excluir</button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                </tbody>
                <h3>Não existem Ordens de Serviço cadastradas!</h3>
            @endforelse
            
        </tbody>
    </table>

@endsection