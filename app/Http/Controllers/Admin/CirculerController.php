<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Circuler;
use Illuminate\Http\Request;
use App\Models\CirculerCategory;

class CirculerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $circulers = Circuler::all();
        return view('admin.circulers.index', compact('circulers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CirculerCategory::all();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Circuler $circuler)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Circuler $circuler)
    {
        try{
            $circuler->delete();
            $this->alert('Circuler deleted successfully');
            return redirect()->route('circulers.index');
        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }
    }
}
