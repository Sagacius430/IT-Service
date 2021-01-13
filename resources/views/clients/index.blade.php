@extends('layouts.app')
@section('content')
    
<div class="card">
    
    <div class="card-header bg-gradient-secondary">
        <label>Clientes</label>        
    </div>
    <div class="card-body">        
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead class="table-primary">
                        <th class="align-middle">Nome</th>
                        <th class="align-middle">Telefone</th>
                        <th colspan="2" class="align-middle">Ações</th>
                        <th class="align-middle">Adicionar Computador</th>
                    </thead>
                    <tbody>                        
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{$client->name}}</td>
                                <td>{{$client->fone}}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('clients.edit', $client->id) }}">
                                        Editar
                                    </a>
                                </td>
                                <td>
                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST">

                                    @csrf

                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        Apagar
                                    </button>
                                </form>
                                </td>
                                <td>
                                     <a class="btn bg-light text-secondary" 
                                     href="{{ route('machines.create', $client->id) }}">
                                        +
                                    </a> 
                                </td>                                
                            </tr>                            
                        @endforeach
                    </tbody>                                    
                </table>
                <div>                    
                    <a class="btn btn-success" href="{{ route('clients.create') }}">Novo cliente</a>                                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection                       