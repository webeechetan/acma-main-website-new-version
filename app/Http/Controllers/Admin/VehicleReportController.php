<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VehicleReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehicleReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicleReports = VehicleReport::all();
        return view('admin.vehicle-reports.index', compact('vehicleReports')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = VehicleReport::categories();
        return view('admin.vehicle-reports.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
        ]);

        $vehicleReport = new VehicleReport();
        $vehicleReport->category_id = $request->category_id;
        $vehicleReport->table_title = $request->table_title;
        $vehicleReport->graph_title = $request->graph_title;
        $vehicleReport->year = $request->year;
        if($request->hasFile('table')) {
            $table = $request->file('table')->store('vehicle-reports');
            $vehicleReport->table = $table;
        }
        if($request->hasFile('graph')) {
            $graph = $request->file('graph')->store('vehicle-reports');
            $vehicleReport->graph = $graph;
        }

        $vehicleReport->save();
        $this->alert('Vehicle Report created successfully');
        return redirect()->route('vehicle-reports.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(VehicleReport $vehicleReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VehicleReport $vehicleReport)
    {
        $categories = VehicleReport::categories();
        return view('admin.vehicle-reports.edit', compact('vehicleReport', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VehicleReport $vehicleReport)
    {
        $request->validate([
            'category_id' => 'required',
        ]);

        $vehicleReport->category_id = $request->category_id;
        $vehicleReport->table_title = $request->table_title;
        $vehicleReport->graph_title = $request->graph_title;
        $vehicleReport->year = $request->year;
        if($request->hasFile('table')) {
            Storage::delete($vehicleReport->table);
            $table = $request->file('table')->store('vehicle-reports');
            $vehicleReport->table = $table;
        }
        if($request->hasFile('graph')) {
            Storage::delete($vehicleReport->graph);
            $graph = $request->file('graph')->store('vehicle-reports');
            $vehicleReport->graph = $graph;
        }

        $vehicleReport->save();
        $this->alert('Vehicle Report updated successfully');
        return redirect()->route('vehicle-reports.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleReport $vehicleReport)
    {
        Storage::delete($vehicleReport->table);
        Storage::delete($vehicleReport->graph);
        $vehicleReport->delete();
        $this->alert('Vehicle Report deleted successfully');
        return redirect()->route('vehicle-reports.index');
    }
}
