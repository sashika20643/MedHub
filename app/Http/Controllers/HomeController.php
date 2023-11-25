<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Prescription;
use App\Models\Quotation;


class HomeController extends Controller
{
    public function Home(){
        if(Auth::user()->role==1){
            $recived=Prescription::all()->count();
            $approved=Quotation::where('status','approved')->get()->count();
            $rejected=Quotation::where('status','rejected')->get()->count();

            return view('Admin.dashboard',compact('recived','rejected','approved'));
        }
        else{
            $uid=Auth::user()->id;
            $sended=Prescription::where('user_id',$uid)->get()->count();
            $recived=Prescription::where('user_id',$uid)->where('status',"quotation_sent")->get()->count();
            $pending=$sended-$recived;

            return view('User.dashboard',compact('sended','recived','pending'));
        }

    }
}
