<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\OrderDevice;
use Carbon\Carbon;





class CustomerController extends Controller
{


    public function index(request $request){




        $total_users = User::all()
        ->count();



        $customers = User::latest()->paginate('10');


        $business_customers = User::where('type', 3)
        ->count();

        $app_customer = User::where('type', 2)
        ->count();

        $agent_customers = User::where('type', 1)
        ->count();













        return view('customer', compact( 'app_customer', 'customers', 'business_customers', 'agent_customers','total_users'));


    }



}
