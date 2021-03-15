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
                                                <a class="nav-link" href="#" data-toggle="modal" data-target="#moModal">
                                                    <i class='fa fa-pencil'></i>
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
    {{-- ###############################Aguardando Serviço ##############################--}}
    
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true" id="moModal" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>{{$wait = 'Aguardando serviço'}}</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method='post' action='' enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="">
                        <div class="box-body">
                            <div class="box-body">
                                {{-- <div class='form-group col-sm-12'>                                    
                                    <input type='text' class='form-control' name='name_facility' value='' required />
                                </div> --}}

                                <div class="row">
                                    <table class="table table-hover">
                                        <thead class="table-primary">                                   
                                            <th class="align-middle">Cliente</th>
                                            <th class="align-middle">Serviço</th>                                            
                                            <th class="align-middle">Dias pendentes</th>{{-- tempo de OS aberta --}}                                            
                                            <th class="align-middle">Técnico</th>
                                            <th class="align-middle" colspan="2">Ações</th>
                                        </thead>
                                        <tbody>                                            
                                            @foreach ($orders as $order)                                            
                                                @if ($order->status == $wait )                                            
                                                    <tr>                                                        
                                                        <td>
                                                            @foreach ($clients as $client)
                                                                @if ($client->id == $order->client_id)
                                                                    {{ $client->name }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>{{ $order->service }}</td>
                                                        
                                                        <td>{{ $dateNow->diffInDays($order->created_at) }}</td>                                                       
                                                        <td>
                                                            @foreach ($users as $user)
                                                                @if ($user->id == $order->user_id)
                                                                    {{ $user->name }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            <a class="btn alert-warning"
                                                                href="{{ route('os.edit', $order->id) }}">
                                                                Editar
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('reports.detailOs', $order->id) }}">
                                                                Detalhes
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>



                            </div><!-- /.box -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- /Aguardando Serviço --}}

    {{-- #############################Finalizado ###########################--}}

    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true" id="moModal" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method='post' action='' enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="">
                        <div class="box-body">
                            <div class="box-body">
                                {{-- <div class='form-group col-sm-12'>
                                    <label>Facilities</label>
                                    <input type='text' class='form-control' name='name_facility' value='' required />
                                </div> --}}

                                <div class="row">
                                    <table class="table table-hover">
                                        <thead class="table-primary">
                                            <th class="align-middle">Cliente</th>
                                            <th class="align-middle">Serviço</th>
                                            <th class="align-middle">Status</th>
                                            <th class="align-middle">Dias</th>{{-- tempo de OS aberta --}}
                                            <th class="align-middle">Garantia até</th>
                                            <th class="align-middle">Técnico</th>
                                            <th class="align-middle" colspan="2">Ações</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                @if ($order->guarantee != null)
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
                                                        <td>{{ $order->guarantee }}</td>
                                                        <td>
                                                            @foreach ($users as $user)
                                                                @if ($user->id == $order->user_id)
                                                                    {{ $user->name }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            <a class="btn alert-warning"
                                                                href="{{ route('os.edit', $order->id) }}">
                                                                Editar
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>



                            </div><!-- /.box -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- /Finalizado --}}

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
                                <th class="align-middle">Código</th>
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
                                        <td>{{$order->id}}</td>
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
                                        {{-- <td>
                                            <form action="{{ route('os.destroy', $order->id) }}" method="POST">

                                                @csrf

                                                @method('DELETE')
                                                <button class="btn alert-danger" type="submit">
                                                    Apagar
                                                </button>
                                            </form>
                                        </td> --}}
                                        <td>
                                            <a href="{{ route('reports.detailOs', $order->id) }}">
                                                Detalhes
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- {!! $orders->links() !!} --}}
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

    // $(document).ready(function(){
    //     $(document).on ('click', '.view_data', function(){
    //         var listOrders[] = $(this).attr("orders[]");
    //         // alert(listOrders);
    //         if(listOrders != ''){
    //             var datas = {
    //                  listOrders:listOrders
    //             };
    //             $.post('status.blade.php', datas, function(return){

    //             });
    //         }
    //     });
    // });

</script>
