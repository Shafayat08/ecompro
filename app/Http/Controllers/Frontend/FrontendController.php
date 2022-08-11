<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Catagory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $featured_products = Product::where('trending', '1')->take(15)->get();
        $trending_catagory = Catagory::where('popular', '1')->take(15)->get();
        return view('frontend.index', compact('featured_products', 'trending_catagory'));
    }
    
    public function catagory(){

        $catagory = Catagory::where('status', '0')->get();
        return view('frontend.catagory', compact('catagory'));
    }
}