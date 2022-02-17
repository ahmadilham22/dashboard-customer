<?php

namespace App\Http\Controllers;

use App\Models\AssetProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = AssetProduct::latest();

        if($request->has('search')){
            $query = '%'.$request->search.'%';
            $products->where('name', 'LIKE', $query);
        }

        $ret['products'] = $products->paginate(6);

        return view('asset.products.index', $ret);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset.products.create');
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
        AssetProduct::create($data);
        
        $messages = trans('messages.success.create',['title'=>trans('app.product')]);
        return redirect()->route('asset.products.index')->with('alert-success', $messages);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssetProduct  $product
     * @return \Illuminate\Http\Response
     */
    public function show(AssetProduct $product)
    {
        $ret['product'] = $product;
        return view('asset.products.show', $ret);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssetProduct  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(AssetProduct $product)
    {
        $ret['product'] = $product;
        return view('asset.products.edit', $ret);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssetProduct  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssetProduct $product)
    {
        $data = $request->except('_token','_method');
        $product->update($data);
        
        $messages = trans('messages.success.update',['title'=>trans('app.product')]);
        return redirect()->route('asset.products.index')->with('alert-success', $messages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssetProduct  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssetProduct $product)
    {
        $product->delete();
        $messages = trans('messages.success.delete',['title'=>trans('app.product')]);
        return redirect()->route('asset.products.index')->with('alert-success', $messages);
    }
}