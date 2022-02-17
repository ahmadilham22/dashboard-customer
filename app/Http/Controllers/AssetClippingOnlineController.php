<?php

namespace App\Http\Controllers;

use App\Models\{AssetClippingOnline, AssetClient};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetClippingOnlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clippingOnlines = AssetClippingOnline::latest();

        if($request->has('search')){
            $query = '%'.$request->search.'%';
            $clippingOnlines->where('content', 'LIKE', $query);
        }

        if($request->client_id){
            $clippingOnlines->where('client_id', $request->client_id);
        }

        $ret['clippingOnlines'] = $clippingOnlines->paginate(6);
        $ret['clients'] = AssetClient::orderBy('name')->get();

        return view('asset.clipping-onlines.index', $ret);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ret['clients'] = AssetClient::orderBy('name')->get();
        return view('asset.clipping-onlines.create', $ret);
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
        $date_news = explode(' - ', $data['date_news']);
        $data['start_date_news'] = $date_news[0];
        $data['end_date_news'] = $date_news[1];
        unset($data['date_news']);

        $data['created_by'] = Auth::id();
        AssetClippingOnline::create($data);
        
        $messages = trans('messages.success.create',['title'=>trans('app.clipping_online')]);
        return redirect()->route('asset.clipping-onlines.index')->with('alert-success', $messages);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssetClippingOnline $clippingOnline
     * @return \Illuminate\Http\Response
     */
    public function show(AssetClippingOnline $clippingOnline)
    {
        $ret['clippingOnline'] = $clippingOnline;
        return view('asset.clipping-onlines.show', $ret);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssetClippingOnline  $clippingOnline
     * @return \Illuminate\Http\Response
     */
    public function edit(AssetClippingOnline $clippingOnline)
    {
        $ret['clippingOnline'] = $clippingOnline;
        $ret['clients'] = AssetClient::orderBy('name')->get();
        return view('asset.clipping-onlines.edit', $ret);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssetClippingOnline  $clippingOnline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssetClippingOnline $clippingOnline)
    {
        $data = $request->except('_token','_method');
        $date_news = explode(' - ', $data['date_news']);
        $data['start_date_news'] = $date_news[0];
        $data['end_date_news'] = $date_news[1];
        $data['updated_by'] = Auth::id();

        $clippingOnline->update($data);
        
        $messages = trans('messages.success.update',['title'=>trans('app.clipping_online')]);
        return redirect()->route('asset.clipping-onlines.index')->with('alert-success', $messages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssetClippingOnline  $clippingOnline
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssetClippingOnline $clippingOnline)
    {   
        $clippingOnline = tap($clippingOnline)->update(['deleted_by'=>Auth::id()]);
        $clippingOnline->delete();
        $messages = trans('messages.success.delete',['title'=>trans('app.clipping_online')]);
        return redirect()->route('asset.clipping-onlines.index')->with('alert-success', $messages);
    }
}