<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Product;

class InventoryController extends Controller
{

    function variation(){
        $categories=Category::all();
        $colors=Color::all();
        $sizes=Size::all();
        return view('product.variation',[
            'categories'=>$categories,
            'colors'=>$colors,
            'sizes'=>$sizes,
        ]);
    }
    function color(Request $request){
        Color::insert([
            'color_name'=>$request->color_name,
            'color_code'=>$request->color_code,
            'created_at'=>Carbon::now(),
        ]);
    }
    function size(Request $request){
        Size::insert([
            'size_name'=>$request->size_name,
            'category_id'=>$request->category_id,
            'created_at'=>Carbon::now(),
        ]);
    }
    function inventory($id){
        $product=Product::find($id);
        $color=Color::all();
        $inventory=Inventory::where('product_id',$id)->get();

        return view('product.inventory',[
            'product'=>$product,
            'color'=>$color,
            'inventory'=>$inventory,
        ]);
    }
    function inventory_store(Request $request,$id){
        Inventory::insert([
            'product_id'=>$id,
            'color_id'=>$request->color_id,
            'size_id'=>$request->size_id,
            'quantity'=>$request->quantity,

        ]);
        return back();
    }
}
