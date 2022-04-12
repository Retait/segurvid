<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Insurance;
use App\Models\Company;
use App\Models\Service;
use App\Models\Order;
use App\Models\Kin;
use App\Models\TypeAccident;

use Illuminate\Support\Facades\Auth;
use Dbfx\LaravelStrapi\LaravelStrapi;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $strapi = new LaravelStrapi();

        $insurance = Insurance::all();
        $company = Company::all();
        $service = Service::all();
        $kin = Kin::all();
        $tyac = TypeAccident::all();
        $country = $strapi->collection('countries');

        return view('cases.create', compact('country','insurance','company','service','tyac','kin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $customer = new Customer();

        $valid = Customer::where('code_customer',$request->code)->first();

        $validated = $request->validate([
            'code'            => 'required',
            'customer'        => 'required',
            'country'         => 'required',
            'city'            => 'required',
            'address'         => 'required',
            'mobile_customer' => 'required'
        ]);

        if($valid){
            return redirect('admin/customer')->with('exist','done');
        }else{

            $customer->code_customer = $request->code;
            $customer->name_customer = $request->name;
            $customer->country_customer = $request->country;
            $customer->city_customer = $request->city;
            $customer->mobile_customer = $request->mobile;
            $customer->phone_customer = $request->phone;
            $customer->address_customer = $request->address;
            $customer->save();
    
            return redirect('admin/customer')->with('create','done');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer();
        $order = new Order();
        $count = Order::count();        

        $validated = $request->validate([
            'code'            => 'required',
            'customer'        => 'required',
            'country'         => 'required',
            'city'            => 'required',
            'address'         => 'required',
            'mobile_customer' => 'required',
            'date_order'      => 'required',
            'percentage'      => 'required',
            'date_accident'   => 'required',
            'type_accident'   => 'required',
            'location'        => 'required',
            'company'         => 'required',
            'insurance'       => 'required',
            'service'         => 'required'
        ]);

        if ($count >= 0 && $count < 9) {$code = "COD-000000".($count+1);}
        if ($count >= 9 && $count < 99) {$code = "COD-00000".($count+1);}
        if ($count >= 99 && $count < 999) {$code = "COD-0000".($count+1);}
        if ($count >= 999 && $count < 9999) {$code = "COD-000".($count+1);}
        if ($count >= 9999 && $count < 99999) {$code = "COD-00".($count+1);}
        if ($count >= 99999 && $count < 999999) {$code = "COD-0".($count+1);}
        if ($count >= 999999 && $count < 9999999) {$code = "COD-".($count+1);}

        $cuid = Customer::where('code_customer',$request->code)->first();
        $taid = TypeAccident::where('id',$request->type_accident)->first();

        if($cuid){

            $order->code_order = $code;
            $order->date_order = $request->date_order;
            $order->type_payment = 1;
            $order->cost_order = $request->percentage;
            $order->description_order = strtoupper($request->description);
            //$order->description_order = $taid->type_accident;
            $order->date_accident = $request->date_accident;
            $order->time_accident = $request->time_accident;
            $order->location_accident = strtoupper($request->location);
            $order->code_partner = $request->code_partner;
            $order->name_partner = strtoupper($request->partner);
            $order->phone_partner = $request->phone_partner;
            $order->status_order = 1;
            $order->file_order = 'test';
            $order->user_id = Auth::user()->id;
            $order->typeaccident_id = $request->type_accident;
            $order->kin_id = $request->kin;
            $order->company_id = $request->company;
            $order->insurance_id = $request->insurance;
            $order->customer_id = $cuid->id;
            $order->service_id = $request->service;
            $order->save();
    
            return redirect('admin/case')->with('create','done');
        }else{

            $customer->code_customer = $request->code;
            $customer->name_customer = strtoupper($request->customer);
            $customer->country_customer = $request->country;
            $customer->city_customer = strtoupper($request->city);
            $customer->address_customer = strtoupper($request->address);
            $customer->mobile_customer = $request->mobile_customer;
            $customer->phone_customer = $request->phone_customer;
            $customer->email_customer = strtoupper($request->email);
            $customer->photo_customer = null;
            $customer->save();
    
            $n_cuid = Customer::where('code_customer',$request->code)->first();
            $taid = TypeAccident::where('id',$request->type_accident)->first();

            $order->code_order = $code;
            $order->date_order = $request->date_order;
            $order->type_payment = 1;
            $order->cost_order = $request->percentage;
            $order->description_order = strtoupper($request->description);
            //$order->description_order = $taid->type_accident;
            $order->date_accident = $request->date_accident;
            $order->location_accident = strtoupper($request->location);
            $order->code_partner = $request->code_partner;
            $order->name_partner = strtoupper($request->partner);
            $order->phone_partner = $request->phone_partner;
            $order->status_order = 1;
            $order->file_order = 'test';
            $order->user_id = Auth::user()->id;
            $order->typeaccident_id = $request->type_accident;
            $order->kin_id = $request->kin;
            $order->company_id = $request->company;
            $order->insurance_id = $request->insurance;
            $order->customer_id = $n_cuid->id;
            $order->service_id = $request->service;
            $order->save();
    
            return redirect('admin/case')->with('create','done');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $strapi = new LaravelStrapi();
        
        $customer = Customer::all();
        $country = $strapi->collection('countries');

        return view('customers.show', compact('customer','country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $id)
    {

        if( Auth::user()->id == 1){

            $id->code_customer = $request->code;
            $id->name_customer = $request->name;
        }
        $id->address_customer = $request->address;
        $id->country_customer = $request->country;
        $id->city_customer = $request->city;
        $id->mobile_customer = $request->mobile;
        $id->phone_customer = $request->phone;
        $id->save();

        return redirect('admin/customer')->with('edit','done');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function valid(Request $request)
    {
        $customer = Customer::where('code_customer',$request->data)->first();

        return response()->json($customer);
    }
    
}
