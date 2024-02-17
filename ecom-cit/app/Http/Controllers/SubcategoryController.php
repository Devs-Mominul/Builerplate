<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    function subcategory(){
        $category=Category::all();
        return view('subcategory.subcategory',[
            'categories'=>$category,
        ]);
    }
    function subcategory_store(Request $request){
        Subcategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
        ]);
        return back();
    }
}
