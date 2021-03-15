@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.index') }}">Painel</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{ route('machines.index') }}">Serviços</a>
    </li>
    <li class="breadcrumb-item active">Novo Computador</li>
@endsection

@section('content')

    <div class="col-12">
        <div class="card">
            <form action="{{ route('machines.store') }}" method="POST">
                <div class="card-header">
                    Cadastro de computadores
                </div>

                <div class="card-body">

                    @csrf
                    <!--tolken-->

                    <?php $newMachinekey = count($client->machines); ?>
                    
                    <div class="row">
                        <div class="col 12 col-sm-2 ">
                            <div class="form-group">
                                <label>Tipo de computador</label>
                                <select type="text" name="machines[{{ $newMachinekey }}][machine_type]" size=1
                                    class="form-control">
                                    <option> </option>
                                    <option value="{{ old('machine.$newMachinekey.machine_type', 'Notebook') }}">
                                        Notebook
                                    </option>
                                    <option value="{{ old('machine.$newMachinekey.machine_type', 'Desktop') }}">
                                        Desktop
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col 12 col-sm-2">
                            <div class="form-group">
                                <label>Marca</label>
                                <input type="text" name="machines[{{ $newMachinekey }}][brand]" class="form-control"
                                    value="{{ old('machine.$newMachinekey.brand', '') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col 12 col-sm-2">
                            <div class="form-group">
                                <label>Modelo</label>
                                <input type="text" name="machines[{{ $newMachinekey }}][model]" class="form-control"
                                    value="{{ old('machine.$newMachinekey.model', '') }}">
                            </div>
                        </div>
                        <div class="col 12 col-sm-2">
                            <div class="form-group">
                                <label>Número do serial</label>
                                <input type="text" name="machines[{{ $newMachinekey }}][serial_number]"
                                    class="form-control" value="{{ old('machine.$newMachinekey.serial_number', '') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col 12 col-sm-2">
                            <div class="form-group">
                                <label>Descrição</label>
                                <input type="text" name="machines[{{ $newMachinekey }}][description]" class="form-control"
                                    value="{{ old('machine.$newMachinekey.description', '') }}">
                            </div>
                        </div>
                        <div class="col 12 col-sm-2">
                            <div class="form-group">
                                <label>Avarias físicas</label>
                                <input type="text" name="machines[{{ $newMachinekey }}][breakdowns]" class="form-control"
                                    value="{{ old('machine.$newMachinekey.breakdowns', '') }}">
                            </div>
                        </div>
                        <div class="col 12 col-sm-2">
                            <div class="form-group">
                                <label></label>
                                <input type="hidden" name="machines[{{ $newMachinekey }}][client_id]" class="form-control"
                                    value="{{$client->id}}">
                                {{-- <input type="hidden" name="client[id]" class="form-control"
                                    value="{{$client->id}}"> --}}
                                    
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success"><i class='fa fa-save'></i> 
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-12 mt-4">
        <div class="card">
            
            <div class="card-header">
                Computadores cadastrados no cliente {{$client->name}}      
            </div>
    <div class="card-body">
        <div class="row">
            <div class="col 12">
                <table class="table table-hover">
                    <thead class="table-primary">
                        <th class="align-middle">Tipo</th>
                        <th class="align-middle">Marca</th>
                        <th class="align-midle">Modelo</th>
                    </thead>
                    <tbody>
                        @foreach ($client->machines as $machine)
                            <tr>
                                <td>{{ $machine->machine_type }}</td>
                                <td>{{ $machine->brand }}</td>
                                <td>{{ $machine->model }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
    {{-- <div>{!!$machines->links()!!}</div> --}}
@endsection
