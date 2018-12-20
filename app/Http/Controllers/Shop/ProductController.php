<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;

use  App\Models\Shop\Product;

class ProductController extends \App\Http\Controllers\Controller{
	
	public function index(Request $request){
	
	
		$products = Product::orderBy('name', 'asc')->paginate(15);
		
		if ($request->ajax()) {
			sleep (0.5);
			return view('shop.productList', ['products' => $products]);
		}
	
		return view('shop.index', ['products' => $products]);
	}
	
	

}
