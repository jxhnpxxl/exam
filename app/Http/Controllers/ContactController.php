<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ContactController extends Component
{
    public function index(): View
    {
        $contacts = Contact::where('user_id',  Auth::user()->id)->paginate(5);

        return view('user_contacts.dashboard', compact('contacts'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    
    public function create(): View
    {
        return view('user_contacts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_no' => 'required|int',
        ]);
        Contact::create(['first_name' => $request->first_name, 'last_name' => $request->last_name, 'contact_no' => $request->contact_no, 'user_id' => Auth::user()->id]);

        return redirect()->route('contacts.index')->with('success','Created a new contact successfully.');
    }

    public function edit($id): View
    {
        $contact = Contact::where('contact_id', $id)->first();

        return view('user_contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact): RedirectResponse
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_no' => 'required|int',
        ]);

        $contact->update(['contact_id' => $request->id, 'first_name' => $request->first_name, 'last_name' => $request->last_name, 'contact_no' => $request->contact_no]);
    
        return redirect()->route('contacts.index')->with('success','Updated contact successfully');
    }

    
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();
    
        return redirect()->route('contacts.index')->with('success','Deleted a contact successfully');
    }
}
