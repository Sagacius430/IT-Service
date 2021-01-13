@extends('layouts.app')
@section('content')


<div class="card">    
    
    <div class="card-header">
        <label>Cadastro de computadores</label>
    </div>

    <div class="card-body">
        <form action="{{ route('machines.store') }}" method="POST"> 
            
            @csrf<!--tolken-->
            
            <div class="row">
                <div class="col 12 col-sm-3 ">
                    <div class="form-group">
                        <label>Tipo de computador</label>
                        <select name="machines[machine_type]" size=1 class="form-control">
                            <option> </option>
                            <option value="{{ old('machine.machine_type', 'Notebook')}}">Notebook</option>
                            <option value="{{ old('machine.machine_type', 'Desktop')}}">Desktop</option>
                        </select>
                    </div>
                </div>

                <div class="col 12 col-sm-2">
                    <div class="form-group">
                        <label>Marca</label>
                        <input type="text" name="machines[brand]" class="form-control"
                            value="{{ old('machine.brand', '') }}">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col 12 col-sm-2">
                    <div class="form-group">
                        <label>Modelo</label>
                        <input type="text" name="machines[model]" class="form-control"
                            value="{{ old('machine.model', '') }}">
                    </div>
                </div>
                <div class="col 12 col-sm-2">
                    <div class="form-group">
                        <label>Número do serial</label>
                        <input type="text" name="machines[serial_number]" class="form-control"
                            value="{{ old('machine.serial_number', '') }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col 12 col-sm-2">
                    <div class="form-group">
                        <label>Descrição</label>
                        <input type="text" name="machines[description]" class="form-control"
                            value="{{ old('machine.description', '') }}">                
                    </div>
                </div> 
                <div class="col 12 col-sm-2">
                    <div class="form-group">
                        <label>Avarias físicas</label>
                        <input type="text" name="machines[breakdowns]" class="form-control"
                            value="{{ old('machine.breakdowns', '') }}">                      
                    </div>
                </div>
                <div class="col 12 col-sm-2">
                    <div class="form-group">
                        <label></label>
                        {{-- <input type="text" name="machines[id]" class="form-control"
                            value="{{ old('client.id', Request::query())}}"> --}}
                    </div>
                </div>
                
            </div>  
            <br>      
            <div> 
                    <button type="submit" class="btn btn-success">Novo computador</button>
            </div>           
            
        </form>
    </div>
</div>
<br>
<div class="card">
    <div class="col 12">
        <table class="table">  
            <thead class="table-primary">
                <th class="align-middle">Tipo</th>
                <th class="align-middle">Marca</th>
                <th class="align-midle">Modelo</th>                
            </thead>
            <tbody>           
                @foreach ($machines as $machine)
                    <tr>
                        <td>{{$machine->machine_type}}</td>
                        <td>{{$machine->brand}}</td>
                        <td>{{$machine->model}}</td>                        
                    </tr>
                @endforeach
            </tbody>            
        </table>
    </div>
</div>

@endsection