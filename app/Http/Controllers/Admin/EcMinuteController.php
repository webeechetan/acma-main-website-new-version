<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EcMinute;
use App\Models\Attachment;
use Illuminate\Http\Request;

class EcMinuteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ecminutes = EcMinute::paginate(10);
        return view('admin.ecminutes.index', compact('ecminutes'));
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

        $request->validate([
            'title' => 'required',
            'upload_date' => 'required',
        ]);

        $ecminute = new EcMinute();
        $ecminute->title = $request->title;
        $ecminute->upload_date = $request->upload_date;
       
        try{
            $ecminute->save();
            if($request->hasFile('ec_attachment')){
                $file = $request->file('ec_attachment');
                $path = $file->store('ecminutes');

                $attachment = new Attachment();
                $attachment->name = $file->getClientOriginalName();
                $attachment->path = $path;
                $attachment->attachable_id = $ecminute->id;
                $attachment->attachable_type = 'App\Models\EcMinute';
                $attachment->save();

            }
            $this->alert('Ecminutes created successfully');
            return redirect()->route('ecminutes.index');
        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }

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
        try{
            $ecMinute->delete();
            $this->alert('Ecminute deleted successfully');
            return redirect()->route('ecminutes.index');
        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }
    }
}
