<?php

namespace App\Http\Controllers;

use App\Models\Atten;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function showAllatten(Request $request)
{
    // รับค่า keyword จาก input
    $keyword = $request->input('keyword');

    $query = Atten::with('user');

    if (!empty($keyword)) {
        $query->whereHas('user', function ($query) use ($keyword) {
            $query->where('firstname', 'LIKE', "%$keyword%");
        })->orWhere(function ($query) use ($keyword) {
            $query->where('date', 'LIKE', "%$keyword%")
                  ->orWhere('time', 'LIKE', "%$keyword%");
        });
    }

    $all_atten = $query->get();

    // ส่งค่ากลับไปยัง view พร้อมกับตัวแปร all_atten และ keyword
    return view('Attendance', compact('all_atten', 'keyword'));
}
}
