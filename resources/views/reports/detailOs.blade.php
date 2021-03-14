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
            
                <h1 class="text-center mt-4">Detalhes de Ordem de Serviço</h1>
                <div class="col-12">
                    <label>Técnico responsável: {{$user->name}}</label>
                </div>
                <div class="col-12">
                    <label>Tipo de computador: {{$machine->machine_type}} {{$machine->brand}} {{$machine->model}}</label>
                </div>                
                <div class="col-12">
                    <label>Os: {{$order}}</label>
                </div>
                <div class="col-12">
                    <label></label>
                </div>
                <div class="col-12">
                    <label></label>
                </div>
                <div class="col-12">
                    <label></label>
                </div>
                <div class="col-12">
                    <label></label>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>
</html>