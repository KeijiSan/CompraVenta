<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\Client\StoreRequest;
use App\Http\Requests\Client\UpdateRequest;

class ClientController extends Controller
{
     public function index()
    {
        $clients = Client ::get();
        return view('admin.client.index',compact('clients'));
    }


    public function create()
    {
        return view('admin.client.create');

    }


    public function Store(StoreRequest $request)
    {
        Client::create($request->all());
        return redirect()->route('clients.index');   
    }


    public function show(client $client)
    {
        return view('admin.client.show',compact('clients'));
        
    }


    public function edit(client $client)
    {
        return view('admin.client.show',compact('clients'));

    }


    public function Update(UpdateRequest $request, client $client)
    {
        $client::update($request->all());
        return redirect()->route('clients.index'); 
    }

    public function destroy(client $client)
    {
        $client->delete();
        return redirect()->route('clients.index'); 

    }
}
