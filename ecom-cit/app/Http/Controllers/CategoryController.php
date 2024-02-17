<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function category_view(){
        $categories=Category::all();
        return view('category.category',[
            'categories'=>$categories,
        ]);
    }
    function category_store(Request $request){
        $image=$request->image;
        $extension=$image->extension();
        $file_name=Str::lower(str_replace(' ','-',$request->category_name)).'-'.random_int(100000,900000).'.'.$extension;
        $image->move(public_path('upload/category/'),$file_name);
        Category::insert([
            'category_name'=>$request->category_name,
            'category_img'=>$file_name,
            'created_at'=>Carbon::now(),

        ]);
        return back()->with('success','Category added successfully');
    }
}
