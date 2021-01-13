<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;

class \ClienteController extends Controller
{
    
    public function index(Request $request){

        if($request->category !== 'all'){
            $clients = Client::where('')
        } else{
            $clients = Client
        }
    }
}
