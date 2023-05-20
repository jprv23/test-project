<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use App\Models\Product;
use App\Models\Sale;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index(Request $request, $sale_id){

        $product = Product::findOrFail($sale_id);

        return view('panel.sales.create', compact('product'));
    }

    public function store(SaleRequest $request, $product_id){

        DB::beginTransaction();

        try{

            $sale = new Sale();
            $sale->product_id = $product_id;
            $sale->quantity = (int) $request->quantity;
            $sale->save();



            $product = Product::findOrFail($product_id);

            //Verificar si cuenta con el stock disponible
            if($product->stock < $sale->quantity){
                throw new Exception('El producto no cuenta con el stock suficiente.');
            }
            //Descontar stock del producto
            $product->stock = $product->stock - $sale->quantity;
            $product->save();

            DB::commit();

            return toResponse()->success('Venta guardada correctamente.', 'products.index');

        }catch(Exception $e){

            DB::rollBack();

            return toResponse()->catch($e);
        }
    }
}
