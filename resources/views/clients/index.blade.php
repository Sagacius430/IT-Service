@extends('layouts.app')
@section('content')
    
        <div class="row">    
            <div class="col-12">
                <table class="table ">
                    <thead class="table-primary" >
                        <th class="align-middle">Nome</th>
                        <th class="align-middle">Telefone</th>
                        <th class="align-middle">Tipo</th>
                        <th class="align-middle">Marca</th>
                        <th class="align-middle">Modelo</th>
                        <th class="align-middle">SN</th>
                        <th class="align-middle">Descrição</th>
                        <th class="align-middle">Avarias físicas</th>
                        <th class="align-middle">Abertura</th> 
                        <th colspan="3" class="align-middle">Ações</th>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{$client->name}}</td>
                                <td>{{$client->fone}}</td>
                                <td>{{$client->machine_type}}</td>
                                <td>{{$machine->band}}</td>
                                <td>{{$machine->model}}</td>
                                <td>{{$machine->serial_machine}}</td>
                                <td>{{$machine->description}}</td>
                                <td>{{$machine->breakdowns}}</td>
                                {{-- <td>{{$machine->created_at}}</td> --}}
                                <td>
                                    <a class="btn btn-warning" href="{{ route('clients.edit', $client->id, 'machine.edit', $machine->id)}}">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('clients.destroy', $client->id, 'machine.destroy', $machine->id)}}" method="POST">   
                                            @csrf
                                            @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Apagar</button>
                                    </form>
                                </td>
                                
                            </tr>
                            
                        @endforeach
                    </tbody>                                    
                </table>
                <div>                    
                    <a class="btn btn-success" href="{{ route('clients.create', $client->id, 'machine.create', $machine->id)}}">Dicionar</a>                                   
                </div>
            </div>
        </div>
    
@endsection                       