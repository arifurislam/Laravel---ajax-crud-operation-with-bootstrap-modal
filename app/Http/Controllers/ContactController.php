<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('contact.index');
    }

    public function fetchContact(){
        $contacts = Contact::latest()->get();
        return response()->json($contacts);
    }

    public function show($id){
        $contact = Contact::find($id);
        return response()->json($contact);
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'number' => 'required|string',
        ]);

        $contact = New Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->number = $request->number;
        $contact->save();
        return response()->json(['message' => 'New Record Has Been Stored']);
        
    }

    public function edit($id){
        $contact = Contact::find($id);
        return response()->json($contact);
    }

    public function update(Request $request, $id){

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'number' => 'required|string',
        ]);

        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->number = $request->number;
        $contact->save();
        return response()->json(['message' => 'Record Has Been Updated']);
    }

    public function delete($id){
        $contact = Contact::find($id);
        $contact->delete();
        return response()->json(['message' => 'Recored Has Been Deleted']);
    }
}


