<?php

namespace App\Http\Controllers;

use App\Models\{AssetDataCollection, HistoryDataCollection};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AssetDataCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataCollections = AssetDataCollection::query();

        if($request->search){
            $params = "%".$request->search."%";
            $dataCollections->where(function ($query) use ($params){
                $query->where('name', 'LIKE', $params)
                    ->orWhere('description', 'LIKE', $params)
                    ->orWhere('source', 'LIKE', $params);
            });
        }

        $dataCollections = $dataCollections->paginate();

        return view('asset.data-collections.index', compact('dataCollections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sources = (new AssetDataCollection)->getListSource();
        $ret = [
            'sources' => $sources
        ];

        return view('asset.data-collections.create', $ret);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataCollection = new AssetDataCollection;
        $dataCollection->user_id = Auth::id();
        $dataCollection->name = $request->name;
        $dataCollection->description = $request->description;
        $dataCollection->source = $request->source;
        $dataCollection->price_per_data = $request->price_per_data;
        $dataCollection->total_data = $request->total_data;
        $dataCollection->value = $request->value;
        $dataCollection->save();

        return redirect()->route('asset.data-collections.index')->with('alert-success', 'Data Collection has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssetDataCollection  $dataCollection
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AssetDataCollection $dataCollection)
    {
        $histories = HistoryDataCollection::where('data_collection_id', $dataCollection->id);

        if($request->search){
            $params = "%".$request->search."%";
            $histories->where('date', 'LIKE', $params);
        }
        $histories = $histories->paginate();

        $ret = [
            'dataCollection' => $dataCollection,
            'histories' => $histories
        ];
        return view('asset.data-collections.show', $ret);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssetDataCollection  $dataCollection
     * @return \Illuminate\Http\Response
     */
    public function edit(AssetDataCollection $dataCollection)
    {
        $sources = (new AssetDataCollection)->getListSource();
        $ret = [
            'sources' => $sources,
            'dataCollection' => $dataCollection
        ];

        return view('asset.data-collections.edit', $ret);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssetDataCollection  $dataCollection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssetDataCollection $dataCollection)
    {
        $dataCollection->name = $request->name;
        $dataCollection->description = $request->description;
        $dataCollection->source = $request->source;
        $dataCollection->price_per_data = $request->price_per_data;
        $dataCollection->total_data = $request->total_data;
        $dataCollection->value = $request->value;
        $dataCollection->save();

        return redirect()->route('asset.data-collections.index')->with('alert-success', 'Data Collection has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssetDataCollection  $dataCollection
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssetDataCollection $dataCollection)
    {
        $dataCollection->delete();

        return redirect()->route('asset.data-collections.index')->with('alert-success', 'Data Collection has been deleted.');
    }

    public function generateData(Request $request)
    {
        $data = (new AssetDataCollection)->generateData($request->date);

        return 'sukses';
    }
}
