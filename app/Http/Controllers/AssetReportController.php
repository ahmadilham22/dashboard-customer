<?php

namespace App\Http\Controllers;

use App\Models\{AssetReport, AssetClient};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;
class AssetReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reports = AssetReport::latest();

        if($request->has('search')){
            $query = '%'.$request->search.'%';
            $reports->where('description', 'LIKE', $query);
        }

        if($request->client_id){
            $reports->where('client_id', $request->client_id);
        }

        $ret['reports'] = $reports->paginate(6);
        $ret['clients'] = AssetClient::orderBy('name')->get();

        return view('asset.reports.index', $ret);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ret['clients'] = AssetClient::orderBy('name')->get();
        return view('asset.reports.create', $ret);
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
            $data['file'] = \Storage::disk(config('app.disk'))->putFileAs('report', $file, $filename);
        }

        $data['created_by'] = Auth::id();
        AssetReport::create($data);
        
        $messages = trans('messages.success.create',['title'=>trans('app.reports')]);
        return redirect()->route('asset.reports.index')->with('alert-success', $messages);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssetReport $report
     * @return \Illuminate\Http\Response
     */
    public function show(AssetReport $report)
    {
        $ret['report'] = $report;
        return view('asset.reports.show', $ret);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssetReport  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(AssetReport $report)
    {
        $ret['report'] = $report;
        $ret['clients'] = AssetClient::orderBy('name')->get();
        return view('asset.reports.edit', $ret);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssetReport  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssetReport $report)
    {
        $data = $request->except('_token','_method');
        
        $data = $request->except('_token');
        if ($request->hasFile('file')) {
            $file = $request->file;
            $original_name = $file->getClientOriginalName();
            $timestamp = now()->timestamp;
            $filename = $timestamp.'_'.$original_name;
            $data['file'] = \Storage::disk(config('app.disk'))->putFileAs('report', $file, $filename);
        }

        $data['updated_by'] = Auth::id();

        $report->update($data);
        
        $messages = trans('messages.success.update',['title'=>trans('app.reports')]);
        return redirect()->route('asset.reports.index')->with('alert-success', $messages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssetReport  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssetReport $report)
    {
        $report = tap($report)->update(['deleted_by'=>Auth::id()]);
        $report->delete();
        $messages = trans('messages.success.delete',['title'=>trans('app.reports')]);
        return redirect()->route('asset.reports.index')->with('alert-success', $messages);
    }
}