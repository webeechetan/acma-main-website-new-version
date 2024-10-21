<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sliders.index', [
            'sliders' => Slider::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->link = $request->link;
        $slider->type = $request->type;
        $image = $request->file('image')->store('sliders');
        $slider->image = $image;
        $slider->save();
        $this->alert('Slider created successfully');
        return redirect()->route('sliders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slider->title = $request->title;
        $slider->link = $request->link;
        $slider->type = $request->type;
        if($request->hasFile('image')){
            Storage::delete($slider->image);
            $image = $request->file('image')->store('sliders');
            $slider->image = $image;
            // delete old image
        }
        $slider->save();
        $this->alert('Slider updated successfully');
        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        try{
            Storage::delete($slider->image);
            $slider->delete();
            $this->alert('Slider deleted successfully');
            return redirect()->route('sliders.index');
        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }
    }
}
