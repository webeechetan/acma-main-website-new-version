<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PressCoverage;
use App\Models\Attachment; 
use Illuminate\Http\Request;


class PressCoverageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presscoverages = PressCoverage::paginate(10);
        return view('admin.presscoverages.index', compact('presscoverages'));
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

        $presscoverage = new PressCoverage();

        $presscoverage->title = $request->title;
        $presscoverage->description = $request->description;
        $presscoverage->upload_date	 = $request->upload_date;
        $presscoverage->link = $request->pc_link;

        try{
            $presscoverage->save();
            if($request->hasFile('presscoverage_attachment')){
                $file = $request->file('presscoverage_attachment');
                $path = $file->store('presscoverage');

                $attachment = new Attachment();

                $attachment->name = $file->getClientOriginalName();
                $attachment->path = $path;
                $attachment->attachable_id = $presscoverage->id;
                $attachment->attachable_type = 'App\Models\PressCoverage';
                $attachment->save();
            }

            $this->alert('Press Coveraged creaed successfully');
            return redirect()->route('presscoverages.index');
            
        }catch(\Exception $e){
            $this->alert($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(PressCoverage $pressCoverage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PressCoverage $pressCoverage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PressCoverage $pressCoverage)
    {

        dd($pressCoverage);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'upload_date' => 'required',
        ]);

        $pressCoverage->title = $request->title;
        $pressCoverage->description = $request->description; 
        $pressCoverage->upload_date = $request->upload_date;
        $pressCoverage->link = $request->link;

        try{
            $pressCoverage->save(); 
            
            if($request->hasFile('presscoverage_attachment')){
                $file = $request->file('presscoverage_attachment');
                $path = $file->store('presscoverage');

                $attachment = new Attachment();

                $attachment->name = $file->getClientOriginalName();
                $attachment->path = $path;
                $attachment->attachable_id = $presscoverage->id;
                $attachment->attachable_type = 'App\Models\PressCoverage';
                $attachment->save();
            }

            $this->alert('PressCoverage updated successfully');
            return redirect()->route('presscoverages.index');
        }catch(\Exception $e){

            $this->alert($e->getMessage());
            return redirect()->back();

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PressCoverage $pressCoverage)
    {
       
        try{
            $pressCoverage->delete();
            $this->alert('PressCoverage deleted successfully');
            return redirect()->route('presscoverages.index');
        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }
    }
}
