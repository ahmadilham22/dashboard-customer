<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{AssetCopyRight, AssetDataCollection, AssetInsight, AssetModel, AssetProduct, AssetSoftware, AssetClient, AssetReport, AssetClippingOnline, AssetDomain};
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = AssetProduct::byUser(Auth::user())->get();
        $dataCollection = AssetDataCollection::byUser(Auth::user())->get();
        $copyRight = AssetCopyRight::byUser(Auth::user())->get();
        $model = AssetModel::byUser(Auth::user())->get();
        $software = AssetSoftware::byUser(Auth::user())->get();
        $insights = AssetInsight::byUser(Auth::user())->get();
        $client = AssetClient::get();
        $report = AssetReport::get();
        $clippingOnline = AssetClippingOnline::get();
        $domain = AssetDomain::get();

        $ret = [
            'product'=>(object)[
                'count' => $product->count(),
                'sum' => $product->sum('value') 
            ],
            'dataCollection'=>(object)[
                'count' => $dataCollection->sum('total_data'),
                'sum' => $dataCollection->sum('value') 
            ],
            'copyRight'=>(object)[
                'count' => $copyRight->count(),
                'sum' => $copyRight->sum('value') 
            ],
            'model' =>(object)[
                'count' => $model->count(),
                'sum' => $model->sum('value') 
            ],
            'software' =>(object)[
                'count' => $software->count(),
                'sum' => $software->sum('value') 
            ],
            'domain' =>(object)[
                'count' => $domain->count(),
                'sum' => $domain->sum('value') 
            ],
            'insights' =>(object)[
                'count' => $insights->count(),
            ],
            'client' =>(object)[
                'count' => $client->count(),
            ],
            'report' =>(object)[
                'count' => $report->count(),
            ],
            'clippingOnline' =>(object)[
                'count' => $clippingOnline->count(),
            ],
        ];
        $valuasi = $ret['product']->sum + $ret['dataCollection']->sum + $ret['copyRight']->sum + $ret['model']->sum + $ret['software']->sum + $ret['domain']->sum;
        $ret['valuasi'] = $valuasi;

        return view('dashboard', $ret);
    }
}
