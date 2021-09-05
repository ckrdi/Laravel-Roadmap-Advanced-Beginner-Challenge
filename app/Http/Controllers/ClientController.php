<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('clients.index', [
            'clients' => Client::latest('id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('manage client');

        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('manage client');

        $request->validate([
           'name' => 'required|unique:clients',
           'address' => 'required',
           'phone_number' => ['required', 'regex:/^(081)[0-9]{7}/']
        ]);

        Client::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number
        ]);

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Client $client
     * @return \Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Client $client)
    {
        $this->authorize('manage client');

        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Client $client)
    {
        $this->authorize('manage client');

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone_number' => ['required', 'regex:/^(081)[0-9]{7}/']
        ]);

        $client->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number
        ]);

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Client $client)
    {
        $this->authorize('manage client');

        if (!count($client->projects)) {
            $client->forceDelete();

            return redirect(RouteServiceProvider::HOME);
        }

        $client->delete();

        return redirect(RouteServiceProvider::HOME);
    }
}
