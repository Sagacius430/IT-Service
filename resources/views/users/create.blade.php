@extends('layouts.app')
@section('content')

<div class="card">    
    <div class="card-header">
        Cadastro de Usuários
    </div>

    <div class="card-body" >
        <form action="{{route('users.store')}}" method="POST">
            
            @csrf

            <div class="row">
                <div class="col 12 col-sm-2 ">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="name" class="form-control" 
                            value="{{old('name', '')}}">
                    </div>
                </div>

                <div class="col 12 col-sm-2 ">
                    <div class="form-group">
                        <label>Sobre nome</label>
                        <input type="text" name="second_name" class="form-control" 
                            value="{{old('second_name', '')}}"> 
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col 12 col-sm-2 ">
                    <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" name="fone" class="form-control" 
                            value="{{old('fone', '')}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col 12 col-sm-2 ">
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" name="email" class="form-control" 
                        value="{{old('email', '')}}">
                    </div>
                </div>
            
                <div class="col 12 col-sm-2 ">
                    <div class="form-group">
                        <label>Comfirmar e-mail</label>
                        <input type="text" name="email_confirmation" class="form-control">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col 12 col-sm-2 ">
                    <div class="form-group">
                        <label>senha</label>
                        <input type="password" name="password" class="form-control" 
                        value="{{old('password', '')}}">
                    </div>
                </div>
            
                <div class="col 12 col-sm-2 ">
                    <div class="form-group">
                        <label>Confirmar senha</label>
                        <input type="password" name="password_confirmation" class="form-control">
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
            <div>
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
    </div>    
</  div>
@endsection
