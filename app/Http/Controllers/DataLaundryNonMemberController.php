<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //

    public function index(): View
    {
        $customers = Customer::latest()->paginate(10);
        return view('levelAdmin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('levelAdmin.customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tgl_transaksi' => 'required',
            'nama_customer' => 'required|string|max:150',
            'alamat' => 'required',
            'no_telp' => 'required|string|max:16',
            'id_pegawai' => 'required',
            'keterangan' => 'required',
            'status_laundry' => 'required',
            'status_pembayaran' => 'required',
            'lokasi' => 'required'
        ]);

        Customer::create($request->all());

        return redirect()->route('admin.Customer.index')
            ->with('success', 'Customer berhasil ditambahkan.');
    }

    public function show(string $id): View
    {
        $customers = Customer::findOrFail($id);

        return view('levelAdmin.customers.show', compact('customers'));
    }
    public function edit(string $id)
    {
        $customers = Customer::findOrFail($id);

        return view('levelAdmin.customers.edit', compact('customers'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nama_customer' => 'required|string|max:150',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $customers = Customer::findOrFail($id);
        $customers->update($request->all());

        return redirect()->route('admin.Customer.index')
            ->with('success', 'Data customer berhasil diubah!.');
    }

    public function destroy($id): RedirectResponse
    {
        $customers = Customer::findOrFail($id);
        $customers->delete();
        return redirect()->route('admin.Customer.index')->with(['success' => 'Data Customer Berhasil Dihapus!']);
    }
}