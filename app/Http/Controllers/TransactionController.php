<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function index()
    {

        $all_trasnactions = Transaction::latest()
            ->paginate('500');

            $sum_debit = Transaction::latest()
            ->sum('debit');

        $sum_credit = Transaction::latest()
            ->sum('credit');

        return view('transaction', compact('all_trasnactions' , 'sum_debit', 'sum_credit'));
    }

    public function transaction_search(request $request)
    {

        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $all_trasnactions = Transaction::latest()
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->paginate('100');

        $sum_debit = Transaction::latest()
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->sum('debit');

        $sum_credit = Transaction::latest()
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->sum('credit');

        return view('transaction', compact('all_trasnactions', 'sum_debit', 'sum_credit'));

    }

}
