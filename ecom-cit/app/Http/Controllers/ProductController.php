<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductGallery;

class ProductController extends Controller
{
    function index(){
        $category=Category::all();
        $brands=Brand::all();
        return view('product.index',[
            'categories'=>$category,
            'brands'=>$brands
        ]);
    }
    function getsubcategory(Request $request){
        $str='<option value="">Select Subcategory</option>';
        $subcategories=Subcategory::where('category_id',$request->category_id)->get();
        foreach($subcategories as $subcategory){
            $str.='<option value="'.$subcategory->id.'">'.$subcategory->subcategory_name.'</option>';

        }
        echo $str;

    }
    function product_store(Request $request){
        $after_implode=implode(' ',$request->tags);
        $preview=$request->preview;
            $extension=$preview->extension();
            $file_name=Str::lower(str_replace(' ','-',$request->product_name)).'-'.random_int(100000,900000).'.'.$extension;
           $preview->move(public_path('upload/preview/'),$file_name);
            $product_id=Product::insertGetId([
                'category_id'=>$request->category_id,
                'subcategory_id'=>$request->subcategory_id,
                'brand_id'=>$request->brand_id,
                'price'=>$request->price,
                'product_name'=>$request->product_name,
                'discount'=>$request->discount,
                'after_discount'=>$request->price - ($request->price*$request->discount/100),
                'tags'=>$after_implode,
                'short_desp'=>$request->short_desp,
                'long_desp'=>$request->long_desp,
                'addi_info'=>$request->addi_info,
                'preview'=>$file_name,
                'slug'=>Str::lower(str_replace(' ','-',$request->product_name)).'-'.random_int(1000000,9000000),

            ]);
            $gallery=$request->gallery;

            foreach($gallery as $gal){


                $extension=$gal->extension();
                $file_name=Str::lower(str_replace(' ','-',$request->product_name)).'-'.random_int(100000,900000).'.'.$extension;
                $gal->move(public_path('upload/gallery/'),$file_name);
                ProductGallery::insert([
                    'product_id'=>$product_id,
                    'gallery'=>$file_name,
                ]);
            }
    }
    function product_list(){
        $products=Product::all();
        return view('product.list',[
            'products'=>$products,
        ]);
    }
    function changeStatus(Request $request){
        Product::find($request->product_id)->update([
         'status'=>$request->status

        ]);
     }

}
