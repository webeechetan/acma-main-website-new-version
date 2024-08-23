<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alldoc;
use Illuminate\Http\Request;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

class AlldocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alldocs = Alldoc::paginate(10);
        return view('admin.alldocs.index', compact('alldocs'));
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
        ]);
      
        $alldoc = new Alldoc();
        $alldoc->title = $request->title;       
              
        try{
            $alldoc->save();
            //saving attachment
            if($request->hasFile('doc_attachment')){


                $file = $request->file('doc_attachment');
                $path = $file->store('alldocs');

                $attachment = new Attachment();
                $attachment->name = $file->getClientOriginalName();
                $attachment->path = $path;
                $attachment->attachable_id = $alldoc->id;
                $attachment->attachable_type = 'App\Models\Alldoc';
                $attachment->save();
            }
           
            $this->alert('Doc created successfully');
            return redirect()->route('alldocs.index');
        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Alldoc $alldoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alldoc $alldoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alldoc $alldoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alldoc $alldoc)
    {
    
        try{
            $alldoc->delete();
            $this->alert('Doc deleted successfully');
            return redirect()->route('alldocs.index');
        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }
    }
}
