<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Auth;
use Hash;
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

        return view('transaction', compact('all_trasnactions', 'sum_debit', 'sum_credit'));
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

    public function create_new_trx()
    {

        $ref_trans_id = "ENK-" . random_int(000000, 9999999);

        $users = User::all();

        return view('create-new-trx', compact('users', 'ref_trans_id'));

    }

    public function update_trx(request $request)
    {

        $chk_trx = Transaction::where('ref_trans_id', $request->ref_trans_id)->first()->ref_trans_id ?? null;

        if ($chk_trx == $request->ref_trans_id) {
            return back()->with('error', 'Duplicate Transaction');
        }

        $user = User::find(Auth::id());
        if (Hash::check($request->pin, $user->pin)) {

            if ($request->transaction_type == 'FundTransfer') {

                $wallet = User::where('id', $request->user_id)
                    ->first()->main_wallet;

                $updated_debit = $request->debit - $wallet;

                $amount = $request->debit - 25;

                $update_user = User::where('id', $request->user_id)
                    ->update(['main_wallet' => $updated_debit]);

                $trasnaction = new Transaction();
                $trasnaction->user_id = $request->user_id;
                $trasnaction->ref_trans_id = $request->ref_trans_id;
                $trasnaction->e_ref = $request->e_ref;
                $trasnaction->transaction_type = $request->transaction_type;
                $trasnaction->debit = $request->debit;
                $trasnaction->e_charges = 15;
                $trasnaction->title = $request->title;
                $trasnaction->note = $request->note;
                $trasnaction->fee = 10;
                $trasnaction->amount = $amount;
                $trasnaction->enkPay_Cashout_profit = 15;
                $trasnaction->balance = $updated_debit;
                $trasnaction->serial_no = $request->serial_no;
                $trasnaction->status = 1;
                $trasnaction->save();

                return back()->with('message', 'Transaction Updated Successfully');

            }

            if ($request->transaction_type == 'CashOut') {

                $wallet = User::where('id', $request->user_id)
                    ->first()->main_wallet;

                $updated_credit = $wallet + $request->credit;

                $update_user = User::where('id', $request->user_id)
                    ->update(['main_wallet' => $updated_credit]);

                $trasnaction = new Transaction();
                $trasnaction->user_id = $request->user_id;
                $trasnaction->ref_trans_id = $request->ref_trans_id;
                $trasnaction->e_ref = $request->e_ref;
                $trasnaction->transaction_type = $request->transaction_type;
                $trasnaction->credit = $request->credit;
                $trasnaction->e_charges = $request->enkPay_Cashout_profit;
                $trasnaction->title = $request->title;
                $trasnaction->note = $request->note;
                $trasnaction->fee = $request->fee;
                $trasnaction->amount = $request->amount;
                $trasnaction->enkPay_Cashout_profit = $request->enkPay_Cashout_profit;
                $trasnaction->balance = $updated_credit;
                $trasnaction->serial_no = $request->serial_no;
                $trasnaction->status = 1;
                $trasnaction->save();

                return back()->with('message', 'Transaction Updated Successfully');

            }
        }

        return redirect('create-new-trx')->with('message', 'Incorrect Pin');

    }

   

}
