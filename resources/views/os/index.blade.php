@extends('layouts.app')
@section('content')
    
<div class="card">
    
    <div class="card-header bg-gradient-secondary">
        <label>Ordens de Serviços</label>        
    </div>
    <div class="card-body">        
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead class="table-primary">
                        <th class="align-middle">Cliente</th>
                        <th class="align-middle">Serviço</th>
                        <th class="align-middle">Status</th>
                        <th class="align-middle">Garantia</th>
                        <th class="align-middle">Finalizado</th>    
                        <th class="align-middle">Técnico</th>                    
                    </thead>
                    <tbody>                        
                        @foreach ($os as $o)
                            <tr>
                                <td>{{$o->client_id}}</td>
                                <td>{{$o->service}}</td>
                                <td>{{$o->status}}</td>
                                <td>{{$o->guarantee}}</td>
                                <td>{{$o->finish}}</td>
                                <td>{{$o->user_id}}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('os.edit', $os->id) }}">
                                        Editar
                                    </a>
                                </td>
                                {{-- <td>
                                {{-- <form action="{{ route('os.destroy', $os->id) }}" method="POST">

                                    @csrf

                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        Apagar
                                    </button>
                                </form> --}}
                                {{-- </td> --}}
                            </tr>                            
                        @endforeach
                    </tbody>                                    
                </table>
                <div>                    
                    <a class="btn btn-success" href="{{ route('os.create') }}">Novo serviço</a>                                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection                       