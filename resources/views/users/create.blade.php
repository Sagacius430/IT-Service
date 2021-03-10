@extends('layouts.app')

@section('title', 'Usuário') 

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.index')}}">Painel</a>
    </li>
    <li class="breadcrumb-item active">Novo Usuarios</li>
@endsection

@section('content')

<div class="col-12">
    <div class="card">
        <form action="{{route('users.store')}}" method="POST" onsubmit="return email(this)">
        <div class="card-header">
            Cadastro de Usuários
        </div>

        <div class="card-body" >
            
                
                @csrf

                <div class="row">
                    <div class="col 12 col-sm-2 ">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" name="name" class="form-control" 
                                value="{{old('name', '')}}" placeholder="insira seu nome">
                        </div>
                    </div>

                    <div class="col 12 col-sm-2 ">
                        <div class="form-group">
                            <label>Sobrenome</label>
                            <input type="text" name="second_name" class="form-control" 
                                value="{{old('second_name', '')}}" placeholder="insira o sobrenome"> 
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col 12 col-sm-2 ">
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="text" name="fone" class="form-control" id="fone"
                                value="{{old('fone', '')}}" placeholder="insira seu telefone">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col 12 col-sm-3 ">
                        <div class="control-group">
                            <label>E-mail</label>
                            <input type="email" name="email" class="form-control mailcheck" id="email" 
                            value="{{old('email', '')}}" placeholder="insira seu email">
                            <span class="help-inline">Aqui você como o seu email</span>
                        </div>
                    </div>
                
                    <div class="col 12 col-sm-3 ">
                        <div class="control-group border-warning">
                            <label>Comfirmar e-mail</label>
                            <input type="text" name="email_confirmation" class="form-control" placeholder="redigite seu email">
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col 12 col-sm-2 ">
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" name="password" class="form-control" id="password" onkeyup="javascript:testPwd()"
                            value="{{old('password', '')}}" placeholder="digite uma pwd">
                            <table class="mt-3" id="showStrength"></table>
                        </div>
                    </div>
                
                    <div class="col 12 col-sm-2 ">
                        <div class="form-group">
                            <label>Confirmar pwd</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="redigite a pwd">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col 12 col-sm-2 ">
                        <div class="form-group">
                            <label>Nível</label>
                            <select name="role" class="role">
                                <option value=" "> </option>
                                <option {{old('role','') == 'admin' ? 'selected':''}} value="admin">Administrador</option>
                                <option {{old('role','') == 'operator' ? 'selected':''}} value="operator">Operador</option>
                            </select>
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
@endsection
