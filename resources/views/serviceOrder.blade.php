@extends('layouts.master')


@section('content')
   
   <div class="border p-1">
   <h2 class="text-center">Ordem de Serviço Nº{{$order->id}}</h2>
   <p class="text-center"><span><strong>Técnico responsável:</strong> {{$order->user->name}}</span>  -  <span><strong>Data da abertura</strong> {{$order->created_at->format('d/m/Y')}}</span></p>
   <hr>
   <h5 class="text-center">Informações do Cliente</h5>
   <p><strong>Nome: </strong>{{$order->customer->name}}</p>
   <p><strong>Telefone: </strong>{{$order->customer->phone}}</p>
   <br>
   <hr>
   <h5 class="text-center">Produto</h5>
   <p>{{$order->product}}</p>
   <br>
   <hr>
   <h5 class="text-center">Reclamação do Cliente</h5>
   <p>{{$order->complaint}}</p>
   <br>
   <hr>
   <h5 class="text-center">Diagnóstico e Serviço a Ser Executado</h5>
   <p>{{$order->diagnosis}}</p>
   <br>
   <hr>
   <h5 class="text-center">Orçamento</h5>
   <p>R$ {{$order->value}}</p>
   <br>
   </div>
   <a href="{{route('so.edit', $order->id)}}" class="btn btn-sm btn-warning m-1">Editar O.S.</a>
   <p><small>Última Modificação {{$order->updated_at->format('d/m/Y')}}</small></p>
           
@endsection