@extends('layouts.app')
@section('content')

<div class="card">    
    <div class="card-header">
        Painel
    </div>
    
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Clientes Cadastrados
                    </div>
                    <div class="card-body">                        
                        {{-- {{$count['clients']}} --}}
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Usuários Cadastrados
                    </div>
                    <div class="card-body">
                        {{-- {{$count['users']}} --}}
                    </div>
                </div>
            </div>

        </div>
        <div class="row at-3">
            <div class="col-12 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Serviços Cadastrados
                    </div>
                    <div class="card-body">
                        {{-- {{$count['services']}} --}}
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Ordem de Serviços Cadastrados
                    </div>
                    <div class="card-body">
                        {{-- {{$count['os']}} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
    
@endsection