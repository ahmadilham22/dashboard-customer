<?php

namespace App\Http\Controllers;

use App\Models\AssetModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $models = AssetModel::latest();

        if($request->has('search')){
            $query = '%'.$request->search.'%';
            $models->where('name', 'LIKE', $query);
        }

        $ret['models'] = $models->paginate(6);

        return view('asset.models.index', $ret);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset.models.create');
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
        $data['user_id'] = Auth::id();
        AssetModel::create($data);
        
        $messages = trans('messages.success.create',['title'=>trans('app.model')]);
        return redirect()->route('asset.models.index')->with('alert-success', $messages);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssetModel  $model
     * @return \Illuminate\Http\Response
     */
    public function show(AssetModel $model)
    {
        $ret['model'] = $model;
        return view('asset.models.show', $ret);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssetModel  $model
     * @return \Illuminate\Http\Response
     */
    public function edit(AssetModel $model)
    {
        $ret['model'] = $model;
        return view('asset.models.edit', $ret);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssetModel  $model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssetModel $model)
    {
        $data = $request->except('_token','_method');
        $model->update($data);
        
        $messages = trans('messages.success.update',['title'=>trans('app.model')]);
        return redirect()->route('asset.models.index')->with('alert-success', $messages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssetModel  $model
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssetModel $model)
    {
        $model->delete();
        $messages = trans('messages.success.delete',['title'=>trans('app.model')]);
        return redirect()->route('asset.models.index')->with('alert-success', $messages);
    }
}