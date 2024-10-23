<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AutoComponent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AutoComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.auto-components.index', [
            'autoComponents' => AutoComponent::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.auto-components.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required',
        ]);

        $image = $request->file('image')->store('auto-components');
        $autoComponent = new AutoComponent();
        $autoComponent->image = $image;
        $autoComponent->link = $request->link;
        $autoComponent->save();
        $this->alert('Auto Component created successfully');
        return redirect()->route('auto-components.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(AutoComponent $autoComponent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AutoComponent $autoComponent)
    {
        return view('admin.auto-components.edit', compact('autoComponent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AutoComponent $autoComponent)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($autoComponent->image);
            $image = $request->file('image')->store('auto-components');
            $autoComponent->image = $image;
        }
        $autoComponent->link = $request->link;
        $autoComponent->save();
        $this->alert('Auto Component updated successfully');
        return redirect()->route('auto-components.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AutoComponent $autoComponent)
    {
        Storage::delete($autoComponent->image);
        $autoComponent->delete();
        $this->alert('Auto Component deleted successfully');
        return redirect()->route('auto-components.index');
    }
}
