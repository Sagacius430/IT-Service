@extends('layouts.app')
@section('content')

<div class="card">    
    <div class="card-header">
        Edição de Ordem de Serviço
    </div>

    <div class="card-body" >
        <form action="{{route('os.store')}}" method="POST">
            
            @csrf

            <div class="row">
                <div class="col 12 col-sm-12 ">
                    <div class="form-group">
                        <label>Resposável pela ordem de serviço:</label>
                        <span type="text" name="nome"></span>
                        {{-- <span class="nav-item nav-link">{{ auth()->user()->name }}</span> --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col 12 col-sm-2 ">
                    <div class="form-group">
                        <label>Serviço</label>
                            <span type="text" name="service" class="form-control">
                                value="{{$os->service}}"
                            </span>            
                    </div>
                </div>

                <div class="col 12 col-sm-2 ">
                    <div class="form-group">
                        <label>Status</label>                                                   
                            <select name="os[status]" size=1 class="form-control">
                                <option>{{$os->status}}</option>
                                <option value="{{ old('os.status', 'Em manutenção')}}">Em manutenção</option>
                                <option value="{{ old('os.status', 'Aguardando peça')}}">Aguardando peça</option>
                                <option value="{{ old('os.status', 'Devolvido')}}">Devolvido</option>
                                <option value="{{ old('os.status', 'Finalizado')}}">Finalizado</option>
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
                        value="{{old('contacted', '')}}">
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
                        <label>Computador</label>
                            <span type="text" name="serial_number">
                                value="{{$os->serial_number}}"
                            </span>
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
