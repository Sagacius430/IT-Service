<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório de Clientes</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
            
                <h1 class="text-center mt-4">Relatório de Clientes</h1>

                <table class="table mt-4">
                    <thead class="table-primary">
                        <th class="align-middle">Cadastrado</th>
                        <th class="align-middle">Nome</th>
                        <th class="align-middle">Telefone</th>
                        <th class="aling-right">Computadores</th>
                    </thead>
                    <tbody>                        
                        @foreach ($clients as $client)
                            <tr>
                                <td width="40">{{$client->created_at->format('d/m/y')}}</td>
                                <td>{{$client->name}}</td>                                
                                <td>{{$client->fone}}</td>
                                <td>
                                    <table class="table">
                                        <thead class="table-primary">
                                            <th class="align-middle">Marca</th>
                                            <th class="align-middle">Tipo</th>
                                            <th class="align-middle">Modelo</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($client->machines as $machine)
                                                <tr>
                                                    <td>{{$machine->brand}}</td>
                                                    <td>{{$machine->machine_type}}</td>
                                                    <td>{{$machine->model}}</td>
                                                </tr>                                                                                                
                                            @endforeach
                                        </tbody>
                                    </table>

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