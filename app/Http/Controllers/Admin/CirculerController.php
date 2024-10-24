<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Circuler;
use Illuminate\Http\Request;
use App\Models\CirculerCategory;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;
use App\DataTables\CirculersDataTable; 

class CirculerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CirculersDataTable $dataTable)
    {
        return $dataTable->render('admin.circulers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Circuler::categories();
        return view('admin.circulers.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'circuler_no' => 'required',
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'circuler_date' => 'required|date',
        ]);

        $circuler = new Circuler();
        $circuler->circuler_no = $request->circuler_no;
        $circuler->title = $request->title;
        $circuler->description = $request->description;
        $circuler->category_id = $request->category_id;
        $circuler->keywords = $request->key_words;
        $circuler->circuler_date = $request->circuler_date;

        try{
            $circuler->save();
            // save attachment
            if($request->hasFile('attachments')){
                foreach($request->file('attachments') as $file){
                    $path = $file->store('circulers');
                    $attachment = new Attachment();
                    $attachment->name = $file->getClientOriginalName();
                    $attachment->path = $path;
                    $attachment->attachable_id = $circuler->id;
                    $attachment->attachable_type = 'App\Models\Circuler';
                    $attachment->save();
                }
            }

            $this->alert('Circuler saved successfully');
            return redirect()->route('circulers.index');
        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Circuler $circuler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Circuler $circuler)
    {
        $categories = Circuler::categories();
        return view('admin.circulers.edit', compact('circuler', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Circuler $circuler)
    {
        $request->validate([
            'circuler_no' => 'required',
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'circuler_date' => 'required|date',
        ]);

        $circuler->circuler_no = $request->circuler_no;
        $circuler->title = $request->title;
        $circuler->description = $request->description;
        $circuler->category_id = $request->category_id;
        $circuler->keywords = $request->key_words;
        $circuler->circuler_date = $request->circuler_date;

        try{
            $circuler->save();
            // save attachment
            if($request->hasFile('attachments')){
                foreach($request->file('attachments') as $file){
                    $path = $file->store('circulers');
                    $attachment = new Attachment();
                    $attachment->name = $file->getClientOriginalName();
                    $attachment->path = $path;
                    $attachment->attachable_id = $circuler->id;
                    $attachment->attachable_type = 'App\Models\Circuler';
                    $attachment->save();
                }
            }

            $this->alert('Circuler updated successfully');
            return redirect()->route('circulers.index');
        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Circuler $circuler)
    {

        try{
            foreach($circuler->attachments as $attachment){
                Storage::delete($attachment->path);
                $attachment->delete();
            }
            $circuler->delete();
            $this->alert('Circuler deleted successfully');
            return redirect()->route('circulers.index');
        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }
    }

    public function deleteAttachment(Circuler $circuler, Attachment $attachment)
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
