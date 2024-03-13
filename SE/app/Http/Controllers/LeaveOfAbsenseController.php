<?php

namespace App\Http\Controllers;

use App\Models\leaveOfAbsence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\TypeLeave;
class LeaveOfAbsenseController extends Controller
{
    
    function index(){
        $LeaveOfAbsence = leaveOfAbsence::with('user','typeLeave','approver')->get();
        return view('leaveMain',compact('LeaveOfAbsence'));
    }
    
}
