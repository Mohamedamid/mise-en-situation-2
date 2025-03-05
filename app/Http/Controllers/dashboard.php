<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    public function index(){
        $user = User::all();
        $count = count($user);
        return view('dashboard',compact('count'));

        /**
         * select count(*) from user
         */
    }
}
