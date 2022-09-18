<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\View\View;
use Response;
use Redirect;

class HomeController extends Controller
{
    /**
    * Display the specified resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(): View
    {
            $users = User::latest()->paginate(5);

        return view('home', compact('users'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    
    public function detail(int $id): View
    {
        $contacts = Contact::where('user_id', $id)->paginate(5);
        $name = User::where('id', $id)->value('name');

        return view('contact_details', compact('contacts', 'name'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
}