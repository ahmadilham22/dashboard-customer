<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PHPUnit\Util\Json;

class LogActivityController extends Controller
{
    public function index(){
       $activities = DB::select("SELECT DATE_FORMAT(created_at, '%Y-%m-%d') AS date_activity,
                                 COUNT(DISTINCT user_id) AS total_active_user
                                FROM log_activity
                                GROUP BY date_activity
                                ORDER BY date_activity");

        $categories = [];
        $values = [];
        // dd($activities);
        foreach ($activities as $val){
            $categories [] = date( 'd/m/Y', strtotime($val->date_activity),);
            $values [] = $val->total_active_user;
        }
        $categories = json_encode($categories);
        $values = json_encode($values);
        return view('chart.user', compact('activities','categories','values'));
    }
}