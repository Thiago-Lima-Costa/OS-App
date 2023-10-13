@extends('layouts.master')


@section('content')
    @if (Session::has('delUserSuccess'))
    <p class="text-success">{{ Session::get('delUserSuccess') }}</p>
    @endif
    @if (Session::has('delUserFail'))
    <p class="text-danger">{{ Session::get('delUserFail') }}</p>
    @endif
    <table class="table table-striped m-2">
        <thead>
            <tr>
                <th class="text-center">Funcionário</th>
                <th class="text-center">Cargo</th>
                <th class="text-center">Ordens de Serviço</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td class="text-center">{{$user->name}}</td>
                    <td class="text-center">{{$user->position->name}}</td>
                    <td class="text-center"> <a href="{{route('user.show', $user->id)}}" class="btn btn-sm btn-primary m-1"> <small>{{$user->serviceOrder->count()}}  Ordens de Serviço</small></a></td>
                    <td class="text-center">
                        <div class="btn-group">
                            @if (auth()->user()->position_id == 1 || auth()->user()->id == $user->id)
                                <a href="{{route('user.show', $user->id)}}" class="btn btn-sm btn-success m-1">PERFIL</a>
                                <a href="{{route('user.edit', $user->id)}}" class="btn btn-sm btn-warning m-1">EDITAR</a>
                            @endif
                            @if (auth()->user()->position_id == 1)
                                <form action="{{route('user.destroy', $user->id)}}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-sm btn-danger m-1">REMOVER</button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                </tbody>
                <h3>Não existem usuários cadastrados!</h3>
            @endforelse
            
        </tbody>
    </table>

@endsection