<?php

namespace App\Http\Controllers;

use App\Models\AssetSoftware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetSoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $software = AssetSoftware::latest();

        if($request->has('search')){
            $query = '%'.$request->search.'%';
            $software->where('name', 'LIKE', $query);
        }

        $ret['software'] = $software->paginate(6);

        return view('asset.softwares.index', $ret);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('asset.softwares.create');
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

        if ($request->hasFile('file')) {
            $file = $request->file;
            $original_name = $file->getClientOriginalName();
            $timestamp = now()->timestamp;
            $filename = $timestamp.'_'.$original_name;
            $data['file'] = \Storage::disk(config('app.disk'))->putFileAs('software', $file, $filename);
        }
        
        $data['user_id'] = Auth::id();
        AssetSoftware::create($data);
        
        $messages = trans('messages.success.create',['title'=>trans('app.software')]);
        return redirect()->route('asset.softwares.index')->with('alert-success', $messages);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssetSoftware  $software
     * @return \Illuminate\Http\Response
     */
    public function show(AssetSoftware $software)
    {
        $ret['software'] = $software;
        return view('asset.softwares.show', $ret);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssetSoftware  $software
     * @return \Illuminate\Http\Response
     */
    public function edit(AssetSoftware $software)
    {
        $ret['software'] = $software;
        return view('asset.softwares.edit', $ret);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssetSoftware  $software
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssetSoftware $software)
    {
        $data = $request->except('_token','_method');
        
        $data = $request->except('_token');
        if ($request->hasFile('file')) {
            $file = $request->file;
            $original_name = $file->getClientOriginalName();
            $timestamp = now()->timestamp;
            $filename = $timestamp.'_'.$original_name;
            $data['file'] = \Storage::disk(config('app.disk'))->putFileAs('software', $file, $filename);
        }
        
        $software->update($data);
        
        $messages = trans('messages.success.update',['title'=>trans('app.software')]);
        return redirect()->route('asset.softwares.index')->with('alert-success', $messages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssetSoftware  $assetSoftware
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssetSoftware $software)
    {
        $software->delete();
        $messages = trans('messages.success.delete',['title'=>trans('app.software')]);
        return redirect()->route('asset.softwares.index')->with('alert-success', $messages);
    }
}