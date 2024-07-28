<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaundryMember;

class LaundryMemberController extends Controller
{
    public function index()
    {
        $laundryMembers = LaundryMember::all();
        return view('laundry-members.index', compact('laundryMembers'));
    }

    public function create()
    {
        $members = Member::all();
        return view('laundry-members.create', compact('members'));
    }

    public function store(Request $request)
    {
        $laundryMember = new LaundryMember();
        $laundryMember->member_id = $request->input('member_id');
        $laundryMember->laundry_type = $request->input('laundry_type');
        $laundryMember->order_date = $request->input('order_date');
        $laundryMember->pickup_date = $request->input('pickup_date');
        $laundryMember->return_date = $request->input('return_date');
        $laundryMember->save();
        return redirect()->route('laundry-members.index');
    }

    public function show($id)
    {
        $laundryMember = LaundryMember::find($id);
        return view('laundry-members.show', compact('laundryMember'));
    }

    public function edit($id)
    {
        $laundryMember = LaundryMember::find($id);
        $members = Member::all();
        return view('laundry-members.edit', compact('laundryMember', 'members'));
    }

    public function update(Request $request, $id)
    {
        $laundryMember = LaundryMember::find($id);
        $laundryMember->member_id = $request->input('member_id');
        $laundryMember->laundry_type = $request->input('laundry_type');
        $laundryMember->order_date = $request->input('order_date');
        $laundryMember->pickup_date = $request->input('pickup_date');
        $laundryMember->return_date = $request->input('return_date');
        $laundryMember->save();
        return redirect()->route('laundry-members.index');
    }

    public function destroy($id)
    {
        $laundryMember = LaundryMember::find($id);
        $laundryMember->delete();
        return redirect()->route('laundry-members.index');
    }
}