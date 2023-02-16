<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Industry;
use App\Models\Job;
use App\Models\ViewInvoice;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// use Dbfx\LaravelStrapi\LaravelStrapi;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $strapi = new LaravelStrapi();

        $customer = Customer::count();
        $order = Order::count();
        $sale = Invoice::count();
        $invoice = ViewInvoice::where('usid',Auth::user()->id)->sum('total_invoice');
        $country = Country::all();
        $currency = Currency::all();
        $industry = Industry::all();
        $job = Job::all();

        return view('profile.index',compact('customer','order','invoice','country','currency','industry','job'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('id',Auth::user()->id)->first();

        $user->zipcode_user = $request->zipcode;
        $user->address_user = strtoupper($request->address);
        $user->phone_user = $request->phone;
        $user->save();

        return redirect('admin/profile')->with('update','done');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function company(Request $request)
    {
        $user = User::where('id',Auth::user()->id)->first();

        $user->city_company = strtoupper($request->city);
        $user->zipcode_company = $request->zipcode;
        $user->address_company = strtoupper($request->address);
        $user->phone_company = $request->phone;
        $user->save();
        return redirect('admin/profile')->with('update','done');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function photo(Request $request)
    {
        $user = User::where('id',Auth::user()->id)->first();

        
        if(is_null($request->file('photo'))){
            $photo_user = '/img/user_default.png';
        }else{
            
            $validated = $request->validate([
                'photo'      => 'image|mimes:png|max:1024'
            ]);

            $public_photo = $request->file('photo')->store('public/avatar');
            $photo_user = Storage::url($public_photo);
        }
        
        
        $user->profile_photo_path = $photo_user;
        $user->save();
        return redirect('admin/profile')->with('update','done');
    }
}
