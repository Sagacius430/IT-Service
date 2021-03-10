@extends('layouts.app')
@section('title', 'Serviço') 

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.index')}}">Painel</a>
    </li>
    <li class="breadcrumb-item active">Novo Serviços</li>
@endsection

@section('content')

<div class="col-12">
    <div class="card"> 
        <form action="{{route('services.store')}}" method="POST"> 
        <div class="card-header">
            Cadastro de Serviços
        </div>

        <div class="card-body" >
            
                
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
                            <textarea type="text" name="description" class="form-control" cols="30" rowspan="2"
                                value="{{old('description', '')}}"> </textarea>                               
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col 12 col-sm-2 ">
                        <div class="form-group">
                            <label>Valor</label>
                            <input type="text" name="value" class="form-control" id="value" 
                                value="{{old('value', '')}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col 12 col-sm-2 ">
                        <div class="form-group">
                            <label>Tipo</label>
                            <input type="text" name="type" class="form-control" 
                                value="{{old('type', '')}}">
                        </div>
                    </div>
                </div>
            
        </div> 
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
        </form>  
    </div>
</div>

<div class="col-12 mt-4">
    <div class="card"> 
        <div class="card-header">
            <div class="col 12">
                <table class="table table-hover">  
                    <thead class="table-primary">
                        <th class="align-middle">nome</th>
                        <th class="align-middle w-75 p-3">Descrição</th>
                        <th class="align-midle p-3">Valor</th>                
                    </thead>
                    <tbody>           
                        @foreach ($services as $service)
                            <tr>
                                <td>{{$service->name}}</td>
                                <td >{{$service->description}}</td>{{--width="900"--}}
                                <td>{{$service->value}}</td>                        
                            </tr>
                        @endforeach
                    </tbody>            
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
