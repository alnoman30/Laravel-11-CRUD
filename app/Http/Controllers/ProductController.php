<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){
        return view('pages.create');
    }



    public function ourFileStore(Request $request)
    
    {
        // validation
        $validated = $request->validate([
            'name' => 'required|unique:products|max:255',
            'description' => 'required',
            'sku' => 'required|unique:products',
            'price' => 'required|numeric',
            'image' => 'nullable|mimes:jpeg,png,jpg',
        ]);
        $imageName = null;
        if ($request->image) {
            $imageName = time().'.'.request()->image->extension();
            request()->image->move(public_path('uploads'), $imageName);
        }
        


        $product = new Product;
 
        $product->name = $request->name;
        $product->description = $request->description;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->image = $imageName;
 
        $product->save();
        
        flash()->success('Product has been added successfully!');
        return redirect()->route('home');
    }



    public function editProd($id){
        $product = Product::find($id);
        return view('pages.update', ['prod' => $product]);
    }


    public function updateProd($id,Request $request){

        // validation
        $validated = $request->validate([
            'name' => 'required|unique:products,name,' . $id . '|max:255',
            'description' => 'required',
            'sku' => 'required|unique:products,sku,' . $id,
            'price' => 'required|numeric',
            'image' => 'nullable|mimes:jpeg,png,jpg',
        ]);

        $product = Product::findOrfail($id);
 
        $product->name = $request->name;
        $product->description = $request->description;
        $product->sku = $request->sku;
        $product->price = $request->price;
        if ($request->image) {
            $imageName = time().'.'.request()->image->extension();
            request()->image->move(public_path('uploads'), $imageName);
            $product->image = $imageName;
        }

        $product->save();
        
        flash()->success('Product has been updated successfully!');
        return redirect()->route('home');
    }



    public function deleteProd($id,Request $request ){
        $product = Product::findOrfail($id);
        if ($product->image && file_exists(public_path('uploads/' . $product->image))) {
            unlink(public_path('uploads/' . $product->image)); 
        }
        $product->delete();


        flash()->error('Product has been deleted!');
        return redirect()->route('home');
    }
}
