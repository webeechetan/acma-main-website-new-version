<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Gallery::categories();
        return view('admin.galleries.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'date' => 'required|date',
        ]);

        $gallery = new Gallery();
        $gallery->title = $request->title;
        $gallery->category_id = $request->category_id;
        $gallery->date = $request->date;

        try{
            $gallery->save();
            // save attachment
            if($request->hasFile('attachments')){
                foreach($request->file('attachments') as $file){
                    $path = $file->store('galleries');
                    $attachment = new Attachment();
                    $attachment->name = $file->getClientOriginalName();
                    $attachment->path = $path;
                    $attachment->attachable_id = $gallery->id;
                    $attachment->attachable_type = 'App\Models\Gallery';
                    $attachment->save();
                }
            }

            $this->alert('Gallery Created Successfully');
            return redirect()->route('galleries.index');
        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        $categories = Gallery::categories();
        return view('admin.galleries.edit', compact('gallery', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'date' => 'required|date',
        ]);

        $gallery->title = $request->title;
        $gallery->category_id = $request->category_id;
        $gallery->date = $request->date;

        try{
            $gallery->save();
            // save attachment
            if($request->hasFile('attachments')){
                foreach($request->file('attachments') as $file){
                    $path = $file->store('galleries');
                    $attachment = new Attachment();
                    $attachment->name = $file->getClientOriginalName();
                    $attachment->path = $path;
                    $attachment->attachable_id = $gallery->id;
                    $attachment->attachable_type = 'App\Models\Gallery';
                    $attachment->save();
                }
            }

            $this->alert('Gallery Updated Successfully');
            return redirect()->route('galleries.index');
        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        try{
            foreach($gallery->attachments as $attachment){
                Storage::delete($attachment->path);
                $attachment->delete();
            }            
            $gallery->delete();
            $this->alert('Gallery Deleted Successfully');
            return redirect()->route('galleries.index');
        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }
    }

    public function changeStatus(Request $request)
    {
        $gallery = Gallery::find($request->id);
        $gallery->status = $request->status;
        $gallery->save();
        return response()->json(['status' => 1, 'message' => 'Status Changed Successfully']);
    }

    public function deleteAttachment(Attachment $attachment)
    {
        try{
            Storage::delete($attachment->path);
            $attachment->delete();
            $this->alert('Attachment deleted successfully');
            return redirect()->back();
        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }
    }
}
