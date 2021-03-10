@extends('layouts.app')
@section('title', 'Painel') 

@section('breadcrumb')
    <li class="breadcrumb-item active">Painel</li>
@endsection

@section('content')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/movement-styles.css') }}">
@endsection

<div class="col-12">    
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4" id="dashboard-card">
                        <div class="card-body" id="dashboard-card">
                            <div class="d-flex justify-content-between align-items-center">
                                Ordens de Serviço
                                <span class="h4">{{ $counts['os'] }}</span>
                            </div>                            
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{route('os.index')}}">
                                Ver todos os serviços
                            </a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4" id="dashboard-card">
                        <div class="card-body" id="dashboard-card">
                            <div class="d-flex justify-content-between align-items-center">
                                Computadores Cadastrados
                                <span class="h4">{{ $counts['machines'] }}</span>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{--{{route('machines.show')}}--}}">
                                Ver todos os computadores 
                            </a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4" id="dashboard-card">
                        <div class="card-body" id="dashboard-card">
                            <div class="d-flex justify-content-between align-items-center">
                                Serviços Cadastrados
                                <span class="h4">{{ $counts['services'] }}</span>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{route('services.index')}}">
                                Ver todos os serviços
                            </a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4" id="dashboard-card">
                        <div class="card-body" id="dashboard-card">
                            <div class="d-flex justify-content-between align-items-center">
                                Clientes Cadastrados
                                <span class="h4">{{ $counts['clients'] }}</span>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{route('clients.index')}}">
                                Ver todos os clientes
                            </a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4" id="dashboard-card">
                        <div class="card-body" id="dashboard-card">
                            <div class="d-flex justify-content-between align-items-center">
                                Usuários Cadastrados
                                <span class="h4">{{ $counts['clients'] }}</span>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{route('users.index')}}">
                                Ver todos os usuários
                            </a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4"id="dashboard-card">
                        <div class="card-body" id="dashboard-card">
                            Pendências
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div> 
            </div>

            {{--  
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            Ondens de Serviço
                        </div>
                        
                        <div class="card-body">
                            <table class="table">
                                <thead class="table-primary">
                                    <th class="align-middle">Em manutenção</th>
                                    <th class="align-middle">Aguardando peça</th>
                                    <th class="align-middle">Devolvido</th>
                                    <th class="align-middle">Finalizado</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$status['em_manutenção']}}</td>
                                        <td>{{$status['aguardando_peça']}}</td>
                                        <td>{{$status['devolvido']}}</td>
                                        <td>{{$status['finalizado']}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            {{-- <span class="h1">{$counts['os']}}</span> --}}
                        {{-- </div>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            Computadores Cadastrados
                        </div>
                        <div class="card-body">
                            <span class="h1">{{$counts['machines']}}</span>
                        </div>
                    </div>
                </div> --}}

            {{-- </div>
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
                        {{-- </div>
                    </div>
                </div>             --}}
                
            {{-- </div>
            <p></p>
            <div class="row at-3">
                @if (auth()->user()->role == 'admin')
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
                @endif            

                <div class="col-12 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            Pendências
                        </div>
                        <div class="card-body">
                            <span class="p">Corrigir edição de computadores o campo Tipo está Null</span>
                            <br>
                            <span class="p">Verificar o envio de dados da os.create para o store do controller</span>
                            <br>
                            <span class="p">Envio do ID da OS para edit do controller</span>
                            <br>                        
                            <span class="p">Pegar o ID de cliente em edição de computadores</span>                        
                            <br>                        
                            <span class="p">Somente cadastra dois computadores de uma vez</span>
                            <br>                        
                            <span class="p">Filtro de exportação listar todos sem data</span>

                        </div>
                    </div>
                </div>
            </div> --}}
        
</div>



<div class="col-12">
    <div class="card">
        <div class="card-header">
            Relatórios
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-6">

                    <div class="card">
                        <div class="card-header">
                            Clientes
                        </div>
                        <div class="card-body">
                            <form action="{{ route('reports.clients') }}" method="GET">
                                <div class="row align-items-end">
                                    <div class="col-12 col-sm-4">
                                        <label>Data inicial</label>
                                        <input type="text" name="date_start" class="form-control" id="date">
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <label>Data final</label>
                                        <input type="text" name="date_end" class="form-control" id="date">
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <button type="submit" class="btn btn-success">Gerar relatório</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-6">
                    
                    <div class="card">
                        <div class="card-header">
                            Ordem de Serviço
                        </div>
                        <div class="card-body">
                            <form action="{{ route('reports.os') }}" method="GET">
                                <div class="row align-items-end">
                                    <div class="col-12 col-sm-4">
                                        <label>Data inicial</label>
                                        <input type="text" name="date_start" class="form-control" id="date">
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <label>Data final</label>
                                        <input type="text" name="date_end" class="form-control" id="date">
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <button type="submit" class="btn btn-success">Gerar relatório</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection