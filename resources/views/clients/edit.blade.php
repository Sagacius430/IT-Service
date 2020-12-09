<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Cliente</title>
</head>
<body>
<form action="{{ route('clients.updade', $client->id) }}" method="POST"
      action="{{ route('machine.updade', $client->id) }}" method="POST">
    @csrf<!--tolken-->    
    @method('PUT'){{-- converte POS em PUT para o LAravel --}}
        <label>Nome</label>
<input name="name" type="text" value="{{$client->name}}">
        <br>
        <label>Telefone</label>
            <input name="fone" type="text" value="{{$client->fone}}">
        <br>
        <label>Tipo de computador</label>
        <select name="machine_type" size=1>
                    {{-- if ternário --}}
            <option {{$machine->machine_type == 'Notebook' ? 'selected' : ''}}>Notebook</option>
            <option {{$machine->machine_type == 'Desktop' ? 'selected' : ''}}>Desktop</option>
        </select>
        <br>
        <label>Marca</label>
            <input name="brand" type="text" value="{{$machine->brand}}">
        <br>
        <label>Modelo</label>
            <input name="model" type="text" value="{{$machine->model}}">
        <br>
        <label>N&uacute;mero de serial</label>
    <input name="serial_number" type="text" value="{{$machine->serial_number}}">
        <br>
        <label>Descrição</label>
            <input name="description" type="text" value="{{$machine->description}}">
        <br>
        <label>Avarias físicas</label>
            <input name="breakdowns" type="text" value="breakdowns"> 
        <br>
        <button type="submit">Enviar </button>
</form>
</body>
</html>