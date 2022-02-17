<?php

namespace App\Http\Controllers;

use App\Models\AssetClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = AssetClient::latest();

        if($request->has('search')){
            $query = '%'.$request->search.'%';
            $clients->where('name', 'LIKE', $query);
        }

        $ret['clients'] = $clients->paginate(6);

        return view('asset.clients.index', $ret);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['created_by'] = Auth::id();
        AssetClient::create($data);
        
        $messages = trans('messages.success.create',['title'=>trans('app.client')]);
        return redirect()->route('asset.clients.index')->with('alert-success', $messages);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssetClient  $client
     * @return \Illuminate\Http\Response
     */
    public function show(AssetClient $client)
    {
        $ret['client'] = $client;
        return view('asset.clients.show', $ret);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssetClient  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(AssetClient $client)
    {
        $ret['client'] = $client;
        return view('asset.clients.edit', $ret);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssetClient  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssetClient $client)
    {
        $data = $request->except('_token','_method');
        $data['updated_by'] = Auth::id();
        $client->update($data);
        
        $messages = trans('messages.success.update',['title'=>trans('app.client')]);
        return redirect()->route('asset.clients.index')->with('alert-success', $messages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssetClient  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssetClient $client)
    {
        $client->delete();
        $messages = trans('messages.success.delete',['title'=>trans('app.client')]);
        return redirect()->route('asset.clients.index')->with('alert-success', $messages);
    }
}