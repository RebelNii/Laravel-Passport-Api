<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductsResource;
use App\Models\products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //

    public function index (){
        //return products::all();
        return ProductsResource::collection(products::all());
    }

    public function get(products $product){
        //return $product;
        /*return response()->json([
            'data' => [
                'id' => $product->id,
                'type' => 'Products',
                'attributes' => [
                    'name' => $product->name,
                    'price' => $product->price,
                    'description' => $product->description,
                    'slug' => $product->slug,
                    'created_at' => $product->created_at,
                    'updated_at' => $product->updated_at
                ]
            ]
        ]);*/
        return new ProductsResource($product);
    }

    public function search($name){
        return products::where('name', 'LIKE', '%'. $name .'%')->get();
    }

    public function store(Request $request){
        $product = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required'
        ]);
        //return products::create($request->all());
        $newProduct = products::create($product);
        return new ProductsResource($newProduct);
    }

    public function update(Request $request, products $product){
        //dd($request);
        //$product->update($request->all());
        $product->update([
            'price' => $request->input('price'),
            'description' => $request->input('description'),
        ]);
        return new ProductsResource($product);
    }

    public function destroy(Request $request, products $products){
        $products->delete();
        return 'Item deleted';
    }
}
