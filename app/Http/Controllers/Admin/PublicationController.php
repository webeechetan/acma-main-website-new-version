<?php

namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = Publication::all();
        return view('admin.publications.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Publication::categories();
        return view('admin.publications.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'attachment' => 'required|mimes:pdf',
        ]);

        $publication = new Publication();
        $publication->title = $request->title;
        $publication->category_id = $request->category_id;
        $publication->file = $request->file('attachment')->store('publications');
        $thumbnail = $request->file('thumbnail')->store('publications');
        $publication->thumbnail = $thumbnail;
        $publication->description = $request->description;
        $publication->save();
        $this->alert('Publication created successfully');
        return redirect()->route('publications.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        $categories = Publication::categories();
        return view('admin.publications.edit', compact('publication', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publication $publication)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'attachment' => 'mimes:pdf',
        ]);

        $publication->title = $request->title;
        $publication->category_id = $request->category_id;
        if ($request->hasFile('attachment')) {
            // delete old file
            Storage::delete($publication->file);
            $publication->file = $request->file('attachment')->store('publications');
        }
        if ($request->hasFile('thumbnail')) {
            // delete old file
            Storage::delete($publication->thumbnail);
            $thumbnail = $request->file('thumbnail')->store('publications');
            $publication->thumbnail = $thumbnail;
        }
        $publication->description = $request->description;
        $publication->save();
        $this->alert('Publication updated successfully');
        return redirect()->route('publications.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        Storage::delete($publication->file);
        Storage::delete($publication->thumbnail);
        $publication->delete();
        $this->alert('Publication deleted successfully');
        return redirect()->route('publications.index');
    }
}
