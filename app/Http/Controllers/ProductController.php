<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\ProductDetails;
use App\ProDetails;

class ProductController extends Controller
{
    //
    public function prodcats()
    {
    	$prodcats = DB::table('prodcat')->get();
    	return view('product_ajax',compact('prodcats'));
    }

    public function findProductName(Request $request)
    {
    	
    	$check = $request->cat_id;
    	$product_name = DB::table('prodetails')
    						->select('prod_names','prodcat_id','id')
    						->where('prodcat_id',$check)
    						->get();
    	//dd($product_name);
    	return response()->json($product_name);//then sent this data to ajax success..this 'product_name' is will be the 'data' of the success function
    }

    public function findPrice(Request $request)
    {
    	
    	$product_er_id = $request->product_er_id;
    	$product_price = DB::table('prodetails')
    						->select('id','price')
    						->where('id',$product_er_id)
    						->first(); ///oi dependent data ta sorasori tule ante first use kora holo
    	//dd($product_price);
    	return response()->json($product_price);//then sent this data to ajax success..this 'product_name' is will be the 'data' of the success function
    }
}
