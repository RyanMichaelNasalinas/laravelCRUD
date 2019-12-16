<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Requests\ContactValidation;

class ContactController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(Contact $contact) {
        $contacts = $contact->get();
        return view('contact.index',compact('contacts'));
    }

    public function create() {
        return view('contact.create');
    }
    
    public function store(ContactValidation $request) {
        Contact::create([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone')
        ]);
        return redirect('/contacts');
    }

    public function edit($id) {
        $contact = Contact::findOrFail($id);
        return view('contact.edit',compact('contact'));
    }

    public function update(ContactValidation $request, $id) {
        $contact = Contact::where('id',$id)->update([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
        ]);
        return redirect()->to('/contacts');
    }

    public function destroy($id) {
        $contact = Contact::where('id',$id)->delete();
        return redirect('/contacts');
    }
}
