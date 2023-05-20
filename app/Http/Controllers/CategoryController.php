<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){

        $data = Category::select('id', 'description')
                        ->where('status', true)
                        ->get();

        return $data;
    }


    public function store(Request $request){
        DB::beginTransaction();

        try{

            $category = new Category();
            $category->description = $request->description;
            $category->save();

            DB::commit();

            return toResponse()->ajax()->success();

        }catch(Exception $e){

            DB::rollBack();

            return toResponse()->ajax()->catch($e);
        }
    }
}
