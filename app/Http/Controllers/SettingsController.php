<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Setting;
use App\Models\Feature;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


class SettingsController extends Controller
{




    public function index(){

        $settings = Setting::where('id', 1)->first();

        $features = Feature::where('id', 1)->first();




        return view('settings', compact('settings', 'features'));
    }




    public function update_fetures(request $request){


        $update = Feature::where('id', 1)
        ->update([

            'pos' => $request->pos,
            'bank_transfer' => $request->bank_transfer,
            'bills' => $request->bills,
            'data' => $request->data,
            'airtime' => $request->airtime,
            'insurance' => $request->insurance,
            'education' => $request->education,
            'power' => $request->power,
            'exchange' => $request->exchange,
            'ticket' => $request->ticket,
            'v_card' => $request->v_card,

        ]);


        return back()->with('message', 'Features Updated Successfully');


    }



    public function update_store(request $request){


        $update = Setting::where('id', 1)
        ->update([

            'version' => $request->version,
            'google_url' => $request->playstore_link,
            'ios_url' => $request->appstore_link,

        ]);


        return back()->with('message', 'Settings Updated Successfully');


    }









}
