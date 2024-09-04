<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\VendorDataTable;
use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function index(VendorDataTable $dataTable)
    {
        return $dataTable->render('admin.vendor.index');
    }

    public function create()
    {
        return view('admin.vendor.create');
    }

    public function show(User $vendor)
    {
        $downloadLogs = $vendor->DownloadLogs;
        return view('admin.vendor.show', compact('vendor', 'downloadLogs'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('admin.vendors.index')->with('success', 'Vendor created successfully.');
    }

    public function edit(User $vendor)
    {
        return view('admin.vendor.edit', compact('vendor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('admin.vendors.index')->with('success', 'Vendor updated successfully.');
    }

    public function destroy($id)
    {
        $vendor = User::findOrFail($id);
        $vendor->delete();
    }
}
