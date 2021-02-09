@extends('layouts.app')
@section('content')

<div class="card">    
    <div class="card-header">
        Cadastro de Serviços
    </div>

    <div class="card-body" >
        <form action="{{route('services.store')}}" method="POST">
            
            @csrf

            <div class="row">
                <div class="col 12 col-sm-2 ">
                    <div class="form-group">
                        <label>Serviço</label>
                        <input type="text" name="name" class="form-control" 
                            value="{{old('name', '')}}">
                    </div>
                </div>

                <div class="col 12 col-sm-2 ">
                    <div class="form-group">
                        <label>Descrição</label>
                        <input type="text" name="description" class="form-control" 
                            value="{{old('description', '')}}"> 
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col 12 col-sm-2 ">
                    <div class="form-group">
                        <label>Valor</label>
                        <input type="text" name="value" class="form-control" 
                            value="{{old('value', '')}}">
                    </div>
                </div>

                <div class="col 12 col-sm-2 ">
                    <div class="form-group">
                        <label>Tipo</label>
                        <input type="text" name="type" class="form-control" 
                            value="{{old('type', '')}}">
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
    </div>    
</div>
<p></p>
    <div class="card-header">
        <div class="col 12">
            <table class="table">  
                <thead class="table-primary">
                    <th class="align-middle">nome</th>
                    <th class="align-middle">Descrição</th>
                    <th class="align-midle">Valor</th>                
                </thead>
                <tbody>           
                    @foreach ($services as $service)
                        <tr>
                            <td>{{$service->name}}</td>
                            <td>{{$service->description}}</td>
                            <td>{{$service->value}}</td>                        
                        </tr>
                    @endforeach
                </tbody>            
            </table>
        </div>
    </div>
@endsection
