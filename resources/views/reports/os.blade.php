<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório de Ordem de Serviço</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
            
                <h1 class="text-center mt-4">Relatório de Ordem de Serviço</h1>

                <table class="table mt-4">
                    <thead class="table-primary">
                        <th class="align-middle">Entrada</th>
                        <th class="align-middle">Cliente</th>
                        <th class="align-middle">Serviço</th>
                        <th class="align-middle">Status</th>
                        {{-- <th class="align-middle">Finalizado</th>   --}}
                        <th class="align-middle">Técnico</th>                     
                    </thead>
                    <tbody>                        
                        @foreach ($os as $order)
                            <tr>
                                <td width="40">{{$order->created_at->format('d/m/Y')}}</td>
                                <td>
                                    @foreach ($clients as $client)
                                        @if ($client->id == $order->client_id)
                                            {{$client->name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{$order->service}}</td>
                                <td>{{$order->status}}</td>
                                {{-- <td>{{$order->finish}}</td> --}}
                                <td>
                                    @foreach ($users as $user)
                                        @if ($user->id == $order->user_id)
                                            {{$user->name}}
                                        @endif
                                    @endforeach
                                    {{-- {{$order->user_id}}</td>                                 --}}
                                </form>
                                </td>
                            </tr>                            
                        @endforeach
                    </tbody>                                    
                </table>

            </div>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>
</html>