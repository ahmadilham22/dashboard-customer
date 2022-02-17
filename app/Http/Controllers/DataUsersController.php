<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class DataUsersController extends Controller
{
    public function index(){

        $users = DB::select(("SELECT `name` FROM `users`"));
        $totaluser = DB::select("SELECT DATE_FORMAT(created_at, '%Y-%m-%d') AS date_activity,
                                    created_at, user_id AS total_user
                                    FROM `log_activity`
                                    GROUP BY date_activity
                                    ORDER BY date_activity");
        
        
        $categories = [];
        $values = [];
        
 
        foreach ($totaluser as $val){
            $categories [] = date( 'd/m/Y', strtotime($val->date_activity),);
            $values [] = $val->total_user;
        }

        $series = [
            'name' => $users
        ];

       dd($values);
       
        

        $categories = json_encode($categories);
        $values = json_encode($values);
        $series = json_encode($series);

        

        return view('chart.usertotal', compact('totaluser','categories','values','series'));
    }
}