@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.index') }}">Painel</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{ route('clients.index') }}">Serviços</a>
    </li>
    <li class="breadcrumb-item active">Novo Cliente</li>
@endsection

@section('content')

    <div class="col-12">
        <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
            <div class="card">

                <div class="card-header">
                    Cadastro de clientes
                </div>

                <div class="card-body">

                    @csrf
                    <!--tolken-->

                    <div class="row">
                        <div class="col 12 col-sm-3">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" name="client[name]" class="form-control" id="name"
                                    value="{{ old('client.name', '') }}">
                            </div>
                        </div>

                        <div class="col 12 col-sm-2">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" name="client[fone]" class="form-control" id="fone"
                                    value="{{ old('client.fone', '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <h6>Endereço</h6>
                            <hr>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12 col-sm-2">
                            <div class="form-group">
                                <label>CEP</label>
                                <input type="text" name="address[zip_code]" class="form-control" id="zip_code"
                                    value="{{ old('address.zip_code', '') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="form-group">
                                <label>Cidade</label>
                                <input type="text" name="address[city]" class="form-control" id="city"
                                    value="{{ old('address.city', '') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-1">
                            <div class="form-group">
                                <label>UF</label>
                                <input type="text" name="address[uf]" class="form-control" id="uf"
                                    value="{{ old('address.uf', '') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="form-group">
                                <label>Bairro</label>
                                <input type="text" name="address[district]" class="form-control" id="district"
                                    value="{{ old('address.district', '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 col-sm-3">
                            <div class="form-group">
                                <label>Logradouro</label>
                                <input type="text" name="address[street]" class="form-control" id="street"
                                    value="{{ old('address.street', '') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-1">
                            <div class="form-group">
                                <label>Número</label>
                                <input type="text" name="address[number]" class="form-control" id="number"
                                    value="{{ old('address.number', '') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="form-group">
                                <label>Complemento</label>
                                <input type="text" name="address[complement]" class="form-control" id="complement">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <h6>Computador</h6>
                            <hr>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 col-sm-3">
                            <div class="form-group">
                                <label>Tipo de computador</label>
                                <select type="text" name="machines[0][machine_type]" class="form-control">
                                    <option> </option>
                                    <option value="{{ old('machine.0.machine_type', 'Notebook') }}">Notebook</option>
                                    <option value="{{ old('machine.0.machine_type', 'Desktop') }}">Desktop</option>
                                </select>
                            </div>
                        </div>
                        <div class="col 12 col-sm-2 ">
                            <div class="form-group">
                                <label>Marca</label>
                                <input type="text" name="machines[0][brand]" class="form-control"
                                    value="{{ old('machine.0.brand') }}">
                            </div>
                        </div>
                        <div class="col 12 col-sm-2">
                            <div class="form-group">
                                <label>Modelo</label>
                                <input type="text" name="machines[0][model]" class="form-control"
                                    value="{{ old('machine.0.model', '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col 12 col-sm-2">
                            <div class="form-group">
                                <label>Número do serial</label>
                                <input type="text" name="machines[0][serial_number]" class="form-control"
                                    value="{{ old('machine.0.serial_number', '') }}">
                            </div>
                        </div>
                        <div class="col 12 col-sm-2">
                            <div class="form-group">
                                <label>Descrição</label>
                                <input type="text" name="machines[0][description]" class="form-control"
                                    value="{{ old('machine.0.description', '') }}">
                            </div>
                        </div>
                        <div class="col 12 col-sm-2">
                            <div class="form-group">
                                <label>Avarias físicas</label>
                                <input type="text" name="machines[0][breakdowns]" class="form-control"
                                    value="{{ old('machine.0.breakdowns', '') }}">
                            </div>
                        </div>
                        {{-- <div style="display:nome">
                            <div class="form-group">
                                <label>Id do cliente</label>
                                    {{-- <input type="text" name="machines[0][client_id]" class="form-control"
                                        value="{{ old('machine.0.client_id', asset('/clients/create/'.$client_id->id)) }}"> --}}
                        {{-- colocar id que vem da URL --}}
                        {{-- </div>
                        </div> --}}
                    </div>

                    <div class="row" id="addMachine" style="display:none">
                        <div class="row mt-2">
                            <div class="col-12 col-sm-3">
                                <div class="form-group">
                                    <label>Tipo de computador</label>
                                    <select type="text" name="machines[1][machine_type]" class="form-control">
                                        <option> </option>
                                        <option value="{{ old('machine.1.machine_type', 'Notebook') }}">Notebook</option>
                                        <option value="{{ old('machine.1.machine_type', 'Desktop') }}">Desktop</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col 12 col-sm-2 ">
                                <div class="form-group">
                                    <label>Marca</label>
                                    <input type="text" name="machines[1][brand]" class="form-control"
                                        value="{{ old('machine.1.brand') }}">
                                </div>
                            </div>
                            <div class="col 12 col-sm-2">
                                <div class="form-group">
                                    <label>Modelo</label>
                                    <input type="text" name="machines[1][model]" class="form-control"
                                        value="{{ old('machine.1.model', '') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col 12 col-sm-2">
                                <div class="form-group">
                                    <label>Número do serial</label>
                                    <input type="text" name="machines[1][serial_number]" class="form-control"
                                        value="{{ old('machine.1.serial_number', '') }}">
                                </div>
                            </div>
                            <div class="col 12 col-sm-2">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <input type="text" name="machines[1][description]" class="form-control"
                                        value="{{ old('machine.1.description', '') }}">
                                </div>
                            </div>
                            <div class="col 12 col-sm-2">
                                <div class="form-group">
                                    <label>Avarias físicas</label>
                                    <input type="text" name="machines[1][breakdowns]" class="form-control"
                                        value="{{ old('machine.1.breakdowns', '') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="btn bg-light text-secondary" onclick="add_div('addMachine')">Adicionar
                            computador</button>
                    </div>
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success"><i class='fa fa-save'></i> Enviar</button>
                </div>

            </div>
        </form>
    </div>

    <div class="col-12 mt-4">

        <form action="{{ route('clients.import') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="card">
                <div class="card-header">
                    Importar arquivo CSV
                </div>
                <div class="card-body">

                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                <input name="file" type="file" class="custom-file-input" id="file-input">
                                <label class="custom-file-label text-black-50" for="file-input" data-browse="Procurar">
                                    Procurar
                                </label>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Importar</button>
                </div>

            </div>
        </form>
    </div>


@endsection
