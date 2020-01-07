<?php

namespace App\Http\Controllers\Backend\Log;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Access\User\User;
use Auth;
use Spatie\Activitylog\Models\Activity;
use DB;
class LogController extends Controller
{
    public function getLogs()
    {
    	// $matchThese = ['user_types_id' => '3', 'clinic_id' => Auth::user()->clinic_id];
       $activity =Activity::with('causer')->get();
       // dd($activity);
       // dd($activity->subject);
        // dd($activity->causer);
    $start_date = (!empty($_GET["start_date"])) ? ($_GET["start_date"]) : ('');
        $end_date = (!empty($_GET["end_date"])) ? ($_GET["end_date"]) : ('');
 
        if(!empty($start_date) || !empty($end_date)){
 
         $start_date = date('Y-m-d', strtotime($start_date));
         $end_date = date('Y-m-d', strtotime($end_date));

         $activity =DB::table('activity_log')->select('*')->whereBetween('created_at',[$start_date,$end_date])->get();
     }
        return  DataTables::of($activity)

            ->addColumn('Action Performed', function ($activity) {
               return $activity->description;
            })
            ->addColumn('causer_id', function ($activity) {
               return $activity->causer_id;
            })
            ->addColumn('user_name', function ($activity) {
                return "a";
            })
            ->addColumn('action on ', function ($activity) {
               return $activity->subject_type;
            })
            ->addColumn('date', function ($activity) {
               return $activity->created_at;
            })
            ->make(true);
            // dd($data);
}
public function viewLog()
{
	return view('Backend.Logs.logsView');
}
}
