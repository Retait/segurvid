<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Company;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::all();
        $company = Company::all();

        return view('profile.contact',compact('contact','company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new Contact();

        $validated = $request->validate([
            'name'      => 'required',
            'phone'      => 'required',
            'company'      => 'required'
        ]);

        $company = Company::where('id',$request->company)->first();

        $contact->name_contact = $request->name;
        $contact->job_contact = $request->job;
        $contact->email_contact = $request->email;
        $contact->phone_contact = $request->phone;
        $contact->file_contact = null;
        $contact->company_id = $company->id;
        $contact->save();

        return redirect('admin/contact')->with('create','done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $id)
    {
        $validated = $request->validate([
            'name'      => 'required',
            'phone'      => 'required',
            'company'      => 'required'
        ]);

        $id->name_contact = $request->name;
        $id->job_contact = $request->job;
        $id->email_contact = $request->email;
        $id->phone_contact = $request->phone;
        $id->company_id = $company->id;
        $id->save();

        return redirect('admin/contact')->with('update','done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $id)
    {        
        $id->delete();
        return redirect('admin/contact')->with('delete', 'done');
    }
}
