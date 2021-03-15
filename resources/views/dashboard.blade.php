@extends('layouts.app')
@section('title', 'Painel')

@section('breadcrumb')
    <li class="breadcrumb-item active">Painel</li>
@endsection

@section('content')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/movement-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Chart.min.css') }}">
@endsection

<div class="col-12">
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4" id="dashboard-card">
                <div class="card-body" id="dashboard-card">
                    <div class="d-flex justify-content-between align-items-center">
                        Ordens de Serviço
                        <span class="h4">{{ $counts['os'] }}</span>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('os.index') }}">
                        Ver todos os serviços
                    </a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4" id="dashboard-card">
                <div class="card-body" id="dashboard-card">
                    <div class="d-flex justify-content-between align-items-center">
                        Computadores Cadastrados
                        <span class="h4">{{ $counts['machines'] }}</span>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{-- {{route('machines.show')}} --}}">
                        Ver todos os computadores
                    </a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4" id="dashboard-card">
                <div class="card-body" id="dashboard-card">
                    <div class="d-flex justify-content-between align-items-center">
                        Serviços Cadastrados
                        <span class="h4">{{ $counts['services'] }}</span>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('services.index') }}">
                        Ver todos os serviços
                    </a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4" id="dashboard-card">
                <div class="card-body" id="dashboard-card">
                    <div class="d-flex justify-content-between align-items-center">
                        Clientes Cadastrados
                        <span class="h4">{{ $counts['clients'] }}</span>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('clients.index') }}">
                        Ver todos os clientes
                    </a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4" id="dashboard-card">
                <div class="card-body" id="dashboard-card">
                    <div class="d-flex justify-content-between align-items-center">
                        Usuários Cadastrados
                        <span class="h4">{{ $counts['clients'] }}</span>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('users.index') }}">
                        Ver todos os usuários
                    </a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4" id="dashboard-card">
                <div class="card-body" id="dashboard-card">
                    <div class="d-flex justify-content-between align-items-center">
                        Pendências
                        <span class="h4">{{ $counts['waitPiece'] }}</span>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="row  mt-3"> --}}
<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mt-2">Ordens de serviço</h4>
                        </div>
                        <div class="col-md-6">
                            <ul class="nav nav-pills justify-content-end" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link orders active" data-toggle="pill" id="orders_today" href="#"
                                        role="tab" aria-controls="pills-home" aria-selected="true">Hoje</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link orders" data-toggle="pill" id="orders_month" href="#" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">Mês</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link orders" data-toggle="pill" id="orders_year" href="#" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Ano</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="orders" height="72"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- </div> --}}

<div class="col-12 mt-3">
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
                                        <input type="date" name="date_start" class="form-control">
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <label>Data final</label>
                                        <input type="date" name="date_end" class="form-control">
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
                                        <input type="date" name="date_start" class="form-control">
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <label>Data final</label>
                                        <input type="date" name="date_end" class="form-control">
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

@push('scripts')
<script src="{{ asset('js/Chart.min.js') }}"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
@endpush
