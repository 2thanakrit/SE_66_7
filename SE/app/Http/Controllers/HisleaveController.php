<?php

namespace App\Http\Controllers;

use App\Models\eventdate;
use App\Models\users;
use App\Models\user;
use App\Models\leavebalances;
use App\Models\leaveofabsences;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HisleaveController extends Controller
{
    
    public function showleavetype()
        {
            $leavebalances = leavebalances::with('typeleave')->get();
            $users = user::where('id',auth()->user()->id)->with('subCategory')->get();
            
            return view('leavetype',compact('leavebalances','users'));
        }
    
    public function showleavehis()
        {
            $leaveofabsences = leaveofabsences::with('typeleave1','users','approver')->get();
            $users = users::with('subcategories')->get();
            $eventdate = eventdate::with('eventdate')->get();
            
            return view('leavehis',compact('leaveofabsences','users','eventdate'));
        }

}



    

