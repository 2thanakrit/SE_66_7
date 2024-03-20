<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acknowledge;

class AcknowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Acknowledge = Acknowledge::where('status', '=', 'อนุมัติ')->get();

        return view('acknowledge.index', compact('Acknowledge'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Acknowledge::index($request->all());

        return redirect()->route('acknowledge.index')->with('success', 'Leave has acknowledged');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Acknowledge = Acknowledge::findOrFail($id);

        return view('acknowledge.show', compact('Acknowledge'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function acknowledge($id)
    {
        $Acknowledge = Acknowledge::find($id);
        $Acknowledge->acknowledge='รับทราบ';
        $Acknowledge->save();

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $Acknowledge = Acknowledge::where('u_approver', 'like', '%' . $search . '%')->where('status','=','อนุมัติ')
            ->orWhere('firstDate', 'like', '%' . $search . '%')->where('status','=','อนุมัติ')
            ->orWhere('endDate', 'like', '%' . $search . '%')->where('status','=','อนุมัติ')
            ->orWhere('detail', 'like', '%' . $search . '%')->where('status','=','อนุมัติ')
            ->orWhereHas('user', function ($query) use ($search) {
                $query->where('firstname', 'like', '%' . $search . '%')->where('status','=','อนุมัติ')
                    ->orWhere('lastname', 'like', '%' . $search . '%')->where('status','=','อนุมัติ');
            })
            ->orWhereHas('typeLeave', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')->where('status','=','อนุมัติ');
            })->get();
        return view('acknowledge.index', compact('Acknowledge'));
    }

    function download($id)
    {
        $id = Acknowledge::find($id)->first;
        return response()->download(public_path('$id->file'));
    }
}
