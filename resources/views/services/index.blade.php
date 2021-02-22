@extends('layouts.app')
@section('title', 'Serviço') 

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.index')}}">Painel</a>
    </li>
    <li class="breadcrumb-item active">Serviços</li>
@endsection

@section('content')

<div class="col-12"> 
    <div class="card">  

        <div class="card-header bg-gradient-secondary">
            Serviços   
        </div>

        <div class="card-body">        
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead class="table-primary">
                            <th class="align-middle">Nome</th>
                            <th class="align-middle">Tipo</th>
                            <th class="align-middle">Descrição</th>
                            <th class="align-middle">Valor</th>
                            <th class="align-middle" colspan="2">Ações</th>
                        </thead>
                        <tbody>                        
                            @foreach ($services as $service)
                                <tr>
                                    <td>{{$service->name}}</td>
                                    <td>{{$service->type}}</td>
                                    <td>{{$service->description}}</td>
                                    <td>{{$service->value}}</td>
                                    <td>
                                        <a class="btn btn-warning" 
                                            href="{{ route('services.edit', $service->id) }}">
                                            Editar
                                        </a>
                                    </td>
                                    <td>
                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST">

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
        <div class="card-footer text-right">
            <a class="btn btn-success" 
            href="{{ route('services.create') }}">
            Novo serviço
        </a>   
        </div>
    </div>
</div>
@endsection                       