<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
 
    public function index() {
        $user_id = auth()->user()->id;

        $products = Product::where("user_id", $user_id)->get();

        return response()->json([
            "status" => true,
            "products" => $products
        ]);
    }

  
    public function store(Request $request) {
        $data = $request->validate([
            "title" => "required"
        ]);

        $data["user_id"] = auth()->user()->id;
        if ($request->hasFile("banner_image")) {
            $data["banner_image"] = 
            $request->file("banner_image")->store("products", "public");
        }

        Product::create($data);

        return response()->json([
            "status" => true,
            "message" => "Product created successfully"

        ]);

    }

    public function show(Product $product){

        return response()->json([
            "status" => true,
            "message" => "Product data found",
            "product" => $product
        ]);
        
    }

 
    public function update(Request $request, Product $product){

        $data = $request->validate([
            "title" => "required"
        ]);

        if ($request->hasFile("banner_image")) {
            if ($product->banner_image) {
                Storage::disk("public")->delete($product->banner_image);
            }

            $data["banner_image"] = $request->file("banner_image")->store("products", "public");

            $product->update($data);

            return response()->json([
                "status" => true,
                "message" => "Product data updated"
            ]);
        }

        
    }

   
    public function destroy(Product $product){

        $product->delete();

        return response()->json([

            "status" => true,
            "message" => "Product deleted successfully"
        ]);
        
    }






























    
}
