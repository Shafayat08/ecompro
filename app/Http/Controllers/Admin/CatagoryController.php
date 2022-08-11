<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catagory;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    public function index(){
        $catagory = Catagory::all();
        return view('admin.catagory.index', compact('catagory'));
    }

    public function add(){
        return view('admin.catagory.add');
    }

    public function insert(Request $request){
        $catagory = new Catagory();

        if($request -> hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/catagory',$filename);
            $catagory->image = $filename;
        }

        $catagory->name = $request->input('name');
        $catagory->slug = $request->input('slug');
        $catagory->description = $request->input('description');
        $catagory->status = $request->input('status') == TRUE ? '1':'0';
        $catagory->popular = $request->input('popular') == TRUE ? '1':'0';
        $catagory->meta_title = $request->input('meta_title');
        $catagory->meta_keywords = $request->input('meta_keywords');
        $catagory->meta_descrip = $request->input('meta_descrip');
        $catagory->save();
        return redirect('/dashboard')->with('status', "Category Added");
    }

    public function edit($id){
        $catagory = Catagory::find($id);
        return view('admin.catagory.edit', compact('catagory'));
    }

    public function update(Request $request, $id){
        $catagory = Catagory::find($id);
        if($request->hasFile('image')){
            $path = 'assets/uploads/catagory/'.$catagory->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/catagory',$filename);
            $catagory->image = $filename;
        }
        
        $catagory->name = $request->input('name');
        $catagory->slug = $request->input('slug');
        $catagory->description = $request->input('description');
        $catagory->status = $request->input('status') == TRUE ? '1':'0';
        $catagory->popular = $request->input('popular') == TRUE ? '1':'0';
        $catagory->meta_title = $request->input('meta_title');
        $catagory->meta_keywords = $request->input('meta_keywords');
        $catagory->meta_descrip = $request->input('meta_descrip');
        $catagory->update();
        return redirect('dashboard')->with('status',"Catagory Updated Successfully");
    }

    public function destroy($id){
        $catagory = Catagory::find($id);
        if($catagory->image){
            
            $path = 'assets/uploads/catagory/'.$catagory->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $catagory->delete();
        return redirect('catagories')->with('status',"Catagory Deleted Successfully");
    }
}
