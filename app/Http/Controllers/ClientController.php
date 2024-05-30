<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $buscarpor = $request->get('buscarpor');
    
        $query = Client::query();
            if ($buscarpor) {
            $query->where(function ($query) use ($buscarpor) {
                $query->where('id', 'like', '%' . $buscarpor . '%')
                      ->orWhere('name', 'like', '%' . $buscarpor . '%')
                      ->orWhere('lastname', 'like', '%' . $buscarpor . '%')
                      ->orWhere('addres', 'like', '%' . $buscarpor . '%')
                      ->orWhere('phone', 'like', '%' . $buscarpor . '%');
            });
        }
        $clients = $query->paginate();
        return view('client.index', compact('clients', 'buscarpor'))
            ->with('i', ($request->input('page', 1) - 1) * $clients->perPage());
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $client = new Client();

        return view('client.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request): RedirectResponse
    {
        Client::create($request->validated());

        return Redirect::route('clients.index')
            ->with('Cliente creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $client = Client::find($id);

        return view('client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $client = Client::find($id);

        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, Client $client): RedirectResponse
    {
        $client->update($request->validated());

        return Redirect::route('clients.index')
            ->with('success', 'Client updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Client::find($id)->delete();

        return Redirect::route('clients.index')
            ->with('success', 'Client deleted successfully');
    }
}
