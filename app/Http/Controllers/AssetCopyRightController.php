<?php

namespace App\Http\Controllers;

use App\Models\AssetCopyRight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetCopyRightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $copy_rights = AssetCopyRight::latest();

        if($request->has('search')){
            $query = '%'.$request->search.'%';
            $copy_rights->where('name', 'LIKE', $query);
        }

        $ret['copy_rights'] = $copy_rights->paginate(6);

        return view('asset.copy-rights.index', $ret);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset.copy-rights.create');
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
        AssetCopyRight::create($data);
        
        $messages = trans('messages.success.create',['title'=>trans('app.copy_right')]);
        return redirect()->route('asset.copy-rights.index')->with('alert-success', $messages);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\copy-rights\AssetCopyRight  $copy_right
     * @return \Illuminate\Http\Response
     */
    public function show(AssetCopyRight $copy_right)
    {
        $ret['copy_right'] = $copy_right;
        return view('asset.copy-rights.show', $ret);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\copy-rights\AssetCopyRight  $copy_right
     * @return \Illuminate\Http\Response
     */
    public function edit(AssetCopyRight $copy_right)
    {
        $ret['copy_right'] = $copy_right;
        return view('asset.copy-rights.edit', $ret);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\copy-rights\AssetCopyRight  $copy_right
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssetCopyRight $copy_right)
    {
        $data = $request->except('_token','_method');
        $copy_right->update($data);
        
        $messages = trans('messages.success.update',['title'=>trans('app.copy_right')]);
        return redirect()->route('asset.copy-rights.index')->with('alert-success', $messages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\copy-rights\AssetCopyRight  $copy_right
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssetCopyRight $copy_right)
    {
        $copy_right->delete();
        $messages = trans('messages.success.delete',['title'=>trans('app.copy_right')]);
        return redirect()->route('asset.copy-rights.index')->with('alert-success', $messages);
    }
}