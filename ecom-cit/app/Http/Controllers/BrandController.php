<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    function brand(){
        return view('brand.brand');
    }
    function brand_store(Request $request){
        $image=$request->image;
        $extension=$image->extension();
        $file_name=Str::lower(str_replace(' ','-',$request->brand_name)).'-'.random_int(100000,900000).'.'.$extension;
        $image->move(public_path('upload/brand/'),$file_name);
        Brand::insert([
            'brand_name'=>$request->brand_name,
            'image'=>$file_name,

        ]);
    }
}
