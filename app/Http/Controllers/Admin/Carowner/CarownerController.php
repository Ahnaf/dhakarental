<?php

namespace App\Http\Controllers\Admin\Carowner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateContactsRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Models\Contact;

class CarownerController extends Controller
{
    public function carOwnerList()
    {
        $contacts = Contact::orderBy('id', 'DESC')->paginate(10);
        return view('admin.carowner.carowner', compact('contacts'));
    }

    public function carOwnerOverview($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.carowner.overview', compact('contact'));
    }

    public function addCarOwner()
    {
        return view('admin.carowner.addcarowner');
    }

    public function storeContacts(CreateContactsRequest $request)
    {
        $validated = $request->validated();
 
        $data = [
            'fname' => $validated['fname'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'nid' => $validated['nid'],
            'contats_type' => $validated['contact_type']  
        ];

        try {
            if(isset($validated['avatar'])){
                $serverimgname = uniqid('contacts') . '.' . $validated['avatar']->getClientOriginalExtension();
                $validated['avatar']->storeAs('public/contacts/', $serverimgname);
                $data['profile_pic'] = $serverimgname;
            }
            Contact::create($data);
            return redirect(route('admin.carownerlist'))->with('carsuccess', 'Contacts successfully saved!');
        } catch (\Throwable $exception) {
            return redirect(route('admin.addcarowner'))->with('contactwarning', 'Contacts not save, Internal error');
        }
    }

    public function carOwnerProfile($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.carowner.profile', compact('contact'));
    }

    public function carOwnerUpdateStore(ContactUpdateRequest $request)
    {
        $validated = $request->validated();
        $data = [
            'fname' => $validated['fname'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'nid' => $validated['nid'],
            'contats_type' => $validated['contact_type'],
        ];


        try {
            $findContacts = Contact::findOrFail($validated['contact_id']);
            if (isset($validated['avatar'])) {
                
                $serverimgname = uniqid('contacts') . '.' . $validated['avatar']->getClientOriginalExtension();
                $validated['avatar']->storeAs('public/contacts/', $serverimgname);
                $data['profile_pic'] = $serverimgname;

                if (Storage::exists('public/contacts/'. $findContacts->profile_pic)) {
                    Storage::disk('public')->delete('contacts/'. $findContacts->profile_pic);
                }

            }
            Contact::where('id', $findContacts->id)->update($data);
            return redirect(route('admin.carownerlist'))->with('carsuccess', 'Contacts successfully updated!');
        } catch (\Throwable $exception) {
            return redirect(route('admin.carownerprofile', ['id' => $validated['contact_id']]))->with('contactwarning', 'Contacts not update, Internal error');
        }
    }

    public function deleteContact(Request $request)
    {
        $id = $request->contactid;
        $find = Contact::findorFail($id);
        if (Storage::exists('public/contacts/'. $find->profile_pic)) {
            Storage::disk('public')->delete('contacts/'. $find->profile_pic);
        }
        $find->delete();
        return response()->json(['success' => 'Contact successfully deleted!' . $id, 200]);
    }
   
}
