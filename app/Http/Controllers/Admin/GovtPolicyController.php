<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GovtPolicy;
use Illuminate\Http\Request;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;


class GovtPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $policies = GovtPolicy::paginate(10);
        return view('admin.govt-policy.index', compact('policies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = GovtPolicy::categories();
        return view('admin.govt-policy.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' =>'required',
            'policy' => 'required',
            'year' => 'required',
            'state' => 'required',
        ]);

        $policy = new GovtPolicy();
        $policy->category_id = $request->category_id;
        $policy->policy = $request->policy;
        $policy->year = $request->year;
        $policy->state = $request->state;

        try{
            $policy->save();

            if($request->hasFile('attachment')){


                $file = $request->file('attachment');
                $path = $file->store('govt-policy');

                $attachment = new Attachment();
                $attachment->name = $file->getClientOriginalName();
                $attachment->path = $path;
                $attachment->attachable_id = $policy->id;
                $attachment->attachable_type = 'App\Models\GovtPolicy';
                $attachment->save();
            }
            $this->alert('Policy saved successfully');
            return redirect()->route('govt-policy.index');

        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(GovtPolicy $govtPolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GovtPolicy $govtPolicy)
    {
        $categories = GovtPolicy::categories();
        return view('admin.govt-policy.edit',compact('categories','govtPolicy'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GovtPolicy $govtPolicy)
    {

      
        $request->validate([
            'category_id' =>'required',
            'policy' => 'required',
            'year' => 'required',
            'state' => 'required',
        ]);

       
        $govtPolicy->category_id = $request->category_id;
        $govtPolicy->policy = $request->policy;
        $govtPolicy->year = $request->year;
        $govtPolicy->state = $request->state;

        try{
            $govtPolicy->save();

            if($request->hasFile('attachment')){


                $file = $request->file('attachment');
                $path = $file->store('govt-policy');

                $attachment = new Attachment();
                $attachment->name = $file->getClientOriginalName();
                $attachment->path = $path;
                $attachment->attachable_id = $govtPolicy->id;
                $attachment->attachable_type = 'App\Models\GovtPolicy';
                $attachment->save();
            }
            $this->alert('Policy Updated successfully');
            return redirect()->route('govt-policy.index');

        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GovtPolicy $govtPolicy)
    {

        try{
            if ($govtPolicy->attachment) {
                Storage::delete($govtPolicy->attachment->path); 
                $govtPolicy->attachment->delete();
            }
            $govtPolicy->delete();
            $this->alert('Policy deleted successfully');
            return redirect()->route('govt-policy.index');
        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }
    }
}
