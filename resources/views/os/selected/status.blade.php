@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/movement-styles.css') }}">
@endsection

@section('select')


    <div class="row">
        <table class="table table-hover">
            <thead class="table-primary">
                <th class="align-middle">Cliente</th>
                <th class="align-middle">Serviço</th>
                <th class="align-middle">Status</th>
                <th class="align-middle">Dias</th>{{-- tempo de OS aberta --}}
                <th class="align-middle">Garantia até</th>
                {{-- <th class="align-middle">Finalizado</th> --}}
                <th class="align-middle">Técnico</th>
                <th class="align-middle" colspan="2">Ações</th>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    @if ($order->guarantee != null)
                        <tr>
                            <td>
                                @foreach ($clients as $client)
                                    @if ($client->id == $order->client_id)
                                        {{ $client->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $order->service }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $dateNow->diffInDays($order->created_at) }}</td>
                            <td>{{ $order->guarantee }}</td>
                            {{-- <td>{{$order->finish}}</td> --}}
                            <td>
                                @foreach ($users as $user)
                                    @if ($user->id == $order->user_id)
                                        {{ $user->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <a class="btn alert-warning" href="{{ route('os.edit', $order->id) }}">
                                    Editar
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('os.destroy', $order->id) }}" method="POST">

                                    @csrf

                                    @method('DELETE')
                                    <button class="btn alert-danger" type="submit">
                                        Apagar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
    
}
  