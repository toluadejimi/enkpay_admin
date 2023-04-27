<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Setting;
use App\Models\Feature;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


class TransactionController extends Controller
{




    public function index(){

        $all_trasnactions = Transaction::latest()
        ->paginate('500');


        return view('transaction', compact('all_trasnactions'));
    }









}




