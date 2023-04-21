<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\OrderDevice;
use Carbon\Carbon;





class DashboardController extends Controller
{


    public function index(request $request){

        $total_money_in = Transaction::select('credit')
        ->sum('credit');

        $total_money_out = Transaction::select('debit')
        ->sum('debit');

        $total_users = User::where('type', 2)
        ->where('type', 3)
        ->count();

        $business_customers = User::where('type', 3)
        ->count();

        $app_customer = User::where('type', 2)
        ->count();

        $agent_customers = User::where('type', 1)
        ->count();


        $total_orders = OrderDevice::where('status', 1)
        ->count();

        $pending_orders = OrderDevice::where('status', 0)
        ->count();

        $latest_transactions = Transaction::latest()
        ->paginate('10');

        $total_money_in_today = Transaction::whereDate('created_at', Carbon::today())
        ->sum('credit');

        $total_money_out_today = Transaction::whereDate('created_at', Carbon::today())
        ->sum('debit');


        $total_profit_pos = Transaction::select('enkPay_Cashout_profit')
        ->sum('enkPay_Cashout_profit');

        $total_profit_vas = Transaction::where('main_type', 'errand_vas')
        ->sum('enkPay_Cashout_profit');

        $errand_profit = $total_profit_pos + $total_profit_vas;

        $transfer_profit = Transaction::select('enkPay_Cashout_profit')
        ->where('main_type', 'Transfer')
        ->sum('enkPay_Cashout_profit');



        $user = User::all();






        $pool_total = get_pool();













        return view('admin-dashboard', compact('transfer_profit','total_money_in', 'user', 'errand_profit', 'pool_total','total_profit_pos','total_profit_vas','app_customer', 'business_customers', 'agent_customers','total_money_out','total_money_out_today', 'total_users', 'total_orders', 'pending_orders','total_money_in_today', 'latest_transactions'));


    }



}
