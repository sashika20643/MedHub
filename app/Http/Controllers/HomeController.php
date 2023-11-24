<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function Home(){
        if(Auth::user()->role==1){

            return view('Admin.dashboard');
        }
        else{

            return view('User.dashboard');
        }

    }
}
