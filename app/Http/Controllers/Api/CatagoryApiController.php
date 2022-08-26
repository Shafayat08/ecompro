<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CatagoryApiController extends Controller
{
    public function showcatagory($id=null){
        if($id==''){
            $catagoryies = Catagory::get();
            return response()->json($catagoryies);
        }else {
            $catagoryies = Catagory::find($id);
            return response()->json($catagoryies);
        }
    }

    public function addcatagory(Request $request){
        if($request-> isMethod('post')){
            $data= $request->all();

            $rules = [
                'name' => 'required',
                'slug' => 'required',
                'description' => 'required',
            ];

            $customMessage = [
                'name.required' => 'Name is required',
                'slug.required' => 'Email is required',
                'description.required' => 'Description is required',
            ];
            $validator = Validator::make($data, $rules, $customMessage);
            if($validator->fails()){
                $validator->errors();
                return response()->json($validator->errors(),422);
            }

            $catagory = new Catagory();
            $catagory->name = $data['name'];
            $catagory->slug = $data['slug'];
            $catagory->description = $data['description'];
            $catagory->status = $data['status'];
            $catagory->popular = $data['popular'];
            $catagory->image = $data['image'];
            $catagory->meta_title = $data['meta_title'];
            $catagory->meta_descrip = $data['meta_descrip'];
            $catagory->meta_keywords = $data['meta_keywords'];
            $catagory->save();
            $message = 'Category Added';
            return response()->json($message,201);
        }
    }

    public function updatecatagory(Request $request, $id){
        if($request-> ismethod('post')){
            $data = $request->all();

            $catagory = Catagory::find($id);
            $catagory->name = $data['name'];
            $catagory->slug = $data['slug'];
            $catagory->description = $data['description'];
            $catagory->status = $data['status'];
            $catagory->popular = $data['popular'];
            $catagory->image = $data['image'];
            $catagory->meta_title = $data['meta_title'];
            $catagory->meta_descrip = $data['meta_descrip'];
            $catagory->meta_keywords = $data['meta_keywords'];
            $catagory->save();
            $message = 'Category Updated';
            return response()->json($message,202);
        }
    }
}
