@extends('layouts.app')
@section('title', 'Computador') 

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.index')}}">Painel</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{route('machines.index')}}">Serviços</a>
    </li>
    <li class="breadcrumb-item active">Computadores</li>
@endsection

@section('content')

<div class="col-12">   
    <div class="card">
        
        <div class="card-header bg-gradient-secondary">
            <label>Computadores</label>        
        </div>
        <div class="card-body">        
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <th class="align-middle">Cliente</th>
                            <th class="align-middle">Tipo</th>
                            <th class="align-middle">Marca</th>
                            <th class="align-middle">Modelo</th>
                            <th class="align-middle">Número de Série</th>    
                            <th class="align-middle">Descrição</th>
                            <th class="align-middle">Avarias</th>                        
                        </thead>
                        <tbody>                        
                            @foreach ($machines as $machine)
                                <tr>
                                    <td>
                                        @foreach ($clients as $client)
                                            @if ($client->id == $machine->client_id)
                                                {{$client->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$machine->machine_type}}</td>
                                    <td>{{$machine->brand}}</td>
                                    <td>{{$machine->model}}</td>
                                    <td>{{$machine->serial_number}}</td>
                                    <td>{{$machine->description}}</td>
                                    <td>{{$machine->breakdowns}}</td>                                    
                                </tr>                            
                            @endforeach
                        </tbody>                                    
                    </table>
                </div>
                
            </div>
        </div>
        <div>
            {!!$machines->links()!!}
        </div>
    </div>
</div>
@endsection                       