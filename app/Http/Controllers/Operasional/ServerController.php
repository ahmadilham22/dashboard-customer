<?php

namespace App\Http\Controllers\Operasional;

use App\Http\Controllers\Controller;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\{Carbon, CarbonPeriod};

use Illuminate\Support\Facades\DB;

class ServerController extends Controller
{
    public function index(Request $request)
    {
        $server = Server::latest();

        if($request->has('search')){
            $query = '%'.$request->search.'%';
            $server->where('server_name', 'LIKE', $query);
        }

        $ret['server'] = $server->paginate(10);

        return view('operational.server.index', $ret);
    }

    public function create()
    {
        $timezone = json_decode(file_get_contents('http://worldtimeapi.org/api/timezone'), true);

        $ret['timezone'] = $timezone;

        return view('operational.server.create', $ret);
    }

    public function store(Request $request)
    {        

        try {
            DB::beginTransaction();
            
            $server = new Server;
            $server->network_number             = $request->network_number;
            $server->server_name                = $request->server_name;
            $server->ip_public                  = $request->ip_public;
            $server->ip_private                 = $request->ip_private;
            $server->hardisk_capacity_total     = $request->hardisk_capacity_total;
            $server->processor                  = $request->processor;
            $server->jumlah_core                = $request->jumlah_core;
            $server->total_ram                  = $request->total_ram;
            $server->operating_system           = $request->operating_system;
            $server->username                   = $request->username;
            $server->password                   = $request->password;
            $server->ssh_port                   = $request->ssh_port;
            $server->status                     = $request->status;
            $server->time_zone                  = $request->time_zone;
            $server->port_monitoring            = $request->port_monitoring;
            $server->tipe_server                = $request->tipe_server;
            $server->owner                      = $request->owner;
            $server->ada_gpu                    = $request->ada_gpu;
            $server->nama_gpu                   = $request->nama_gpu;
            $server->jenis_gpu                  = $request->jenis_gpu;
            $server->kapasitas_gpu              = $request->kapasitas_gpu;
            $server->save();
            // dd($server);

            DB::commit();
        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            return redirect()->back()->with('alert-error', 'Internal Error');
        }

        $messages = trans('messages.success.create',['title'=>trans('app.operational.operational')]);
        return redirect()->route('operational.server.index')->with('alert-success', $messages);
    }

    public function show($id)
    {
        $server = Server::findOrFail($id);
        $timezone = json_decode(file_get_contents('http://worldtimeapi.org/api/timezone'), true);

        $ret['timezone'] = $timezone;
        $ret['server'] = $server;

        return view('operational.server.show', $ret);
    }

    public function edit($id)
    {
        $server = Server::findOrFail($id);
        $timezone = json_decode(file_get_contents('http://worldtimeapi.org/api/timezone'), true);

        $ret['timezone'] = $timezone;
        $ret['server'] = $server;

        return view('operational.server.edit', $ret);

    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            
            $server = Server::findOrFail($id);
            $server->network_number             = $request->network_number;
            $server->server_name                = $request->server_name;
            $server->ip_public                  = $request->ip_public;
            $server->ip_private                 = $request->ip_private;
            $server->hardisk_capacity_total     = $request->hardisk_capacity_total;
            $server->processor                  = $request->processor;
            $server->jumlah_core                = $request->jumlah_core;
            $server->total_ram                  = $request->total_ram;
            $server->operating_system           = $request->operating_system;
            $server->username                   = $request->username;
            $server->password                   = $request->password;
            $server->ssh_port                   = $request->ssh_port;
            $server->status                     = $request->status;
            $server->time_zone                  = $request->time_zone;
            $server->port_monitoring            = $request->port_monitoring;
            $server->tipe_server                = $request->tipe_server;
            $server->owner                      = $request->owner;
            $server->ada_gpu                    = $request->ada_gpu;
            $server->nama_gpu                   = $request->nama_gpu;
            $server->jenis_gpu                  = $request->jenis_gpu;
            $server->kapasitas_gpu              = $request->kapasitas_gpu;
            $server->save();
            // dd($server);

            DB::commit();
        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            return redirect()->back()->with('alert-error', 'Internal Error');
        }

        $messages = trans('messages.success.update',['title'=>trans('app.operational.operational')]);
        return redirect()->route('operational.server.index')->with('alert-success', $messages);
    }

    public function destroy($id)
    {
        $server = Server::findOrFail($id);
        $server->delete();
        $messages = trans('messages.success.delete',['title'=>trans('app.operational.operational')]);
        return redirect()->route('operational.server.index')->with('alert-success', $messages);
    }
}