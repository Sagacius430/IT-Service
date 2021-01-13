@extends('layouts.app')
@section('content')

<div class="card">
    
    <div class="card-header">
        Edição de usuários
    </div>    

    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST"> 

            @csrf<!--tolken-->    

            @method('PUT')
            <div class="row">
                <div class="col 12 col-sm-2">
                    <div class="form-group">
                        <label>Nome</label>
                        <input name="name" type="text" class="form-control"
                        value="{{$user->name}}">
                    </div>
                </div>

                <div class="col 12 col-sm-3">
                    <div class="form-group">
                        <label>Sobre nome</label>
                        <input name="second_name" type="text" class="form-control"
                        value="{{$user->second_name}}">
                    </div>
                </div>
            </div> 

            <div class="row">

                <div class="col 12 col-sm-2 ">
                    <div class="form-group">
                        <label>E-mail</label>
                        <input name="email" type="text" class="form-control" 
                        value="{{$user->email}}">
                    </div>
                </div>

                <div class="col 12 col-sm-2 ">
                    <div class="form-group">
                        <label>Telefone</label>
                        <input name="fone" type="text" class="form-control" 
                            value="{{$user->fone}}">
                    </div>
                </div>            
                            
            </div>
            
            <div class="row">
                <div class="col 12 col-sm-2 ">
                    <div class="form-group">
                        <label>senha</label>
                        <input name="password" type="password" class="form-control" 
                        value="{{$user->password}}">
                    </div>
                </div>

                <div class="col 12 col-sm-2 ">
                    <div class="form-group">
                        <label>Nível</label>
                        <select name="role" class="form-control">
                            <option {{$user->role == 'admin' ? 'selected':''}} value="admin">Administrador</option>
                            <option {{$user->role == 'operador' ? 'selected':''}} value="operador">Operador</option>
                        </select>
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