<?php

namespace App\Http\Controllers;

use App\{Client, Machine};
use App\Http\Requests\{ClientRequest, MachineRequest};
use Facade\FlareClient\Http\Client as HttpClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $nome = Client::get('nome');        
        // $machines = Machine::find(1);
        $clients   = Client::all();
        $machines = Machine::paginate(5);
        //o compact envia a variável $machines para view
        return view('machines.index', compact('machines', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($client_id)
    {
        $client = CLient::findOrFail($client_id);

        return view('machines.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::beginTransaction();

        try {
            $machine = new Machine;

            foreach ($request->machines as $data) {
                $machine->create($data);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('msg_error', 'Erro no servidor ao cadastrar dispositivo.');
        }

        return redirect()
            ->route('machines.index')
            ->with('msg_success', 'Cadastrado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $clients = Client::all();
        $machines = Machine::all();

        return view('machine.index', compact('clients', 'machines'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Machine $machine)
    {
        // $machine = Machine::findOrFail($id);

        return view('client.edit', compact('machine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        return $request;
        DB::beginTransaction();
        try {

            //loop nos computadores que vieram do formulário
            foreach ($request->machines as $machine) {
                //se o computador possuir um id, o computador já existe
                if ($machine['id']) {
                    // buscando computador do cliente com base no id
                    $clientMachine = $client->machines()->where('id', $machine['id']);
                    // se o delete estiver marcado, deleta
                    if (isset($machine['delete'])) {
                        $clientMachine->delete();
                        // se não, cria computador
                    } else {
                        $clientMachine->update([
                            'id' => $machine['id']
                        ]);
                    }
                } else {
                    // se o valor do computador estiver vazio, cria o computador
                    if ($machine['id'] !== null) {
                        $client->machine()->create($machine);
                    }
                }
            }
            DB::commit();
        } catch (\Exception $exception) {

            DB::rollback();
            return back()
                ->with('msg_error', 'Erro no servidor ao atualizar cliente');
        }
        return redirect()
            ->route('clients.index')
            ->with('msg_success', 'Atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $machine = Machine::findOrFail($id);

        $machine->delete();

        return redirect()
            ->route('client.index');
    }
}
