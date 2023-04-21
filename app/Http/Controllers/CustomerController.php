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



        $customers = User::orderBy('first_name', 'ASC')->paginate('50');


        $business_customers = User::where('type', 3)
        ->count();

        $app_customer = User::where('type', 2)
        ->count();

        $agent_customers = User::where('type', 1)
        ->count();



        return view('customer', compact( 'app_customer', 'customers', 'business_customers', 'agent_customers','total_users'));


    }


    public function customer_details(request $request){


        $customer_trasnactions = Transaction::latest()->where('user_id', $request->id)
        ->paginate('10');

        $customer = User::where('id', $request->id)
        ->first();


        return view('customer-details', compact( 'customer_trasnactions', 'customer'));





    }



}
