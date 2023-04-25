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

        $settings = Setting::where('id', 1)->get();

        $features = Feature::where('id', 1)->first();



        return view('settings', compact('settings', 'features'));
    }



    public function changePosStatus(Request $request)
    {
        $feature = Feature::find($request->feature_id);
        $feature->pos = $request->status;
        $feature->save();

        return response()->json(['success'=>'Status change successfully.']);
    }



    public function changeDataStatus(Request $request)
    {
        $feature = Feature::find($request->feature_id);
        $feature->data = $request->status;
        $feature->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function changeBankStatus(Request $request)
    {
        $feature = Feature::find($request->feature_id);
        $feature->bank_transfer = $request->status;
        $feature->save();

        return response()->json(['success'=>'Status change successfully.']);
    }










}
