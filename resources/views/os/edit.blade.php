@extends('layouts.app')

@section('title', 'Usuário') 

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.index')}}">Painel</a>
    </li>
    <li class="breadcrumb-item active">Atualizar Ordem de Serviço</li>
@endsection

@section('content')

<div class="col-12">
    <form action="{{ route('os.update', $order->id) }}" method="POST">
        <div class="card">         

            <div class="card-header">
                Edição de Ordem de Serviço
            </div>

            <div class="card-body">                
                    
                @csrf
                @method('PUT')

                {{-- @foreach ($order->os as $key => $order) --}}
                <div class="row">

                    <div class="col 12 col-sm-12 ">
                        <div class="form-group">
                            <label>Resposável pela ordem de serviço:</label>
                            <input type="hidden" name="os[user_id]" class="form-control" 
                                value="{{old('os.user_id', $order->user_id)}}">
                            {{-- <span class="nav-item nav-link">{{ auth()->user()->name }}</span> --}}
                        </div>
                    </div>

                    <div class="col 12 col-sm-2 ">
                        <div class="form-group">
                            <label>Serviço</label>
                            <span type="text" name="service[{{$key}}][name]" class="form-control">
                                value="{{old('os.service', $order->service)}}"
                            </span>            
                        </div>
                    </div>  

                </div>  
                {{-- @endforeach --}}

            
                <div class="row">
                    <?php $newServicekey = count($os->services);?>
                </div>             
            
                <div class="row">

                    <div class="col 12 col-sm-2 ">
                        <div class="form-group">
                            <label>Serviço</label>
                            <input type="hidden" name="services[{{$newServiceKey}}][id]" class="form-control">
                                value="{{$service->id}}">
                            <select type="text" name="services[{{$newServiceKey}}][name]" class="form-control">                            
                                <option> </option>
                                    @foreach ($services as $service) 
                                        <option value="{{$service->id}}">{{$service->name}}</option>            
                                    @endforeach
                            </select>                          
                        </div>
                    </div>

                    <div class="col 12 col-sm-2 ">
                        <div class="form-group">
                            <label>Status</label>                         
                            <select name="os[status]" class="form-control">
                                <option {{$os->status == 'Em manutenção' ? 'selected':''}}value="Em manutenção">Em manutenção</option>
                                <option {{$os->status == 'Aguardando peça' ? 'selected':''}}value="Aguardando peça">Aguardando peça</option>
                                <option {{$os->status == 'Devolvido' ? 'selected':''}}value="Devolvido">Devolvido</option>
                                <option {{$os->status == 'Finalizado' ? 'selected':''}}value="Finalizado">Finalizado</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row">     
                    
                </div>
                

                <div class="row">
                    <div class="col 12 col-sm-2 ">
                        <div class="form-group">
                            <label>Contatado</label>
                            <input type="text" name="contacted" class="form-control" 
                                value="{{$os->contacted}}">
                        </div>
                    </div>
                
                    <div class="col 12 col-sm-6  ">
                        <div class="form-group">
                            <label>Diagnóstico</label>
                            <textarea type="text" name="diagnosis" class="form-control" 
                                value="{{$os->diagnosis}}"> 
                            </textarea>                            
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col 12 col-sm-2 ">
                        <div class="form-group">
                            <label>Garantia</label>
                            <span type="text" name="guarantee" class="form-control" 
                                value="{{$os->guarantee}}">
                                
                            </span>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Finalização</label>
                            <span type="text" name="finish" class="form-control"
                                value="{{$os->finish}}">
                            </span>
                        </div>
                    </div>
                    
                </div>
                <div>
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>            
            </div>
        </div>    
    </form>    
</div>
@endsection