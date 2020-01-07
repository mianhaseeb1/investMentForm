<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Access\User\User;
use Auth;
use Spatie\Activitylog\Models\Activity;

class TestController extends Controller
{
    public function test()
    {
    	$activity=Activity::latest()->get();
    } 
}
