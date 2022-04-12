<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PragmaRX\Google2FA\Google2FA;
use DB;

class SecurityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session = DB::table('sessions')->where('user_id', '=', Auth::user()->id)->take(2)->get();
        
        return view('security.show',compact('session'));
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pwd(Request $request)
    {
        if(password_verify($request->current, Auth::user()->password)){

            $user = Auth::user();
            $user->password = Hash::make($request->pwdnew);
            $user->save();

            return response()->json('ok');

        }else{

            return response()->json('error');

        }
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function g2fa(Request $request)
    {
        if($request){
        
            if(password_verify($request->pg2fa, Auth::user()->password)){
                
                $google2fa = app('pragmarx.google2fa');
                $google2fa_secret = $google2fa->generateSecretKey();
                
                $user = Auth::user();
                $user->two_factor_secret = encrypt($google2fa_secret);
                $user->two_factor_recovery_codes = encrypt($google2fa_secret);
                $user->save();
                
                $QR_Image = $google2fa->getQRCodeInline(
                    config('app.name'),
                    Auth::user()->email,
                    $google2fa_secret
                );

                return view('security.g2fa', ['QR_Image' => $QR_Image, 'secret' => $google2fa_secret]);

            }else{

                return redirect('admin/security')->with('error','done');

            }

        }else{

            return view('security.show');

        }
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function eg2fa()
    {
        $user = Auth::user();
         
         $secret = $request->dato;
         
         $google2fa = app('pragmarx.google2fa');
         $valid = $google2fa->verifyKey(decrypt($user->two_factor_secret), $secret);

        if($valid){
            return response()->json('ok');
        }else{
            return response()->json('error');
        }
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dg2fa(Request $request)
    {
        if(password_verify($request->pg2fa, Auth::user()->password)){

            $user = Auth::user();
            $user->two_factor_secret = "";
            $user->two_factor_recovery_codes = "";
            $user->save();

            return redirect('admin/security')->with('disable','done');

        }else{

            return redirect('admin/security')->with('error','done');

        }
    }
}
