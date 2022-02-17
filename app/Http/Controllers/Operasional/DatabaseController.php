<?php

namespace App\Http\Controllers\Operasional;

use App\Http\Controllers\Controller;
use App\Models\Database;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\{Carbon, CarbonPeriod};

use DB;

class DatabaseController extends Controller
{
    public function index(Request $request)
    {
        $database = Database::latest();

        if($request->has('search')){
            $query = '%'.$request->search.'%';
            $database->where('nama_database', 'LIKE', $query);
        }

        $ret['database'] = $database->paginate(10);

        return view('operational.database.index', $ret);
    }

    public function create()
    {
        $server = Server::all();
        $ret['server'] = $server;

        return view('operational.database.create', $ret);
    }

    public function store(Request $request)
    {        

        try {
            DB::beginTransaction();
            
            $database = new Database;
            $database->nama_database  = $request->nama_database;
            $database->jenis_database = $request->jenis_database;
            $database->port           = $request->port;
            $database->id_server      = $request->id_server;
            $database->save();
            // dd($server);

            DB::commit();
        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            return redirect()->back()->with('alert-error', 'Internal Error');
        }

        $messages = trans('messages.success.create',['title'=>trans('app.operational.database')]);
        return redirect()->route('operational.database.index')->with('alert-success', $messages);
    }

    public function show($id)
    {
        $database = Database::findOrFail($id);
        $ret['database'] = $database;

        return view('operational.database.show', $ret);
    }

    public function edit($id)
    {
        $database   = Database::findOrFail($id);
        $server     = Server::all();

        $ret['server']      = $server;
        $ret['database']    = $database;

        return view('operational.database.edit', $ret);

    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            
            $database = Database::findOrFail($id);
            $database->nama_database  = $request->nama_database;
            $database->jenis_database = $request->jenis_database;
            $database->port           = $request->port;
            $database->id_server      = $request->id_server;
            $database->save();
            // dd($server);

            DB::commit();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->back()->with('alert-error', 'Internal Error');
        }

        $messages = trans('messages.success.update',['title'=>trans('app.operational.database')]);
        return redirect()->route('operational.database.index')->with('alert-success', $messages);
    }

    public function destroy($id)
    {
        $database = Database::findOrFail($id);
        $database->delete();
        $messages = trans('messages.success.delete',['title'=>trans('app.operational.database')]);
        return redirect()->route('operational.database.index')->with('alert-success', $messages);
    }
}
