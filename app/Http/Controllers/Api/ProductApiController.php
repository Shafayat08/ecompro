<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductApiController extends Controller
{
    public function showproducts($id=null){
        if($id==''){
            $products = Product::get();
            return response()->json($products);
        }else {
            $products = Product::find($id);
            return response()->json($products);
        }
    }

    public function addproduct(Request $request){
        if($request-> isMethod('post')){
            $data= $request->all();

            $rules = [
                'name' => 'required',
                'slug' => 'required',
                'small_description' => 'required',
                'description' => 'required',
                'original_price' => 'required',
                'selling_price' => 'required',
                'qty' => 'required',
                'tax' => 'required',
            ];

            $customMessage = [
                'name.required' => 'Name is required',
                'slug.required' => 'Email is required',
                'small_description.required' => 'Small Description must be valid',
                'description.required' => 'Description is required',
                'original_price.required' => 'Original Price is required',
                'selling_price.required' => 'Selling Price is required',
                'qty.required' => 'Quantity is required',
                'tax.required' => 'Tax is required',

            ];
            $validator = Validator::make($data, $rules, $customMessage);
            if($validator->fails()){
                return response()->json($validator->errors(),422);
            }

            $product = new Product();
            $product->cate_id = $data['cate_id'];
            $product->name = $data['name'];
            $product->slug = $data['slug'];
            $product->small_description = $data['small_description'];
            $product->description = $data['description'];
            $product->original_price = $data['original_price'];
            $product->selling_price = $data['selling_price'];
            $product->image = $data['image'];
            $product->qty = $data['qty'];
            $product->tax = $data['tax'];
            $product->status = $data['status'];
            $product->trending = $data['trending'];
            $product->meta_title = $data['meta_title'];
            $product->meta_keywords = $data['meta_keywords'];
            $product->meta_description = $data['meta_description'];
            $product->save();
            $message = 'Product Added';
            return response()->json($message,201);
        }

    }

    public function updateproduct(Request $request, $id){
        if($request-> ismethod('post')){
            $data = $request->all();

            $product = Product::find($id);
            $product->name = $data['name'];
            $product->slug = $data['slug'];
            $product->small_description = $data['small_description'];
            $product->description = $data['description'];
            $product->original_price = $data['original_price'];
            $product->selling_price = $data['selling_price'];
            $product->image = $data['image'];
            $product->qty = $data['qty'];
            $product->tax = $data['tax'];
            $product->status = $data['status'];
            $product->trending = $data['trending'];
            $product->meta_title = $data['meta_title'];
            $product->meta_keywords = $data['meta_keywords'];
            $product->meta_description = $data['meta_description'];
            $product->save();
            $message = 'Product Updated';
            return response()->json($message,202);
        }
    }
}
