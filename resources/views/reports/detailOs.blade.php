<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalhes de Ordem de Serviço</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <hr>
                <h1 class="text-center mt-4">Detalhes de Ordem de Serviço</h1>

                <hr>
                <div class="Class row">
                    <div class="col-12">
                        <label>Relatório emitido por: {{ auth()->user()->name }}</label>
                    </div>
                </div>
                <div class="class row">
                    <div class="col-12">
                        <label>Cliente:  {{ $client->name }} {{ $client->fone }}</label>
                    </div>

                    <div class="col-12">
                        <label>Tipo de computador: {{$machine->machine_type}} {{ $machine->brand }} {{ $machine->model }}</label>
                    </div>
                </div>
                <hr>
                <div class="class row">
                    <div class="col-12">
                        <label>Código da OS: {{ $order->id }}</label>
                    </div>
                    <div class="col-12">
                        <label>Status: {{ $order->status }}</label>
                    </div>
                    <div class="col-12">
                        <label>Descrição: {{ $machine->description }}</label>
                    </div>
                    <div class="col-12">
                        <label>Avarias: {{ $machine->breakdowns }}</label>
                    </div>
                    <div class="col-12">
                        <label>Serviço solicitado: </label>
                        @if ($order->service_id == $service->id)
                            {{ $service->name }}
                        @endif
                    </div>
                    <div class="col-12">
                        <label>Diagnóstico: {{ $order->diagnosis }}</label>
                    </div>
                    <div class="col-12">
                        <label>Serviço adicional realizado: {{ $order->sevice }}</label>
                    </div>
                    <div class="col-12">
                        <label>Procedimentos realizados: </label>
                        @if ($order->proceures == null)
                            <label>Ainda não executado</label>
                        @else
                            {{ $order->procedures }}
                        @endif
                    </div>
                    <div class="col-12">
                        <label>Cliente contatado:</label>
                        @if ($order->contacted == true)
                            <label>sim</label>
                        @else
                            <label>não</label>
                        @endif
                    </div>
                    <div class="col-12">
                        <label>Finalização: </label>
                        @if ($order->finish == null)
                            <label>Não finalizado</label>
                        @else
                            {{ $order->finish }}
                            <div class="col-12">
                                {{ $order->guarantee }}
                            </div>
                        @endif
                    </div>

                </div>
                <hr>
            </div>
        </div>
    </div>

    <script>
        window.print();

    </script>
</body>

</html>
