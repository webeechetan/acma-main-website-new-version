<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::paginate(10);
        return view('admin.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members',
            'user_id' => 'required|unique:members',
            'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->uncompromised()],
        ]);

        $member = new Member();
        $member->name = $request->name;
        $member->email = $request->email;
        $member->user_id = $request->user_id;
        $member->password = Hash::make($request->password);
        $member->phone = $request->phone;
        $member->address = $request->address;
        $member->region = $request->region;
        $member->company = $request->company;
        $member->trademark = $request->trademark;
        $member->website = $request->website;

        try{
            $member->save();
            $this->alert('Member created successfully');
            return redirect()->route('members.index');
        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }



    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('admin.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members,email,'.$member->id,
            'user_id' => 'required|unique:members,user_id,'.$member->id,
        ]);

        $member->name = $request->name;
        $member->email = $request->email;
        $member->user_id = $request->user_id;
        $member->phone = $request->phone;
        $member->address = $request->address;
        $member->region = $request->region;
        $member->company = $request->company;
        $member->trademark = $request->trademark;
        $member->website = $request->website;

        try{
            $member->save();
            $this->alert('Member updated successfully');
            return redirect()->route('members.index');
        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        try{
            $member->delete();
            $this->alert('Member deleted successfully');
            return redirect()->route('members.index');
        }catch(\Exception $e){
            $this->alert($e->getMessage());
            return redirect()->back();
        }
    }
}
