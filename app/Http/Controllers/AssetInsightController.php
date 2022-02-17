<?php

namespace App\Http\Controllers;

use App\Models\AssetInsight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetInsightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $insights = AssetInsight::latest();

        if($request->has('search')){
            $query = '%'.$request->search.'%';
            $insights->where('name', 'LIKE', $query);
        }

        $ret['insights'] = $insights->paginate(6);

        return view('asset.insights.index', $ret);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset.insights.create');
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
            $data['file'] = \Storage::disk(config('app.disk'))->putFileAs('insight', $file, $filename);
        }

        $data['user_id'] = Auth::id();
        AssetInsight::create($data);
        
        $messages = trans('messages.success.create',['title'=>trans('app.insights')]);
        return redirect()->route('asset.insights.index')->with('alert-success', $messages);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssetInsight $insight
     * @return \Illuminate\Http\Response
     */
    public function show(AssetInsight $insight)
    {
        $ret['insight'] = $insight;
        return view('asset.insights.show', $ret);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssetInsight  $insight
     * @return \Illuminate\Http\Response
     */
    public function edit(AssetInsight $insight)
    {
        $ret['insight'] = $insight;
        return view('asset.insights.edit', $ret);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssetInsight  $insight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssetInsight $insight)
    {
        $data = $request->except('_token','_method');
        
        $data = $request->except('_token');
        if ($request->hasFile('file')) {
            $file = $request->file;
            $original_name = $file->getClientOriginalName();
            $timestamp = now()->timestamp;
            $filename = $timestamp.'_'.$original_name;
            $data['file'] = \Storage::disk(config('app.disk'))->putFileAs('insight', $file, $filename);
        }
        
        $insight->update($data);
        
        $messages = trans('messages.success.update',['title'=>trans('app.insights')]);
        return redirect()->route('asset.insights.index')->with('alert-success', $messages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssetInsight  $insight
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssetInsight $insight)
    {
        $insight->delete();
        $messages = trans('messages.success.delete',['title'=>trans('app.insights')]);
        return redirect()->route('asset.insights.index')->with('alert-success', $messages);
    }
}