<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PressRelease;
use App\Models\Attachment;
use Illuminate\Http\Request;

class PressReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pressreleases = PressRelease::paginate(10);
        return view('admin.pressreleases.index', compact('pressreleases'));
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

        $pressrelease = new PressRelease();
        $pressrelease->title = $request->title;
        $pressrelease->upload_date = $request->upload_date;

        try{
            $pressrelease->save();
            if($request->hasFile('press_release_attachment')){
                $file = $request->file('press_release_attachment');
                $path = $file->store('pressrelease');

                $attachment = new Attachment();

                $attachment->name = $file->getClientOriginalName();
                $attachment->path = $path;
                $attachment->attachable_id = $pressrelease->id;
                $attachment->attachable_type = 'App\Models\PressRelease';
                $attachment->save();
            }
            $this->alert('Press release created successfully');
            return redirect()->route('pressreleases.index');

        }catch(\Exception $e){
            $this->alert($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PressRelease $pressRelease)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PressRelease $pressRelease)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PressRelease $pressRelease)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PressRelease $pressRelease)
    {

        dd($pressRelease);
        
        try{
            $pressRelease->delete();
            $this->alert('Press release deleted successfully');
            return redirect()->route('pressreleases.index');

        }catch(\Exception $e){

            $this->alert($e->getMessage());
            return redirect()->back();

        }
    }
}
