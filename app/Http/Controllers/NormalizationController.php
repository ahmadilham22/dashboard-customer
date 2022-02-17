<?php

namespace App\Http\Controllers;

use App\Models\AssetDataCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NormalizationController extends Controller
{
    
    public function index(Request $request, $data)
    {
        switch($data){
            case 'data-collection':
                return $this->dataCollection();
                break;

            default:
                abort(404);
        }
    }

    protected function dataCollection()
    {
        $sources = (new AssetDataCollection)->getListSource();
        foreach($sources as $source){
            $name = ucfirst(str_replace('_',' ',$source));
            AssetDataCollection::firstOrCreate(
                [ 'source' => $source ],
                [ 
                    'name' => $name, 
                    'user_id' => Auth::id(), 
                    'price_per_data' => 10, 
                ]
            );
        }

        return 'sukses';
    }
}