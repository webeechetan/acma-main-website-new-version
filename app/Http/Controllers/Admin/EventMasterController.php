<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventMaster;
use Illuminate\Http\Request;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

class EventMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = EventMaster::paginate(10);
        return view('admin.events.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = EventMaster::categories();
        return view('admin.events.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'event_title' => 'required',
            'event_date' => 'required',
            
        ]);

        $event = new EventMaster();
        $event->category_id = $request->category_id;
        $event->title = $request->event_title;
        $event->event_date = $request->event_date;
        $event->url = $request->url;
        $event->about_us = $request->about_us;
        $event->location = $request->location;
        $event->howto = $request->howto;

        try{
            $event->save();
            // save attachment
            if($request->hasFile('event_attachment')){


                $file = $request->file('event_attachment');
                $path = $file->store('allevents');

                $attachment = new Attachment();
                $attachment->name = $file->getClientOriginalName();
                $attachment->path = $path;
                $attachment->attachable_id = $event->id;
                $attachment->attachable_type = 'App\Models\EventMaster';
                $attachment->save();
            }

            $this->alert('Event saved successfully');
            return redirect()->route('eventmasters.index');
        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(EventMaster $eventMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventMaster $eventMaster)
    {

        dd($eventMaster);
       
        $categories = EventMaster::categories();

        // dd($categories);
        dd($eventMaster);
        return view('admin.events.edit',compact('categories','eventMaster'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventMaster $eventMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventMaster $eventMaster)
    {

       
        try{
            $eventMaster->delete();
            $this->alert('Event deleted successfully');
            return redirect()->route('event_masters.index');
        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }
    }
}
