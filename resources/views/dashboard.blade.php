@extends('layouts.app')
@section('content')

<div class="card">    
    <div class="card-header">
        Painel
    </div>
    
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Clientes Cadastrados
                    </div>
                    <div class="card-body">                        
                        <span class="h1">{{$counts['clients']}}</span>
                        {{-- <table class="table">  
                            <thead class="table-primary">
                                <th class="align-middle"></th>              
                            </thead>
                            <tbody>           
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>{{$client->name}}</td>                                                               
                                    </tr>
                                @endforeach
                            </tbody>            
                        </table> --}}
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Usuários Cadastrados
                    </div>
                    <div class="card-body">
                        <span class="h1">{{$counts['users']}}</span>
                    </div>
                </div>
            </div>
        </div>
        <p></p>
        <div class="row at-3">
            <div class="col-12 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Serviços Cadastrados
                    </div>
                    <div class="card-body">
                        <span class="h1">{{$counts['services']}}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Ordem de Serviços Cadastrados
                    </div>
                    <div class="card-body">
                        {{-- <span class="h1">{$counts['os']}}</span> --}}
                    </div>
                </div>
            </div>
        </div>
        <p></p>
        <div class="row at-3">
            <div class="col-12 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Computadores Cadastrados
                    </div>
                    <div class="card-body">
                        <span class="h1">{{$counts['machines']}}</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Pendências
                    </div>
                    <div class="card-body">
                        <span class="p">Corrigir edição de computadores</span>
                        <br>                        
                    </div>
                </div>
            </div>
        </div>        
    </div>
    </div>
</div>
    
@endsection