@extends('layouts.app')
@section('title', 'Clientes') 

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.index')}}">Painel</a>
    </li>
    <li class="breadcrumb-item active">Clientes</li>
@endsection

@section('content')

<div class="col-12">
    <div class="card">
        
        <div class="card-header">
            Clientes      
        </div>
        
        <div class="card-body">        
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <th class="align-middle">Nome</th>
                            <th class="align-middle">Telefone</th>
                            <th colspan="2" class="align-middle">Ações</th>
                            <th class="align-middle">Adicionar Computador</th>
                            <th class="align-middle">Ordem de Serviço</th>
                        </thead>
                        <tbody>                        
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{$client->name}}</td>
                                    <td>{{$client->fone}}</td>
                                    <td>
                                        <a class="btn alert-warning" 
                                            href="{{ route('clients.edit', $client->id) }}">
                                            Editar
                                        </a>
                                    </td>
                                    <td>
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST">

                                        @csrf

                                        @method('DELETE')
                                        <button class="btn alert-danger" type="submit">
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
                                    <td>
                                        <a class="btn bg-light text-secondary"
                                            href="{{ route('os.create', $client->id)}}"> 
                                            +
                                        </a>
                                    </td>                                
                                </tr>                            
                            @endforeach
                        </tbody>                                    
                    </table>                
                </div>
            </div>
        </div>
        
        <div class="card-footer text-right">
            <div class="float-md-left">
                {!!$clients->links()!!}
            </div>        
            <a class="btn btn-success" 
                href="{{ route('clients.create') }}">
                    Novo cliente
            </a>
        </div>
    </div>
</div>

<div class="col-12 mt-4">
    <div class="card">
    <div class="card-header">
        Exportação
    </div>
        <div class="card-body">
            <form action="{{ route('clients.export') }}" method="POST">
                @csrf
                <div class="row align-items-end">
                    <div class="col-12 col-sm-3">
                        <label>Data inicial</label>
                        <input type="date" name="date_start" class="form-control date">
                    </div>
                    <div class="col-12 col-sm-3">
                        <label>Data final</label>
                        <input type="date" name="date_end" class="form-control date">
                    </div>
                    <div class="col-12 col-sm-3">
                        <label>Tipo de arquivo de exportação</label>
                        <select class="form-control" name="export_file_type">
                            <option value="csv">CSV</option>
                            <option value="xls">XLS</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-3">
                        <button type="submit" class="btn btn-secondary">Exportar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection                       
<script>
    function validaData (e) {
        var divisor = '/'
        var data = e.value
        var dataAtual = ''
        if (data.match (/^(0[1-9]|[12][0-9]|3[01]).?(0[1-9]|1[012]).?([12][0-9]{3}|[0-9]{2})$/)) {
        data = data.replace (/[^0-9]/g, '')
        dataAtual = data.substr(0,2)+divisor+data.substr(2,2)+divisor
        if ( data.substr (4).length == 4 ) dataAtual += data.substr (4)
        else dataAtual += (data.substr (4) > 30 ? '19' : '20') + data.substr (4)
        }
        if (dataAtual != '') {
        x = dataAtual.split (divisor)
        confere = new Date (x[2],x[1]-1,x[0])
        confere2 = (confere.getDate () < 10 ? '0' : '') + confere.getDate ()
        confere2 += divisor + ((confere.getMonth()+1) < 10 ? '0' : '') + (confere.getMonth()+1)
        confere2 += divisor + confere.getFullYear()
        if (confere2 != dataAtual) dataAtual = ''
        }
        e.value = dataAtual
    }
</script>