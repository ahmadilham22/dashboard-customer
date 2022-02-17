<?php

namespace App\Http\Controllers;

use App\Models\AssetDomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AssetDomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $domains = AssetDomain::latest();

        if($request->has('search')){
            $query = '%'.$request->search.'%';
            $domains->where('name', 'LIKE', $query);
        }

        $ret['domains'] = $domains->paginate(6);

        return view('asset.domains.index', $ret);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset.domains.create');
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
        $data['created_by'] = Auth::id();
        AssetDomain::create($data);
        
        $messages = trans('messages.success.create',['title'=>trans('app.domain')]);
        return redirect()->route('asset.domains.index')->with('alert-success', $messages);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssetDomain  $domain
     * @return \Illuminate\Http\Response
     */
    public function show(AssetDomain $domain)
    {
        $ret['domain'] = $domain;
        return view('asset.domains.show', $ret);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssetDomain  $domain
     * @return \Illuminate\Http\Response
     */
    public function edit(AssetDomain $domain)
    {
        $ret['domain'] = $domain;
        return view('asset.domains.edit', $ret);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssetDomain  $domain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssetDomain $domain)
    {
        $data = $request->except('_token','_method');
        $data['updated_by'] = Auth::id();
        $domain->update($data);
        
        $messages = trans('messages.success.update',['title'=>trans('app.domain')]);
        return redirect()->route('asset.domains.index')->with('alert-success', $messages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssetDomain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssetDomain $domain)
    {
        $domain = tap($domain)->update(['deleted_by'=>Auth::id()]);
        $domain->delete();
        $messages = trans('messages.success.delete',['title'=>trans('app.domain')]);
        return redirect()->route('asset.domains.index')->with('alert-success', $messages);
    }
}