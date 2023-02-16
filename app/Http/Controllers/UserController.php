<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Job;
use App\Models\Industry;
use App\Models\Currency;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country = Country::all();
        $industry = Industry::all();
        $job = Job::all();
        $currency = Currency::all();
        $user = User::all();

        return view('auth.list', compact('country','industry','job','currency','user'));
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
        $user = new User();        
        $user->code_user = $request->code_user;
        $user->name = strtoupper($request->name);
        $user->email = $request->email;
        $user->password = Hash::make($request->code_user);
        $user->country_birth = $request->country_birth;
        $user->country_residence = $request-> country_residence;
        $user->job_user = $request->job;
        $user->user_company = $request->company;
        $user->industry_company = $request->industry;
        $user->country_company = $request-> country_residence;
        $user->currency_company = $request->currency;
        $user->tax_company = $request->tax;
        $user->status_user = $request->status_user;
        $user->type_user = $request->type_user;
        $user->save();

        return view('auth.list')->with('create','done');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id',$request->id)->first();

        $user->code_user = $request->code_user;
        $user->name = strtoupper($request->name);
        $user->email = $request->email;
        $user->country_birth = $request->country_birth;
        $user->country_residence = $request-> country_residence;
        $user->job_user = $request->job;
        $user->user_company = $request->company;
        $user->industry_company = $request->industry;
        $user->country_company = $request-> country_residence;
        $user->currency_company = $request->currency;
        $user->tax_company = $request->tax;
        $user->status_user = $request->status_user;
        $user->type_user = $request->type_user;
        $user->save();

        return view('auth.list')->with('update','done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
