<?php

namespace App\Http\Controllers;

use App\Models\{AssetProductCompetitor, AssetProduct};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetProductCompetitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, AssetProduct $product)
    {
        $competitors = AssetProductCompetitor::latest()->where('asset_product_id', $product->id);

        if($request->has('search')){
            $query = '%'.$request->search.'%';
            $competitors->where('name', 'LIKE', $query);
        }

        $ret['competitors'] = $competitors->paginate(6);
        $ret['product'] = $product;
        return view('asset.products.competitors.index', $ret);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AssetProduct $product)
    {
        $ret['product'] = $product;
        return view('asset.products.competitors.create', $ret);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AssetProduct $product)
    {
        $data = $request->except('_token');
        $data['asset_product_id'] = $product->id;
        $data['created_by'] = Auth::id();
        AssetProductCompetitor::create($data);
        
        $messages = trans('messages.success.create',['title'=>trans('app.competitor')]);
        return redirect()->route('asset.products.competitors.index', $product)->with('alert-success', $messages);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssetProductCompetitor  $competitor
     * @return \Illuminate\Http\Response
     */
    public function show(AssetProduct $product, AssetProductCompetitor $competitor)
    {
        $ret['competitor'] = $competitor;
        $ret['product'] = $product;

        return view('asset.products.competitors.show', $ret);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssetProductCompetitor  $competitor
     * @return \Illuminate\Http\Response
     */
    public function edit(AssetProduct $product, AssetProductCompetitor $competitor)
    {
        $ret['competitor'] = $competitor;
        $ret['product'] = $product;

        return view('asset.products.competitors.edit', $ret);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssetProductCompetitor  $competitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssetProduct $product, AssetProductCompetitor $competitor)
    {
        $data = $request->except('_token','_method');
        $data['updated_by'] = Auth::id();
        $competitor->update($data);
        
        $messages = trans('messages.success.update',['title'=>trans('app.competitor')]);
        return redirect()->route('asset.products.competitors.index', $product)->with('alert-success', $messages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssetProductCompetitor  $competitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssetProduct $product, AssetProductCompetitor $competitor)
    {
        $competitor = tap($competitor)->update(['deleted_by'=>Auth::id()]);
        $competitor->delete();
        $messages = trans('messages.success.delete',['title'=>trans('app.competitor')]);
        return redirect()->route('asset.products.competitors.index', $product)->with('alert-success', $messages);
    }
}