<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    function dashboard(){
        return view('dashboard');
    }
    function profile_image(Request $request){
       if(Auth::user()->photo==null){
        $image=$request->image;
        $extension=$image->extension();
        $file_name=Str::lower(str_replace(' ','-',Auth::user()->name)).'-'.random_int(100000,900000).'.'.$extension;
        $image->move(public_path('upload/profile/'),$file_name);
        User::find(Auth::id())->update([
            'photo'=>$file_name,

        ]);
        return back()->with('profile','Your profile photo updated.');

       }
       else{
        $image=$request->image;
        $extension=$image->extension();

        $current_path=public_path('upload/profile/'.Auth::user()->photo);
        unlink($current_path);
        $file_name=Str::lower(str_replace(' ','-',Auth::user()->name)).'-'.random_int(100000,900000).'.'.$extension;
        $image->move(public_path('upload/profile/'),$file_name);

       }

    }
}
