<?php

namespace App\Http\Controllers;

use App\Models\Terminal;
use App\Models\Transaction;
use App\Models\User;
use App\Models\VirtualAccount;
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

        $terminals = Terminal::where('user_id', $request->id)
            ->paginate('10');

        $v_acccounts = VirtualAccount::where('user_id', $request->id)
            ->paginate('10');

        return view('customer-details', compact('customer_trasnactions', 'v_acccounts', 'customer', 'terminals'));

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

        if ($user->is_email_verified == 0) {

            User::where('id', $request->id)
                ->update([
                    'is_email_verified' => 1,
                ]);
        }

        if ($user->is_phone_verified == 0) {

            User::where('id', $request->id)
                ->update([
                    'is_phone_verified' => 1,
                ]);
        }

        $update = User::where('id', $request->id)
            ->update([

                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'gender' => $request->gender,

            ]);

        return back()->with('message', 'Customer Information Successfully Updated');

        // dd($update);

    }

    public function update_address(request $request)
    {

        $user = User::find($request->id);

        if ($user === null) {
            return response(
                "User with id {$request->id} not found",
                Response::HTTP_NOT_FOUND
            );
        }

        if ($user->is_email_verified == 0) {

            User::where('id', $request->id)
                ->update([
                    'is_email_verified' => 1,
                ]);
        }

        if ($user->is_phone_verified == 0) {

            User::where('id', $request->id)
                ->update([
                    'is_phone_verified' => 1,
                ]);
        }

        $update = User::where('id', $request->id)
            ->update([

                'address_line1' => $request->address_line1,
                'lga' => $request->lga,
                'state' => $request->state,
                'type' => $request->type,

            ]);

        return back()->with('message', 'Customer Information Successfully Updated');

        // dd($update);

    }

    public function delete_terminal(Request $request)
    {

        $user_id = $request->user_id;
        $serial_no = $request->serial_no;

        $d = Terminal::where([
            'user_id' => $user_id,
            'serial_no' => $serial_no,
        ])->delete();
        return back()->with('message', 'Terminal Successfully Deleted');
    }

    public function create_terminal(Request $request)
    {

        $check = Terminal::where('serial_no', $request->serial_no)
            ->first()->serial_no ?? null;

        if ($check == $request->serial_no) {

            return back()->with('message', 'Terminal  Already Exist');

        }

        $terminal = new Terminal();
        $terminal->serial_no = $request->serial_no;
        $terminal->user_id = $request->user_id;
        $terminal->v_account_no = $request->v_account_no;
        $terminal->description = $request->description;
        $terminal->save();

        return back()->with('message', 'Terminal Successfully Created');
    }



    public function activate_terminal(Request $request)
    {

        $user_id = $request->user_id;
        $serial_no = $request->serial_no;

        $d = Terminal::where([
            'user_id' => $user_id,
            'serial_no' => $serial_no,
        ])->update([
            'transfer_status' => 1,
        ]);
        return back()->with('message', 'Terminal Successfully Activated');
    }


    public function deactivate_terminal(Request $request)
    {

        $user_id = $request->user_id;
        $serial_no = $request->serial_no;

        $d = Terminal::where([
            'user_id' => $user_id,
            'serial_no' => $serial_no,
        ])->update([
            'transfer_status' => 0,
        ]);
        return back()->with('message', 'Terminal Successfully Deactivated');
    }










    public function create_account_details(Request $request)
    {

        $check = VirtualAccount::where('v_account_no', $request->v_account_no)
            ->first()->serial_no ?? null;

        if ($check == $request->v_account_no) {

            return back()->with('message', 'Account  Already Exist');

        }

        $terminal = new VirtualAccount();
        $terminal->v_account_no = $request->v_account_no;
        $terminal->	v_account_name = $request->	v_account_name;
        $terminal->v_bank_name = $request->v_bank_name;
        $terminal->user_id = $request->user_id;
        $terminal->save();

        return back()->with('message', 'Account Successfully Created');
    }

    public function delete_account_no(Request $request)
    {

        $user_id = $request->user_id;
        $v_account_no = $request->v_account_no;

        $d = VirtualAccount::where([
            'user_id' => $user_id,
            'v_account_no' => $v_account_no,
        ])->delete();

        return back()->with('message', 'Terminal Successfully Deleted');
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
