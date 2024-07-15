<?php

namespace App\Http\Controllers;

use App\DataTables\ContactDataTable;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $sectionSetting = Contact::first();
        return view('admin.contact.index', compact('sectionSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'address' => ['required', 'max:200'],
            'email' => ['required', 'max:200'],
            'phone' => ['required', 'max:5000'],
            'maps' => ['required', 'max:5000'],
        ]);


        Contact::updateOrCreate(
            ['id' => $id],
            [
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'maps' => $request->maps,
            ]
        );
        toastr()->success('Contact Updated Succesfully', 'Congrats');
        return redirect()->back();
    }
}
