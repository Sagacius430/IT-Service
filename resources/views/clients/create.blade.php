@extends('layouts.app')
@section('content')

    <div class="row mt-3 mb-3">
        <div class="col-12">
            <div class="alert alert-warning" role="alert">                  
                @if ($errors)
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>      
                    @endforeach        
                @endif
            </div>                
        </div>
    </div>  
    <form action="{{route('clients.store','machine.store')}}" method="POST">
        @csrf<!--tolken-->
            <label>Nome</label>
            <input name="name" type="text">
            <br>
            <label>Telefone</label>
            <input name="fone" type="text">
            <br>
            <label>Tipo de computador</label>
            <select name="machine_type" size=1>
                <option>Notebook</option>
                <option>Desktop</option>
            </select>
            <br>
            <label>Marca</label>
            <input name="brand" type="text">
            <br>
            <label>Modelo</label>
            <input name="model" type="text">
            <br>
            <label>N&uacute;mero de serial</label>
            <input name="serial_number" type="text">
            <br>
            <label>Descrição</label>
            <input name="description" type="text">
            <br>
            <label>Avarias físicas</label>
            <input name="breakdowns" type="text"> 
            <br>
            <button type="submit">Enviar </button>
    </form>
@endsection