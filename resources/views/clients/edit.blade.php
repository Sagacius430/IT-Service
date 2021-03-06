@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.index')}}">Painel</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{route('clients.index')}}">Serviços</a>
    </li>
    <li class="breadcrumb-item active">atualizar Cliente</li>
@endsection

@section('content')


<div class="col-12">
    <form action="{{ route('clients.update', $client->id) }}" method="POST"> 
        <div class="card">
            
            <div class="card-header">
                <h6>Edição de Clientes</h6>
            </div>    

            <div class="card-body">                

                    @csrf<!--tolken-->
                    @method('PUT'){{-- converte POST em PUT para o Laravel --}}
                    
                    <div class="row">
                        <div class="col-12 col-sm-3">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" name="client[name]" class="form-control" 
                                value="{{old('client.name', $client->name)}}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" name="client[fone]" class="form-control" id="fone"
                                value="{{old('client.fone', $client->fone)}}">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <h6>Endereço</h6>
                            <hr>
                        </div>
                    </div>
            
                    <div class="row mt-2">
                        <div class="col-12 col-sm-2">
                            <div class="form-group">
                                <label>CEP</label>
                                <input type="text" name="address[zip_code]" class="form-control" id="zip_code"
                                    value="{{ old('address.zip_code', $client->address->zip_code) }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-5">
                            <div class="form-group">
                                <label>Cidade</label>
                                <input type="text" name="address[city]" class="form-control" id="city"
                                value="{{ old('address.zip_code', $client->address->city) }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-1">
                            <div class="form-group">
                                <label>UF</label>
                                <input type="text" name="address[uf]" class="form-control" id="uf"
                                value="{{ old('address.zip_code', $client->address->uf) }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Bairro</label>
                                <input type="text" name="address[district]" class="form-control" id="district"
                                value="{{ old('address.zip_code', $client->address->district) }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-7">
                            <div class="form-group">
                                <label>Logradouro</label>
                                <input type="text" name="address[street]" class="form-control" id="street"
                                    value="{{ old('address.street', $client->address->street) }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-1">
                            <div class="form-group">
                                <label>Número</label>
                                <input type="text" name="address[number]" class="form-control"
                                value="{{ old('address.zip_code', $client->address->number) }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Complemento</label>
                                <input type="text" name="address[complement]" class="form-control"
                                value="{{ old('address.zip_code', $client->address->complement) }}">
                            </div>
                        </div>
                    </div>                                    
            </div>
            {{-- <div class="card-footer text-right">
                <button type="submit" class="btn btn-success">Enviar</button>    
            </div> --}}
        </div>      
</div>

<div class="col-12 mt-4">
    
        <div class="card">

            <div class="card-header">
                <h6>Edição de Computadores</h6>
            </div> 
                
            <div calss="card-body">
                @foreach ($client->machines as $key => $machine) 
                    <div class="col-12 bg-light">        
                        <div class="row mt-2">
                            <div class="col-12 col-sm-3">
                                <div class="form-group">
                                    <label>Tipo de computador</label>
                                    <input type="hidden" name="machines[{{$key}}][id]" class="form-control"
                                        value="{{$machine->id}}">
                                    <select type="text" name="machines[{{$key}}][machine_type]" class="form-control">                        
                                        <option value="{{ $machine->machine_type}}">{{ $machine->machine_type}}</option>
                                        <option value="{{ $machine->machine_type == 'Notebook' ? 'selected' : '' }}">Notebook</option>
                                        <option value="{{ $machine->machine_type == 'Desktop' ? 'selected' : '' }}">Desktop</option>
                                    </select>
                                </div>
                            </div>    
                            <div class="col 12 col-sm-2 ">
                                <div class="form-group">
                                    <label>Marca</label>
                                    <input type="text" name="machines[{{$key}}][brand]" class="form-control"
                                        value="{{ $machine->brand}}">
                                </div>
                            </div>
                            <div class="col 12 col-sm-2">
                                <div class="form-group">
                                    <label>Modelo</label>
                                    <input type="text" name="machines[{{$key}}][model]" class="form-control"
                                        value="{{ $machine->model }}">
                                </div>
                            </div>
                        </div>        
                        <div class="row mt-2">                        
                            <div class="col 12 col-sm-2">
                                <div class="form-group">
                                    <label>Número do serial</label>
                                    <input type="text" name="machines[{{$key}}][serial_number]" class="form-control"
                                        value="{{ $machine->serial_number }}">
                                </div>
                            </div>
                            <div class="col 12 col-sm-2">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <input type="text" name="machines[{{$key}}][description]" class="form-control"
                                        value="{{ $machine->description }}">                
                                </div>
                            </div> 
                            <div class="col 12 col-sm-2">
                                <div class="form-group">
                                    <label>Avarias físicas</label>
                                    <input type="text" name="machines[{{$key}}][breakdowns]" class="form-control"
                                        value="{{ $machine->breakdowns }}">                         
                                </div>
                            </div>
                        </div> 
                    </div>    
                @endforeach

                {{-- <div class="col-12 bg-light">     

                    @foreach ($client->machines as $key => $machine) 
                        
                    @endforeach

                    <?php 
                        $newMachinekey  =+ count($client->machines);
                    ?>   

                    <div class="row mt-2">
                        <div class="col-12 col-sm-3">
                            <div class="form-group">
                                <label>Tipo de computador</label>
                                <input type="hidden" name="machines[{{$newMachinekey}}][id]" class="form-control"
                                    value="{{$machine->id}}">
                                <select type="text" name="machines[{{$newMachinekey}}][machine_type]" class="form-control">                        
                                    <option value="">{{ old('machine.$newMachinekey.machine_type', '')}}</option>
                                    <option value="{{ old('machine.$newMachinekey.machine_type', 'Notebook')}}">Notebook</option>
                                    <option value="{{ old('machine.$newMachinekey.machine_type', 'Desktop')}}">Desktop</option>
                                </select>
                            </div>
                        </div>    
                        <div class="col 12 col-sm-2 ">
                            <div class="form-group">
                                <label>Marca</label>
                                <input type="text" name="machines[{{$newMachinekey}}][brand]" class="form-control"
                                    value="{{ old('machine.$newMachinekey.brand', '')}}">
                            </div>
                        </div>
                        <div class="col 12 col-sm-2">
                            <div class="form-group">
                                <label>Modelo</label>
                                <input type="text" name="machines[{{$newMachinekey}}][model]" class="form-control"
                                    value="{{ old('machine.$newMachinekey.model', '')}}">
                            </div>
                        </div>
                    </div>        
                    <div class="row mt-2">                        
                        <div class="col 12 col-sm-2">
                            <div class="form-group">
                                <label>Número do serial</label>
                                <input type="text" name="machines[{{$newMachinekey}}][serial_number]" class="form-control"
                                    value="{{ old('machine.$newMachinekey.serial_number', '')}}">
                            </div>
                        </div>
                        <div class="col 12 col-sm-2">
                            <div class="form-group">
                                <label>Descrição</label>
                                <input type="text" name="machines[{{$newMachinekey}}][description]" class="form-control"
                                    value="{{ old('machine.$newMachinekey.description', '')}}">                
                            </div>
                        </div> 
                        <div class="col 12 col-sm-2">
                            <div class="form-group">
                                <label>Avarias físicas</label>
                                <input type="text" name="machines[{{$newMachinekey}}][breakdowns]" class="form-control"
                                    value="{{ old('machine.$newMachinekey.breakdowns', '')}}">                         
                            </div>
                        </div>
                    </div> 
                </div> --}}
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success"><i class='fa fa-save'></i> Enviar</button>    
            </div>
        </div>
    </form>    
</div>
{{-- <div class="card">    
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
</div> --}}
@endsection  