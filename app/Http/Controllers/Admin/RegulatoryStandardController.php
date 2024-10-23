<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RegulatoryStandard;
use Illuminate\Http\Request;

class RegulatoryStandardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $regulatory_standards = RegulatoryStandard::paginate(10);
        return view('admin.regulatory-standard.index',compact('regulatory_standards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view('admin.regulatory-standard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'meeting_date' => 'required',
            'subject' => 'required',
        ]);

         $regulatory_standards = new RegulatoryStandard();
         $regulatory_standards->meeting_date = $request->meeting_date;
         $regulatory_standards->meeting_time =$request->meeting_time;
         $regulatory_standards->subject = $request->subject;
         $regulatory_standards->place = $request->place;
         $regulatory_standards->meeting_notice_link = $request->meeting_link;
         $regulatory_standards->meeting_minutes = $request->meeting_minutes;

         try{
            $regulatory_standards->save();
            $this->alert('Data Saved Successfully');
            return redirect()->route('regulatory-standard.index');
         }catch(\Exception $e){

            $this->alert($e->getMessage());
            return redirect()->back();
         }
    }

    /**
     * Display the specified resource.
     */
    public function show(RegulatoryStandard $regulatoryStandard)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegulatoryStandard $regulatoryStandard)
    {
       
        return view('admin.regulatory-standard.edit',compact('regulatoryStandard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegulatoryStandard $regulatoryStandard)
    {

        $request->validate([
            'meeting_date' => 'required',
            'subject' => 'required',
        ]);

        
         $regulatoryStandard->meeting_date = $request->meeting_date;
         $regulatoryStandard->meeting_time =$request->meeting_time;
         $regulatoryStandard->subject = $request->subject;
         $regulatoryStandard->place = $request->place;
         $regulatoryStandard->meeting_notice_link = $request->meeting_link;
         $regulatoryStandard->meeting_minutes = $request->meeting_minutes;

         try{
            $regulatoryStandard->save();
            $this->alert('Data Updated Successfully');
            return redirect()->route('regulatory-standard.index');
         }catch(\Exception $e){

            $this->alert($e->getMessage());
            return redirect()->back();
         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegulatoryStandard $regulatoryStandard)
    {
        try{
            $regulatoryStandard->delete();
            $this->alert('Deleted successfully');
            return redirect()->route('regulatory-standard.index');
        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }
    }
}
