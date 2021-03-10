<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    
    public function index()
    {
        $services = Service::paginate(5);

        return view('services.index', compact('services'));
    }

    public function create()
    {
        $services = service::all();
        return view('services.create', compact('services'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
        Service::create($request->all());   
        
        DB::commit();
        } catch(\Exception $exception){
            DB::rollBack();
            return back()->with('msg_error'. 'Erro no servidor ao cadastrar serviço');
        }

        return redirect()
            ->route('services.index')
            ->with('msg_success','Cadastrado!');
    }
    
    public function show(Service $service)
    {
        //
    }

    public function edit(Service $service)
    {
        $services = Service::all();
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        DB::beginTransaction();
        
        try{

            $service->update($request['service']);
            DB::commit();

        } catch(\Exception $exception){

            DB::rollBack();
            return back()->with('msg_error'. 'Erro no servidor ao cadastrar serviço');
        
        }

        return redirect()
            ->route('services.index')
            ->with('msg_success', 'Atualizado!');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        $service->delete();

        return redirect()
            ->route('services.index');

    }
}
