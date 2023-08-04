<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;

use Illuminate\Http\Request;

class productController extends Controller
{
    public function getProduct(){
        //return response()->json(product::all(), 200);
        $product = product::all();
        return response()->json($product, 200);
    }

    public function show($id){
        //return response()->json(product::all(), 200);
        $product = product::find($id);

        if(is_null($product)){
            return response()->json(['Message'=>'Registro no encontrado'], 404);
        }
       return response()->json($product, 200);
    }


    public function insert(Request $request){
        //return response()->json(product::all(), 200);
        $product = product::create($request->all());
        
        return response($product);
    }

    public function update(Request $request, $id){
        //return response()->json(product::all(), 200);
        $product = product::find($id);

        if(is_null($product)){
            return response()->json(['Message'=>'Registro no encontrado'], 404);
        }
        $product->update($request->all());
        
        return response($product, 200);
    }


    public function delete($id){
        //return response()->json(product::all(), 200);
        $product = product::find($id);

        if(is_null($product)){
            return response()->json(['Message'=>'Registro no encontrado'], 404);
        }
        $product->delete();
        
        return response()->json(['Message'=>'El producto se haeliminado con exito']);
    }
}
