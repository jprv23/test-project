<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        //Producto con mayor stock
        $max_stock_product =  Product::select('name', DB::raw('MAX(stock) as stock'))
                                    ->where('status', true)
                                    ->first();

        //Producto más vendido
        $max_sales_product = Sale::selectRaw('COUNT(sales.id) as count, products.name')
                        ->join('products','sales.product_id','products.id')
                        ->where('products.status', true)
                        ->groupBy('sales.product_id')
                        ->orderByDesc('count')
                        ->first();

        return view('home', compact('max_stock_product', 'max_sales_product'));
    }


    private function max_stock_product(){


    }
}
