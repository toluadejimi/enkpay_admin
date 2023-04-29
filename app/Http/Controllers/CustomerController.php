<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerController extends Controller
{

    public function index(request $request)
    {

        $total_users = User::all()
            ->count();

        $customers = User::orderBy('first_name', 'ASC')->paginate('50');

        $business_customers = User::where('type', 3)
            ->count();

        $app_customer = User::where('type', 2)
            ->count();

        $agent_customers = User::where('type', 1)
            ->count();

        return view('customer', compact('app_customer', 'customers', 'business_customers', 'agent_customers', 'total_users'));

    }

    public function customer_details(request $request)
    {

        $customer_trasnactions = Transaction::latest()->where('user_id', $request->id)
            ->paginate('100');

        $customer = User::where('id', $request->id)
            ->first();

        return view('customer-details', compact('customer_trasnactions', 'customer'));

    }

    public function date_search(request $request)
    {
        $customer = User::where('id', $request->user_id)
        ->first();



        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $customer_trasnactions = Transaction::where('user_id', $request->user_id)
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->paginate('100');


            return view('customer-details', compact('customer_trasnactions', 'customer'));


    }

    public function update_customer(request $request)
    {

        $user = User::find($request->id);

        if ($user === null) {
            return response(
                "User with id {$request->id} not found",
                Response::HTTP_NOT_FOUND
            );
        }

        $update = User::where('id', $request->id)
            ->update([

                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'address_line1' => $request->address_line1,
                'lga' => $request->lga,
                'state' => $request->state,
                'serial_no' => $request->serial_no,
                'v_account_no' => $request->v_account_no,
                'v_account_name' => $request->v_account_name,
                'v_bank_name' => $request->v_bank_name,
                'c_account_number' => $request->c_account_number,
                'c_account_name' => $request->c_account_name,
                'c_bank_name' => $request->c_bank_name,
                'v_account_no' => $request->v_account_no,
                'email' => $request->email,
                'v_account_no' => $request->v_account_no,
                'is_active' => $request->is_active,
                'type' => $request->type,



            ]);

        return back()->with('message', 'Customer Information Successfully Updated');

        // dd($update);

    }

    public function changeTerminalStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->is_active = $request->status;
        $user->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

    public function update_verification(request $request)
    {

        $update = User::where('id', $request->id)
            ->update([

                'status' => '2',
                'is_identification_verified' => '1',

            ]);

        return back()->with('message', 'Identification Successfully Updated');

    }

}
