<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Employee::all();
        return view('pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $pegawai = new Employee();
        $pegawai->name = $request->input('name');
        $pegawai->email = $request->input('email');
        $pegawai->phone = $request->input('phone');
        $pegawai->save();
        return redirect()->route('pegawai.index');
    }

    public function show($id)
    {
        $pegawai = pegawai::find($id);
        return view('pegawai.show', compact('pegawai'));
    }

    public function edit($id)
    {
        $pegawai = Employee::find($id);
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        $pegawai = Employee::find($id);
        $pegawai->name = $request->input('name');
        $pegawai->email = $request->input('email');
        $pegawai->phone = $request->input('phone');
        $pegawai->save();
        return redirect()->route('pegawai.index');
    }

    public function destroy($id)
    {
        $pegawai = Employee::find($id);
        $pegawai->delete();
        return redirect()->route('pegawai.index');
    }
}