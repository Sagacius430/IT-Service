@extends('layouts.app')
@section('content')

<div class="card">
    
    <div class="card-header">
        Edição de Serviços
    </div>    

    <div class="card-body">
        <form action="{{ route('services.update', $service->id) }}" method="POST"> 

            @csrf<!--tolken--> 
            @method('PUT')
            
            <div class="row">
                <div class="col 12 col-sm-2">
                    <div class="form-group">
                        <label>Seriviço</label>
                        <input name="service[name]" type="text" class="form-control"
                        value="{{old('service.name', $service->name)}}">
                    </div>
                </div>

                <div class="col 12 col-sm-3">
                    <div class="form-group">
                        <label>Tipo</label>
                        <input name="service[type]" type="text" class="form-control"
                        value="{{old('service.type', $service->type)}}">
                    </div>
                </div>
            </div> 

            <div class="row">
                <div class="col 12 col-sm-2 ">
                    <div class="form-group">
                        <label>Descrição</label>
                        <input name="service[description]" type="text" class="form-control" 
                        value="{{old('service.description', $service->description)}}">
                    </div>
                </div>

                <div class="col 12 col-sm-2 ">
                    <div class="form-group">
                        <label>Valor</label>
                        <input name="service[value]" type="text" class="form-control" 
                            value="{{old('service.value', $service->value)}}">
                    </div>
                </div>     
            </div>            
            <div>
                <button type="submit" class="btn btn-success">Enviar</button>    
            </div>
        </form>
    </div>
</div>
@endsection  