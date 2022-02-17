<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TotalUserController extends Controller
{
     public function index(){
        $totaluser = DB::select("SELECT DATE_FORMAT(created_at, '%Y-%m-%d') AS date_activity,
                                    created_at, COUNT(id) AS total_user
                                    FROM `users`
                                    GROUP BY date_activity");

        $categories = [];
        $values = [];

        foreach ($totaluser as $val){
            $categories [] = date( 'd/m/Y', strtotime($val->date_activity),);
            $values [] = $val->total_user;
        }

        $categories = json_encode($categories);
        $values = json_encode($values);
        
        return view('chart.usertotal', compact('totaluser','categories','values'));
    }
}