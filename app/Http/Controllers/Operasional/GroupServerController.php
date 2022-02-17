<?php

namespace App\Http\Controllers\Operasional;

use App\Http\Controllers\Controller;
use App\Models\GroupServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\{Carbon, CarbonPeriod};

use DB;

class GroupServerController extends Controller
{
    public function index(Request $request)
    {
        $server = GroupServer::latest();

        if($request->has('search')){
            $query = '%'.$request->search.'%';
            $server->where('server_name', 'LIKE', $query);
        }

        $ret['server'] = $server->paginate(10);

        return view('operational.groupserver.index', $ret);
    }

    public function create()
    {
        return view('operational.groupserver.create');
    }

    public function store(Request $request)
    {        

        try {
            DB::beginTransaction();
            
            $server = new GroupServer;
            $server->nama_group = $request->nama_group;
            $server->client     = $request->client;
            $server->save();
            // dd($server);

            DB::commit();
        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            return redirect()->back()->with('alert-error', 'Internal Error');
        }

        $messages = trans('messages.success.create',['title'=>trans('app.operational.operational')]);
        return redirect()->route('operational.groupserver.index')->with('alert-success', $messages);
    }

    public function show($id)
    {
        $server = GroupServer::findOrFail($id);
        $ret['server'] = $server;

        return view('operational.groupserver.show', $ret);
    }

    public function edit($id)
    {
        $server = GroupServer::findOrFail($id);
        $ret['server'] = $server;

        return view('operational.groupserver.edit', $ret);

    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            
            $server = GroupServer::findOrFail($id);
            $server->nama_group = $request->nama_group;
            $server->client     = $request->client;
            $server->save();
            // dd($server);

            DB::commit();
        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            return redirect()->back()->with('alert-error', 'Internal Error');
        }

        $messages = trans('messages.success.update',['title'=>trans('app.operational.operational')]);
        return redirect()->route('operational.groupserver.index')->with('alert-success', $messages);
    }

    public function destroy($id)
    {
        $server = GroupServer::findOrFail($id);
        $server->delete();
        $messages = trans('messages.success.delete',['title'=>trans('app.operational.operational')]);
        return redirect()->route('operational.groupserver.index')->with('alert-success', $messages);
    }
}
