<?php

namespace App\Http\Controllers\Operasional;

use App\Http\Controllers\Controller;
use App\Models\Database;
use App\Models\GroupServer;
use App\Models\Server;
use App\Models\ServerXGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\{Carbon, CarbonPeriod};

use DB;

class ServerXGroupController extends Controller
{
    public function index(Request $request)
    {
        $server = ServerXGroup::latest();

        $ret['server'] = $server->paginate(10);

        return view('operational.serverxgroup.index', $ret);
    }

    public function create()
    {
        $server = Server::all();
        $group  = GroupServer::all();

        $ret['server']  = $server;
        $ret['group']   = $group;

        return view('operational.serverxgroup.create', $ret);
    }

    public function store(Request $request)
    {        

        try {
            DB::beginTransaction();
            
            $server = new ServerXGroup;
            $server->id_group_server  = $request->id_group_server;
            $server->id_server      = $request->id_server;
            $server->save();
            // dd($server);

            DB::commit();
        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            return redirect()->back()->with('alert-error', 'Internal Error');
        }

        $messages = trans('messages.success.create',['title'=>trans('app.operational.serverxgroup')]);
        return redirect()->route('operational.serverxgroup.index')->with('alert-success', $messages);
    }

    public function show($id)
    {
        $server = ServerXGroup::findOrFail($id);
        $ret['server'] = $server;

        return view('operational.serverxgroup.show', $ret);
    }

    public function edit($id)
    {
        $sxg   = ServerXGroup::findOrFail($id);
        $server     = Server::all();
        $group      = GroupServer::all();

        $ret['server']      = $server;
        $ret['sxg']         = $sxg;
        $ret['group']       = $group;

        return view('operational.serverxgroup.edit', $ret);

    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            
            $server = ServerXGroup::findOrFail($id);
            $server->id_group_server  = $request->id_group_server;
            $server->id_server      = $request->id_server;
            $server->save();
            // dd($server);

            DB::commit();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->back()->with('alert-error', 'Internal Error');
        }

        $messages = trans('messages.success.update',['title'=>trans('app.operational.serverxgroup')]);
        return redirect()->route('operational.serverxgroup.index')->with('alert-success', $messages);
    }

    public function destroy($id)
    {
        $server = ServerXGroup::findOrFail($id);
        $server->delete();
        $messages = trans('messages.success.delete',['title'=>trans('app.operational.serverxgroup')]);
        return redirect()->route('operational.serverxgroup.index')->with('alert-success', $messages);
    }
}
