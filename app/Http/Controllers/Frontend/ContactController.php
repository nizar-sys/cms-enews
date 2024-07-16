<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $projectCategories = ProjectCategory::select('name', 'slug')->get();
        $contact = Contact::first();

        return view('frontends.contact', compact('projectCategories', 'contact'));
    }
}
