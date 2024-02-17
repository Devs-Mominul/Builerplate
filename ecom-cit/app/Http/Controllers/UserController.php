<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_list(){
        $user_list=User::all();
        return view('b_user.user_list',compact('user_list'));
    }
    public function user_delete($id){
        User::find($id)->delete();
        return back()->with('delete','User delete Successfully');
    }
}
