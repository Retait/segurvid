<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\Payment;
use App\Models\ViewOrder;
use App\Models\ViewInvoice;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visa = ViewInvoice::all();

        $year = now()->format('Y');
        $month = now()->format('m');

        $gtitle = [];
        $gcontent = [];

        $sale = ViewInvoice::where('month',$month)->where('year',$year)->get();
        $saler = ViewInvoice::where('usid',Auth::user()->id)->where('month',$month)->where('year',$year)->get();

        $countSale = 0;
        $countSaler = 0;
        
        foreach ($sale as $sa) {
            $countSale += $sa->total_invoice;
        }
        foreach ($saler as $sr) {
            $countSaler += $sr->total_invoice;
        }

        for ($i=1; $i <= $month ; $i++) {
            
            switch ($i) {
                case 1:
                    $month_total = ViewInvoice::where('month',1)->where('year',$year)->sum('total_invoice');
                    array_push($gtitle,'Jan');
                    array_push($gcontent,$month_total);
                    break;
                case 2:
                    $month_total = ViewInvoice::where('month',2)->where('year',$year)->sum('total_invoice');
                    array_push($gtitle,'Feb');
                    array_push($gcontent,$month_total);
                    break;
                case 3:
                    $month_total = ViewInvoice::where('month',3)->where('year',$year)->sum('total_invoice');
                    array_push($gtitle,'Mar');
                    array_push($gcontent,$month_total);
                    break;
                case 4:
                    $month_total = ViewInvoice::where('month',4)->where('year',$year)->sum('total_invoice');
                    array_push($gtitle,'Apr');
                    array_push($gcontent,$month_total);
                    break;
                case 5:
                    $month_total = ViewInvoice::where('month',5)->where('year',$year)->sum('total_invoice');
                    array_push($gtitle,'May');
                    array_push($gcontent,$month_total);
                    break;
                case 6:
                    $month_total = ViewInvoice::where('month',6)->where('year',$year)->sum('total_invoice');
                    array_push($gtitle,'Jun');
                    array_push($gcontent,$month_total);
                    break;
                case 7:
                    $month_total = ViewInvoice::where('month',7)->where('year',$year)->sum('total_invoice');
                    array_push($gtitle,'Jul');
                    array_push($gcontent,$month_total);
                    break;
                case 8:
                    $month_total = ViewInvoice::where('month',8)->where('year',$year)->sum('total_invoice');
                    array_push($gtitle,'Aug');
                    array_push($gcontent,$month_total);
                    break;
                case 9:
                    $month_total = ViewInvoice::where('month',9)->where('year',$year)->sum('total_invoice');
                    array_push($gtitle,'Sep');
                    array_push($gcontent,$month_total);
                    break;
                case 10:
                    $month_total = ViewInvoice::where('month',10)->where('year',$year)->sum('total_invoice');
                    array_push($gtitle,'Oct');
                    array_push($gcontent,$month_total);
                    break;
                case 11:
                    $month_total = ViewInvoice::where('month',11)->where('year',$year)->sum('total_invoice');
                    array_push($gtitle,'Nov');
                    array_push($gcontent,$month_total);
                    break;
                case 12:
                    $month_total = ViewInvoice::where('month',12)->where('year',$year)->sum('total_invoice');
                    array_push($gtitle,'Dec');
                    array_push($gcontent,$month_total);
                    break;
            }
        }

        return view('invoices.sale', compact('visa','countSale','countSaler','gtitle','gcontent'));
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
        //$vior = $request->session()->get('vior')->first();
        //$deposit = $request->session()->get('deposit');
        
        $invoice = new Invoice();
        $count = Invoice::count();
        
        // $validated = $request->validate([
        //     'deposit'      => 'required'
        // ]);

        $order = Order::where('id',$request->odid)->first();
        $deposit = $request->deposit;
        
        if ($count >= 0 && $count < 9) {$code = "F-000000".($count+1);}
        if ($count >= 9 && $count < 99) {$code = "F-00000".($count+1);}
        if ($count >= 99 && $count < 999) {$code = "F-0000".($count+1);}
        if ($count >= 999 && $count < 9999) {$code = "F-000".($count+1);}
        if ($count >= 9999 && $count < 99999) {$code = "F-00".($count+1);}
        if ($count >= 99999 && $count < 999999) {$code = "F-0".($count+1);}
        if ($count >= 999999 && $count < 9999999) {$code = "F-".($count+1);}

        $total = $deposit * $order->cost_order / 100;
        
        $order->status_order = 2;//paid
        $order->save();

        $tax_company = Auth::user()->tax_company;
        $subtotal = $total / (1 + $tax_company/100);
        $tax = $total - $subtotal;

        $invoice->code_invoice = $code;
        $invoice->date_invoice = now()->format('Y-m-d');
        $invoice->subtotal_invoice = $subtotal;
        $invoice->discount_invoice = 0;
        $invoice->tax_invoice = $tax;
        $invoice->total_invoice = $total;
        $invoice->deposit_invoice = $deposit;
        $invoice->user_id = Auth::user()->id;
        $invoice->order_id = $order->id;
        $invoice->payment_id = 1;//card
        $invoice->save();
        
        session()->forget('vior');
        session()->forget('deposit');
        
        // return redirect('admin/case/list')->with('payment','done');
        return response()->json('ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sale(Request $request, $id)
    {
        $payment = Payment::all();
        $count = Invoice::count();
        
        $validated = $request->validate([
            'total'      => 'required'
        ]);
        
        if ($count >= 0 && $count < 9) {$code = "F-000000".($count+1);}
        if ($count >= 9 && $count < 99) {$code = "F-00000".($count+1);}
        if ($count >= 99 && $count < 999) {$code = "F-0000".($count+1);}
        if ($count >= 999 && $count < 9999) {$code = "F-000".($count+1);}
        if ($count >= 9999 && $count < 99999) {$code = "F-00".($count+1);}
        if ($count >= 99999 && $count < 999999) {$code = "F-0".($count+1);}
        if ($count >= 999999 && $count < 9999999) {$code = "F-".($count+1);}
        
        $vior = ViewOrder::where('odid',$id)->get();
        $viro = ViewOrder::where('odid',$id)->first();

        $deposit = $request->total;
        $total = $deposit * $viro->cost_order / 100;

        // //$tax = Auth::user()->tax_company;
        $subtotal = $total / (1 + 18/100);
        $tax = $total - $subtotal;

        return view('invoices.show', compact('vior','code','subtotal','tax','total','deposit','payment'));
    }
    public function test(Request $request){
        echo "funca";
    }
}
