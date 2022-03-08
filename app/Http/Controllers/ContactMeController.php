<?php

namespace App\Http\Controllers;

use App\Models\ContactMe;
use Illuminate\Http\Request;

class ContactMeController extends Controller
{
    private $contactMeNodel;
    public function __construct(ContactMe $contactMe)
    {
        $this->contactMeNodel = $contactMe;
    }
    public function index()
    {
        $contacts  = $this->contactMeNodel::get();
        return view('aPanel.ContactMe.contactList', compact('contacts'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
        ]);

        $this->contactMeNodel->create($data);
        session()->flash('done', 'ContactMe Was Added');
        return redirect(route('admin.contacts'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
        ]);
        $updateContact = $this->contactMeNodel::find($id);
        if ($updateContact) {
            $updateContact->update($data);
            session()->flash('done', 'Contact Was Updated');
        }
        else{
            session()->flash('error', 'Contact is not Found');

        }
        return redirect(route('admin.contacts'));
    }

    public function delete($id)
    {
        $deleteContact = $this->fllocontactMeNodelwMeModel::find($id);
        if ($deleteContact) {
            $deleteContact->delete();
            session()->flash('done', 'Contact Was Deleted');
        }
        else{
            session()->flash('error', 'Contact is not Found');

        }
        return redirect(route('admin.contacts'));

    }
}
