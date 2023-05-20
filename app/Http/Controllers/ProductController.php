<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request){

        if(!$request->ajax()){
            //Retornar vista al usuario
            return view('panel.products.index');
        }

        //Retornar datatable vía ajax
        $query = Product::with('category')->where('status', true);

        return toResponse()->table($query);
    }

    public function create(){

        return view('panel.products.create');
    }

    public function store(ProductRequest $request){

        DB::beginTransaction();

        try{

            $product = new Product();
            $product->name = $request->name;
            $product->reference = $request->reference;
            $product->category_id = $request->category_id;
            $product->price = (int) $request->price;
            $product->weight = (int) $request->weight;
            $product->stock = (int) $request->stock;
            $product->save();

            DB::commit();

            return toResponse()->success(route: 'products.index');

        }catch(Exception $e){

            DB::rollBack();

            return toResponse()->catch($e);
        }
    }

    public function edit(Request $request, $id){

        $product = Product::findOrFail($id);

        return view('panel.products.edit', compact('product'));
    }

    public function update(ProductRequest $request, $id){

        DB::beginTransaction();

        try{

            $product = Product::findOrFail($id);
            $product->name = $request->name;
            $product->reference = $request->reference;
            $product->category_id = $request->category_id;
            $product->price = (int) $request->price;
            $product->weight = (int) $request->weight;
            $product->stock = (int) $request->stock;
            $product->save();

            DB::commit();

            return toResponse()->success(route: 'products.index');

        }catch(Exception $e){

            DB::rollBack();

            return toResponse()->catch($e);
        }
    }

    public function destroy($id){

        //Esta eliminación es lógica por lo que el producto sigue existiendo en la db
        //por temas de seguridad o auditoría

        DB::beginTransaction();

        try{

            Product::where('id', $id)
            ->update([
                'status' => false
            ]);

            DB::commit();

            return toResponse()->success(route: 'products.index');

        }catch(Exception $e){

            DB::rollBack();

            return toResponse()->catch($e);
        }


    }
}
