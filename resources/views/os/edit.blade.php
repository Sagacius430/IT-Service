@extends('layouts.app')

@section('title', 'Usuário')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.index') }}">Painel</a>
    </li>
    <li class="breadcrumb-item active">Atualizar Ordem de Serviço</li>
@endsection

@section('content')

    <div class="col-12">
        <form action="{{ route('os.update', $os->id) }}" method="POST">
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
                                        value="{{ old('os.user_id', $user->id) }}">{{ $user->name }}                                     
                                </div>
                                <div class="form-group">
                                    Client: {{$client->name}} 
                                </div>
                                <div class="form-group">
                                    <label for="">{{$machine->machine_type}}: {{$machine->brand}} {{$machine->model}}</label>
                                    <label for="">Avarias: {{$machine->breakdowns}}</label>
                                </div>
                                <hr>
                            
                        </div>

                        <div class="col 12 col-sm-4 ">
                            <div class="form-group">
                                <label>Serviços adicionais realizados</label>
                                <input type="text" name="os[service]" class="form-control"
                                    value="{{ old('os.service', $os->service) }}">
                            </div>
                        </div>

                    </div>
                    {{-- @endforeach --}}

                    {{-- <div class="row">
                    <?php
//$newServicekey = count($os->service_id);
?>
                </div> --}}

                    <div class="row">

                        <div class="col 12 col-sm-2 ">
                            <div class="form-group">
                                <label>Serviço</label>
                                <select type="text" name="os{{-- [{{$newServiceKey}}] --}}[service_id]" class="form-control">
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @foreach ($services as $work)
                                        <option value="{{ $work->id }}">
                                            {{ $work->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col 12 col-sm-2 ">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="os[status]" class="form-control">
                                    {{-- <option {{$os->status == 'Aguardando serviço' ? 'selected':''}}value="Aguardando serviço">Aguardando Serviço</option> --}}
                                    <option {{ $os->status == 'Em manutenção' ? 'selected' : '' }} value="Em manutenção">Em
                                        manutenção</option>
                                    <option {{ $os->status == 'Aguardando peça' ? 'selected' : '' }}value="Aguardando peça">
                                        Aguardando peça</option>
                                    <option {{ $os->status == 'Devolvido' ? 'selected' : '' }} value="Devolvido">Devolvido
                                    </option>
                                    <option {{ $os->status == 'Finalizado' ? 'selected' : '' }} value="Finalizado">Finalizado
                                    </option>
                                </select>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col 12 col-sm-2 ">
                            <div class="form-check">
                                <input type="checkbox" name="os[contacted]" class="form-check-input"
                                    value="{{ old('os.contacted') }}">
                                <label class="form-check-label mr-1">Contatado</label>

                            </div>
                        </div>

                        <div class="col 12 col-sm-2 ">
                            <div class="form-check">
                                <input type="checkbox" name="os[guarantee]" class="form-check-input" @if ('os[guarantee]') value="{{ old('os.gruarantee') }}"> @endif <label
                                    class="form-check-label mr-1">Garantia</label>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label>Diagnóstico</label>
                                <textarea type="text" name="os[diagnosis]" class="form-control"
                                    value="{{ old('os.diagnosis', $os->diagnosis) }}">
                                </textarea>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Procedimentos realizados</label>
                                <textarea type="text" name="os[procedures]" class="form-control"
                                    value="{{ old('os.procedures', $os->procedures) }}">
                                </textarea>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col 12 col-sm-2 ">
                            <div class="form-group">
                                <label>Finalização</label>
                                <input type="date" name="os[finish]" class="form-control"
                                    value="{{ old('os.finish', $os->finish) }}">
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
