<?php

namespace App\Http\Controllers\Operasional;

use App\Http\Controllers\Controller;
use App\Models\Database;
use App\Models\Engine;
use App\Models\EngineXDatabase;
use App\Models\EngineXServer;
use App\Models\GroupServer;
use App\Models\Server;
use App\Models\ServerXGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\{Carbon, CarbonPeriod};

use DB;

class EngineXServerController extends Controller
{
    public function index(Request $request)
    {
        $server = EngineXServer::latest();

        $ret['server'] = $server->paginate(10);

        return view('operational.enginexserver.index', $ret);
    }

    public function create()
    {
        $engine     = Engine::all();
        $server     = Server::all();

        $ret['engine']  = $engine;
        $ret['server']   = $server;

        return view('operational.enginexserver.create', $ret);
    }

    public function store(Request $request)
    {        

        try {
            DB::beginTransaction();
            
            $server = new EngineXServer;
            $server->id_engine      = $request->id_engine;
            $server->id_server      = $request->id_server;
            $server->save();
            // dd($server);

            DB::commit();
        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            return redirect()->back()->with('alert-error', 'Internal Error');
        }

        $messages = trans('messages.success.create',['title'=>trans('app.operational.enginexserver')]);
        return redirect()->route('operational.enginexserver.index')->with('alert-success', $messages);
    }

    public function show($id)
    {
        $server = EngineXServer::findOrFail($id);
        $ret['server'] = $server;

        return view('operational.enginexserver.show', $ret);
    }

    public function edit($id)
    {
        $sxg        = EngineXServer::findOrFail($id);
        $engine     = Engine::all();
        $server     = Server::all();

        $ret['sxg']         = $sxg;
        $ret['engine']      = $engine;
        $ret['server']      = $server;

        return view('operational.enginexserver.edit', $ret);

    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            
            $server = EngineXServer::findOrFail($id);
            $server->id_engine      = $request->id_engine;
            $server->id_server      = $request->id_server;
            $server->save();
            // dd($server);

            DB::commit();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->back()->with('alert-error', 'Internal Error');
        }

        $messages = trans('messages.success.update',['title'=>trans('app.operational.enginexserver')]);
        return redirect()->route('operational.enginexserver.index')->with('alert-success', $messages);
    }

    public function destroy($id)
    {
        $server = EngineXServer::findOrFail($id);
        $server->delete();
        $messages = trans('messages.success.delete',['title'=>trans('app.operational.enginexserver')]);
        return redirect()->route('operational.enginexserver.index')->with('alert-success', $messages);
    }
}
