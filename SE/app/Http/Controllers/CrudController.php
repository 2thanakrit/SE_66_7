<?php

namespace App\Http\Controllers;

use App\Models\Leaveofabsence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\TypeLeave;
use Illuminate\Support\Facades\Auth;

class CrudController extends Controller
{
    //
    public function showAllLeaveofabsences()
    {
        $user = Auth::user();
        
        // ใช้ paginate(7) เพื่อแบ่งหน้าข้อมูล
        $all_leaveofabsences = Leaveofabsence::orderBy('id', 'desc')
            ->where('u_approver', $user->id)
            ->paginate(7); 
    
        return view('all-leaveofabsences', compact('all_leaveofabsences', 'user'));
    }
    
   
    public function editLeave(Request $request){
        $validator = Validator::make($request->all(),[            
            'status' => 'required',
        ]);
        
        if($validator->fails()){
            return response()->json(['msg' => $validator->errors()->toArray()]);
        }else{
            try {
                Leaveofabsence::where('id',$request->Leave_id)->update([                
                    'status' =>$request->status,
                ]); 
                return response()->json(['success' => true, 'msg' =>'Leave Update successfully']);

            } catch (\Exception $e) {
                return response()->json(['success' => false, 'msg' =>$e->getMessage()]);
                
            }            
        }
    }
    function detail($id)
    {
        $detail = leaveOfAbsence::find($id);
        return view('detailLeave', compact('detail'));
    }
   
   
 
}
