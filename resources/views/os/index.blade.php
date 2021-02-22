@extends('layouts.app')
@section('title', 'Ordem de Serviço') 

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.index')}}">Painel</a>
    </li>
    <li class="breadcrumb-item active">Ondens de Serviço</li>
@endsection

@section('content')

<div class="col-12">
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-footer d-flex align-items-center justify-content-between"></div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        Aguardando peça
                        <span class="h4">{{$status['aguardando_peça']}}</span>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-footer d-flex align-items-center justify-content-between"></div>
                <div class="card-body">
                    <div>
                        <div class="d-flex justify-content-between align-items-center">
                            Em manutenção
                            <span class="h4">{{$status['em_manutenção']}}</span>
                        </div>
                    </div>    
                </div>
                
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-footer d-flex align-items-center justify-content-between"></div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        Finalizado
                        <span class="h4">{{$status['finalizado']}}</span>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-footer d-flex align-items-center justify-content-between"></div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        Devolvido
                        <span class="h4">{{$status['devolvido']}}</span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="col-12">   
    <div class="card">

        <div class="card-header bg-gradient-secondary">
            Ordens de Serviço       
        </div>

        <div class="card-body">        
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead class="table-primary">
                            <th class="align-middle">Cliente</th>
                            <th class="align-middle">Serviço</th>
                            <th class="align-middle">Status</th>
                            <th class="align-middle">Garantia</th>
                            <th class="align-middle">Finalizado</th>    
                            <th class="align-middle">Técnico</th>
                            <th class="align-middle" colspan="2">Ações</th>                        
                        </thead>
                        <tbody>                        
                            @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        @foreach ($clients as $client)
                                            @if ($client->id == $order->client_id)
                                                {{$client->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$order->service}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>{{$order->guarantee}}</td>
                                    <td>{{$order->finish}}</td>
                                    <td>
                                        @foreach ($users as  $user)
                                            @if ($user->id == $order->user_id)
                                                {{$user->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-warning" 
                                            href="{{ route('os.edit', $order->id) }}">
                                            Editar 
                                        </a> 
                                    </td>
                                    <td>
                                    <form action="{{ route('os.destroy', $order->id) }}" method="POST">

                                        @csrf

                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">
                                            Apagar
                                        </button>
                                    </form>
                                    </td>
                                </tr>                            
                            @endforeach
                        </tbody>                                    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection                       