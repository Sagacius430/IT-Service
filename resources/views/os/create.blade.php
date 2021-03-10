@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.index')}}">Painel</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{route('services.index')}}">Serviços</a>
    </li>
    <li class="breadcrumb-item active">Novo Ordem de Serviço</li>
@endsection

@section('content')

<div class="col-12">
    <form action="{{route('os.store')}}" method="POST">

        <div class="card"> 
            
            <div class="card-header">
                Cadastro de Ordem de Serviço
            </div>

            <div class="card-body" >       
                    
                    @csrf

                    <div class="row">
                        <div class="col 12 col-sm-2 ">
                            <div class="form-group">
                                <label>Resposável:</label>
                                <input type="text" name="os[user_id]" class="form-control" id="name" disabled="disabled"
                                    value="{{ auth()->user()->name }}">
                                <input type="hidden" name="user_id"
                                    value="{{auth()->user()->id }}">            
                                </span>                        
                            </div>
                        </div>                
                    </div>

                    <div class="row">
                        <div class="col 12 col-sm-2 ">
                            <div class="form-group">
                                <label>Cliente:</label>
                                    <input type="text" name="os[client_id]" class="form-control" id="id" disabled="disabled" 
                                        value="{{$client->name }}">
                                    <input type="hidden" name="client_id"
                                        value="{{$client->id}}">
                            </div>
                        </div>

                        <div class="col 12 col-sm-2 ">
                            <div class="form-group">
                                <label>Computador</label>
                                <select type="text" name="os[machine_id]" size=1 class="form-control">
                                    <option> </option>
                                    @foreach ($machines as $machine)
                                        <option {{--{{old('os[machine_id]','') == $machine->id ? 'selected':''}}--}} value="{{$machine->id}}">
                                            {{$machine->brand}} {{$machine->serial_number}}
                                        </option>                                   
                                    @endforeach
                                </select>                                        
                            </div>
                        </div> 

                    </div>

                    <div class="row">                
                        <div class="col 12 col-sm-2 ">
                            <div class="form-group">
                                <label>Status</label>                                                   
                                    <select type="text" name="os[status]" size=1 class="form-control">
                                        <option> </option>
                                        <option value="{{old('os[status]', 'Aguardando serviço')}}">Aguardando serviço</option>
                                        <option value="{{old('os[status]', 'Em manutenção')}}">Em manutenção</option>
                                        <option value="{{old('os[status]', 'Aguardando peça')}}">Aguardando peça</option>
                                        {{-- <option value="{{ old('os.status', 'Devolvido')}}">Devolvido</option>
                                        <option value="{{ old('os.status', 'Finalizado')}}">Finalizado</option> --}}
                                    </select>
                            </div>
                        </div>                        

                        <div class="col 12 col-sm-2 ">
                            <div class="form-group">
                                <label>Serviço</label>
                                {{-- <input type="hidden" name="service[0][id]" size=1 class="form-control"> 
                                lembrar de inserir o id em service_id--}}
                                <select type="text" name="os[service_id]" size=1 class="form-control">
                                {{-- {{$services->id}} --}}
                                    <option> </option>
                                    @foreach ($services as $service) 
                                        <option value="{{$service->id}}">
                                            {{$service->name}}
                                        </option>
                                    @endforeach
                                </select>                          
                            </div>
                        </div>
                    </div>    
                    

                    {{-- <div class="row">
                        <div class="col 12 col-sm-2 ">
                            <div class="form-group">
                                <label>Contatado</label>
                                <input type="text" name="contacted" class="form-control" 
                                value="{{old('contacted', '')}}">
                            </div>
                        </div>
                    
                        <div class="col 12 col-sm-6  ">
                            <div class="form-group">
                                <label>Diagnóstico</label>
                                    <textarea type="text" name="diagnosis" class="form-control" 
                                        value="{{old('diagnosis', '')}}"> 
                                    </textarea>
                            </div>
                        </div>
                    </div> --}} 
                
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>        
        </div>
    </form>
</div>
@endsection
