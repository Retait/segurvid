<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\ViewInvoice;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $customer = Customer::count();
        $order = Order::count();
        $sale = Invoice::count();
        $invoice = Invoice::sum('total_invoice');
        $year = now()->format('Y');
        $month = now()->format('m');
        $gtitle = [];
        $gcontent = [];

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

        return view('dashboard', compact('customer','sale','order','invoice','gtitle','gcontent'));
        
    }
}
