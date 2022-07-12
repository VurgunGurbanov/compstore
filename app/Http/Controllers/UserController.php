<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function user(users $user=null){
        if ($user==null){
            return view('index');
        }else{
            return view('user', compact('user'));
        }
    }


//    public function users(){
//
//        $user = users::where('id', 2)->get();
//
//        return $user;
//    }

}
