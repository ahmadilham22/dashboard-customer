<?php

namespace App\Http\Controllers\Operasional;

use App\Http\Controllers\Controller;
use App\Models\Engine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\{Carbon, CarbonPeriod};

use DB;

class EngineController extends Controller
{
    public function index(Request $request)
    {
        $engine = Engine::latest();

        if($request->has('search')){
            $query = '%'.$request->search.'%';
            $engine->where('engine_name', 'LIKE', $query);
        }

        $ret['engine'] = $engine->paginate(10);

        return view('operational.engine.index', $ret);
    }

    public function create()
    {
        return view('operational.engine.create');
    }

    public function store(Request $request)
    {        

        try {
            DB::beginTransaction();
            
            $engine = new Engine;
            $engine->engine_name    = $request->engine_name;
            $engine->deskripsi      = $request->deskripsi;
            $engine->expose_port    = $request->expose_port;
            $engine->pembuat        = $request->pembuat;
            $engine->lokasi_folder  = $request->lokasi_folder;
            $engine->git_url        = $request->git_url;
            $engine->jenis          = $request->jenis;
            $engine->save();
            // dd($engine);

            DB::commit();
        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            return redirect()->back()->with('alert-error', 'Internal Error');
        }

        $messages = trans('messages.success.create',['title'=>trans('app.operational.engine')]);
        return redirect()->route('operational.engine.index')->with('alert-success', $messages);
    }

    public function show($id)
    {
        $engine = Engine::findOrFail($id);
        $ret['engine'] = $engine;

        return view('operational.engine.show', $ret);
    }

    public function edit($id)
    {
        $engine     = Engine::findOrFail($id);
        $ret['engine'] = $engine;

        return view('operational.engine.edit', $ret);

    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            
            $engine = Engine::findOrFail($id);
            $engine->engine_name    = $request->engine_name;
            $engine->deskripsi      = $request->deskripsi;
            $engine->expose_port    = $request->expose_port;
            $engine->pembuat        = $request->pembuat;
            $engine->lokasi_folder  = $request->lokasi_folder;
            $engine->git_url        = $request->git_url;
            $engine->jenis          = $request->jenis;
            $engine->save();
            // dd($server);

            DB::commit();
        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            return redirect()->back()->with('alert-error', 'Internal Error');
        }

        $messages = trans('messages.success.update',['title'=>trans('app.operational.engine')]);
        return redirect()->route('operational.engine.index')->with('alert-success', $messages);
    }

    public function destroy($id)
    {
        $engine = Engine::findOrFail($id);
        $engine->delete();
        $messages = trans('messages.success.delete',['title'=>trans('app.operational.engine')]);
        return redirect()->route('operational.engine.index')->with('alert-success', $messages);
    }
}
