<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class AdminController extends Controller
{
    public function index() {
        $income = Transaction::where('transaction_status', 'SUCCESS')->sum('transaction_total');
        $sale   = Transaction::count();
        $sales  = Transaction::with('detail')->orderBy('id', 'DESC')->take(5)->get();
        // dd($sales);
        $pie    = [
            'success' => Transaction::where('transaction_status', 'SUCCESS')->count(),
            'pending' => Transaction::where('transaction_status', 'PENDING')->count(),
            'failed'  => Transaction::where('transaction_status', 'FAILED')->count()
        ];
        return view('pages.admin', [ 
            'income' => $income,
            'sale'   => $sale,
            'sales'  => $sales,
            'pie'    => $pie
        ]);
    }
}
