<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EcMinute;
use Illuminate\Http\Request;

class EcMinuteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ecminutes = EcMinute::all();
        return view('admin.ecminutes.list', compact('ecminutes'));
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
        $ecminute = new EcMinute();

        $ecminute->title = $request->title;
        $ecminute->attachment	 = $request->ec_attachment;
        $ecminute->upload_date = $request->upload_date;

       

        if($ecminute->save()){

          
            return redirect()->route('admin.list.ecminutes');
        }
       
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(EcMinute $ecMinute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EcMinute $ecMinute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EcMinute $ecMinute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EcMinute $ecMinute)
    {
        //
    }
}
