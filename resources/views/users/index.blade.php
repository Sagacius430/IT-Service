@extends('layouts.app')
@section('title', 'Usuário') 

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.index')}}">Painel</a>
    </li>
    <li class="breadcrumb-item active">Usuários</li>
@endsection

@section('content')

<div class="col-12">
    <div class="card">    
        
        <div class="card-header bg-gradient-secondary">
            Usuários
        </div>

        <div class="card-body">

            {{-- <div class="card mt-4">
                <div class="card-body">
                    <div class="col-12 table-responsive">
                        <div>Nome </div>
                        <div><input id="name"/> <i class="fas fa-search"></i></div>
                    </div>
                </div>
            </div> --}}

            <div class="row mt-3">            
                <div class="col-12 table-responsive">
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th class="align-middle">Nome</th>
                                <th class="align-middle">Sobre nome</th>
                                <th class="align-middle">E-mail</th>
                                <th class="align-middle">Telefone</th>
                                <th class="align-middle">Nível</th>
                                <th class="align-middle">Data de cadastro</th>
                                <th colspan="2" class="align-middle">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->second_name}}</td> 
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->fone}}</td>
                                    <td>{{$user->role}}</td>                                
                                    <td>{{$user->created_at->format('d/m/Y')}}</td>
                                    <td>
                                        <a class="btn alert-warning" 
                                            href="{{ route('users.edit', $user->id) }}">
                                            Editar
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')
                                            
                                            <button class="btn alert-danger" type="submit">
                                                Apagar
                                            </button>
                                        </form>
                                    </td>
                                </tr>    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!!$users->links()!!}
        <div class="card-footer text-right">
            <a class="btn btn-success" href="{{ route('users.create')}}" >Novo usuário</a>
        </div>
    </div>
</div>
@endsection

<script>
    $('#filtro-nome').keyup(function() {
    var nomeFiltro = $(this).val().toLowerCase();
    console.log(nomeFiltro);
    $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td:first').text();
        console.log(conteudoCelula);
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        $(this).css('display', corresponde ? '' : 'none');
    });
});
</script>