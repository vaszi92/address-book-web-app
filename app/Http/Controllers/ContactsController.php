<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category; // ide kell betenni ezeket
use Request;
use Illuminate\Html\HtmlServiceProvider;

class ContactsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = \App\Category::all();
        $contacts   = \App\Contact::all();
        return view('home', compact('contacts', 'categories'));
    }

    public function categorised_index($id)
    {   
        if(!is_numeric($id)){return redirect('/');}
        $categories = Category::all();
        $selected_category = Category::find($id); 

        $contacts = \App\Contact::where('category_id', $id)->get();

        return view('home', compact('contacts', 'selected_category', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = \App\Category::all();
        return view('create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\CreateContactRequest $request)
    {   
        if(is_null($request->category_id)){
            \App\Category::create(['name'=>'Undefined']); 
            $category = \App\Category::where('name','Undefined')->get()->first();
            $data = $request->all();
            \App\Contact::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'category_id' => $category->id,
        ]);
            return redirect('/contacts');
        } else {
        \App\Contact::create($request->all());
        return redirect('/contacts');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $contact = \App\Contact::find($id);
        if (is_null($contact)) {
            return redirect('contacts');
        }
        return view('contact_details', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $categories = \App\Category::all();
        $contact    = \App\Contact::findOrFail($id);
        return view('edit', compact('contact', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Requests\UpdateContactRequest $request)
    {
        $contact = \App\Contact::findOrFail($id);
        $contact->update($request->all());
        return redirect('/contacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $contact = \App\Contact::findOrFail($id);
        $contact->delete();
        return redirect('/contacts');
    }

}
