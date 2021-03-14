@extends('layouts.app')
@section('title', 'Ordem de Serviço')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.index') }}">Painel</a>
    </li>
    <li class="breadcrumb-item active">Ondens de Serviço</li>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/movement-styles.css') }}">
@endsection

@section('content')

    <div class="d-flex align-items-center col-12">
        <div class="col-12">

            <div id="sb navbar">
                <div id="sb navbar">
                    <nav class="sb navbar accordion sb-sidenav-light">
                        <div class="sb navbar-menu col-12">

                            <div class="row">
                                <div class="col-xl-4 col-md-6" id="order-card">
                                    <div class="card alert-secondary text-white mb-4">
                                        <div class="card-footer d-flex align-items-center justify-content-between"></div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center alert-link"
                                                onclick="shiftTable()">
                                                <a class="nav-link" href="">
                                                    Aguardando serviço
                                                </a>
                                                <span class="h4">{{ $status['aguardando'] }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6" id="order-card">
                                    <div class="card alert-info text-white mb-4">
                                        <div class="card-footer d-flex align-items-center justify-content-between"></div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center alert-link">
                                                Em garantia
                                                <span class="h4">{{ $status['em_garantia'] }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6" id="order-card">
                                    <div class="card alert-danger text-white mb-4">
                                        <div class="card-footer d-flex align-items-center justify-content-between"></div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center alert-link">
                                                Devolvido
                                                <span class="h4">{{ $status['devolvido'] }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-4 col-md-6" id="order-card">
                                    <div class="card alert-warning text-white mb-4">
                                        <div class="card-footer d-flex align-items-center justify-content-between"></div>
                                        <div class="card-body">
                                            <div>
                                                <div class="d-flex justify-content-between align-items-center alert-link">
                                                    Em manutenção
                                                    <span class="h4">{{ $status['em_manutenção'] }}</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6" id="order-card">
                                    <div class="card alert-primary text-white mb-4">
                                        <div class="card-footer d-flex align-items-center justify-content-between"></div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center alert-link">
                                                Aguardando peça
                                                <span class="h4">{{ $status['aguardando_peça'] }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6" id="order-card">
                                    <div class="card alert-success text-white mb-4">
                                        <div class="card-footer d-flex align-items-center justify-content-between"></div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center alert-link">
                                                Finalizado
                                                <span class="h4">{{ $status['finalizado'] }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </nav>
                </div>
            </div>

        </div>
    </div>


    <div class="col-12 mt-3">
        <div class="card">

            <div class="card-header bg-gradient-secondary">
                Ordens de Serviço
            </div>

            <div class="card-body">

                {{-- @yield('select')
                @section('select')
                    
                @endsection --}}
                <div class="row">
                    <div class="col-12">

                        <table class="table table-hover" id="tableIndex">
                            <thead class="table-primary">
                                <th class="align-middle">Cliente</th>
                                <th class="align-middle">Serviço</th>
                                <th class="align-middle">Status</th>
                                <th class="align-middle">Dias</th>{{-- tempo de OS aberta --}}
                                {{-- <th class="align-middle">Garantia</th>
                            <th class="align-middle">Finalizado</th> --}}
                                <th class="align-middle">Técnico</th>
                                <th class="align-middle" colspan="3">Ações</th>
                            </thead>

                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>
                                            @foreach ($clients as $client)
                                                @if ($client->id == $order->client_id)
                                                    {{ $client->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $order->service }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>{{ $dateNow->diffInDays($order->created_at) }}</td>
                                        {{-- <td>{{$order->guarantee}}</td> --}}
                                        {{-- <td>{{$order->finish}}</td> --}}
                                        <td>
                                            @foreach ($users as $user)
                                                @if ($user->id == $order->user_id)
                                                    {{ $user->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <a class="btn alert-warning" href="{{ route('os.edit', $order->id) }}">
                                                Editar
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('os.destroy', $order->id) }}" method="POST">

                                                @csrf

                                                @method('DELETE')
                                                <button class="btn alert-danger" type="submit">
                                                    Apagar
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <p><a href="{{ route('reports.detailOs', $order->id) }}" method="GET">                                                    
                                                    Detalhes                                                    
                                                </a>
                                            </p>
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

<script>
    function shiftTable() {
        document.getElementById("tableIndex")
    }

    $(document).ready(function() {
        $('.table table-hover').select2();
    });

    $(".js-example-theme-single").select2({
        theme: "classic"
    });

</script>
