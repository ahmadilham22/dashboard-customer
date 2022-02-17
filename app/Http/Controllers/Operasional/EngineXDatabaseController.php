<?php

namespace App\Http\Controllers\Operasional;

use App\Http\Controllers\Controller;
use App\Models\Database;
use App\Models\Engine;
use App\Models\EngineXDatabase;
use App\Models\GroupServer;
use App\Models\Server;
use App\Models\ServerXGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\{Carbon, CarbonPeriod};

use DB;

class EngineXDatabaseController extends Controller
{
    public function index(Request $request)
    {
        $server = EngineXDatabase::latest();

        $ret['server'] = $server->paginate(10);

        return view('operational.enginexdatabase.index', $ret);
    }

    public function create()
    {
        $engine     = Engine::all();
        $database   = Database::all();

        $ret['engine']  = $engine;
        $ret['database']   = $database;

        return view('operational.enginexdatabase.create', $ret);
    }

    public function store(Request $request)
    {        

        try {
            DB::beginTransaction();
            
            $server = new EngineXDatabase;
            $server->id_engine      = $request->id_engine;
            $server->id_database    = $request->id_database;
            $server->save();
            // dd($server);

            DB::commit();
        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            return redirect()->back()->with('alert-error', 'Internal Error');
        }

        $messages = trans('messages.success.create',['title'=>trans('app.operational.enginexdatabase')]);
        return redirect()->route('operational.enginexdatabase.index')->with('alert-success', $messages);
    }

    public function show($id)
    {
        $server = EngineXDatabase::findOrFail($id);
        $ret['server'] = $server;

        return view('operational.enginexdatabase.show', $ret);
    }

    public function edit($id)
    {
        $sxg        = EngineXDatabase::findOrFail($id);
        $engine     = Engine::all();
        $database   = Database::all();

        $ret['sxg']         = $sxg;
        $ret['engine']      = $engine;
        $ret['database']    = $database;

        return view('operational.enginexdatabase.edit', $ret);

    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            
            $server = EngineXDatabase::findOrFail($id);
            $server->id_engine      = $request->id_engine;
            $server->id_database    = $request->id_database;
            $server->save();
            // dd($server);

            DB::commit();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->back()->with('alert-error', 'Internal Error');
        }

        $messages = trans('messages.success.update',['title'=>trans('app.operational.enginexdatabase')]);
        return redirect()->route('operational.enginexdatabase.index')->with('alert-success', $messages);
    }

    public function destroy($id)
    {
        $server = EngineXDatabase::findOrFail($id);
        $server->delete();
        $messages = trans('messages.success.delete',['title'=>trans('app.operational.enginexdatabase')]);
        return redirect()->route('operational.enginexdatabase.index')->with('alert-success', $messages);
    }
}
