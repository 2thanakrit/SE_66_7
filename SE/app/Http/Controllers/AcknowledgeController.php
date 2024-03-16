<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acknowledge;

class AcknowledgeController extends Controller
{
    public function index()
    {
        $data=Acknowledge::where('status','=','อนุมัติ')->get();
        return view('Acknowledge.index',compact('data'));
    }

    public function accepted($id)
    {
        $data=Acknowledge::find($id);
        $data->acknowledge='รับทราบ';
        $data->save();
        return redirect()->back();
    }
}
