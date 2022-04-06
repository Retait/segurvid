<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Kin;
use App\Models\ViewOrder;
use App\Models\ViewContract;
use PDF;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vior = ViewOrder::all();

        return view('cases.list', compact('vior'));
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
        //
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
        //
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
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $kin = Kin::all();
        $vior = ViewContract::where('odid',$id)->get();
        $viro = ViewContract::where('odid',$id)->first();
        $name_contract = $viro->code_order.'_'.now()->format('Y-m-d').'.pdf';

        $dia = array("DOMINGO","LUNES","MARTES","MIERCOLES","JUEVES","VIERNES","SÁBADO");
        $mes = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
        
        $d_order = $dia[date('w',strtotime($viro->date_order))]." ".date('d',strtotime($viro->date_order))." DE ".$mes[date('n',strtotime($viro->date_order))-1]. " DE ".date('Y',strtotime($viro->date_order));
        $d_accident = $dia[date('w',strtotime($viro->date_accident))]." ".date('d',strtotime($viro->date_accident))." DE ".$mes[date('n',strtotime($viro->date_accident))-1]. " DE ".date('Y',strtotime($viro->date_accident));

        if($viro->code_partner){
            $pdf = \PDF::loadView('cases.contract-partner', compact('vior','d_order','d_accident','kin'));
        }else{
            $pdf = \PDF::loadView('cases.contract-customer', compact('vior','d_order','d_accident'));
        }
        
        return $pdf->download($name_contract);
    }
    
}
