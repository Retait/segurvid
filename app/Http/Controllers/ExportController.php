<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Exports\CustomersExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function ecustomer() 
    {
        return Excel::download(new CustomersExport, 'customers.xlsx');
    }
}
