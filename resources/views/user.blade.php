@extends('layouts.master')


@section('content')
   
   <h2 class="text-center">{{$user->name}}</h2>
   <h4 class="text-center">{{$user->position->name}}</h4>
   <br>
   <hr>
   <br>
   <h5>Contato:</h5>
   <p><strong>Email:</strong> {{$user->email}}</p>
   <br>
   <br>
   <a href="{{route('user.edit', $user->id)}}" class="btn btn-sm btn-warning m-1">Atualizar dados de usuário</a>
   <hr>
   <p><small>Cadastrado em {{$user->created_at->format('d/m/Y')}} - Atualizado {{$user->updated_at->diffForHumans()}}</small></p>
           
@endsection