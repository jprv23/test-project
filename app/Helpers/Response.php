<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class Response{

    private $messages = [
        'store' => 'Guardado correctamente.',
        'update' => 'Actualizado correctamente.',
        'delete' => 'Eliminado correctamente.',
    ];

    private $type = 'web'; //web|ajax


    public function ajax(){
        $this->type = 'ajax';
        return $this;
    }

    public function catch($e){

        $message = "Mensaje: " . $e->getMessage();

        if($this->type == 'ajax'){
            return response()->json(['isSuccess' => false, 'message' => $message]);
        }

        Session::flash('error', $message);

        return back()->withInput(request()->all());
    }


    public function error($message = ""){

        if($this->type == 'ajax'){
            return response()->json(['isSuccess' => false, 'message' => $message]);
        }

        Session::flash('error', $message);

        return back()->withInput(request()->all());
    }

    public function success($message = "", $route = null){

        if(!$message){
            $message = $this->getMessage();
        }

        if($this->type == 'ajax'){
            return response()->json(['isSuccess' => true, 'message' => $message]);
        }

        Session::flash('success', $message);

        if($route){
            return redirect()->route($route);
        }

        return back();
    }

    public function table($query){

        return DataTables::of($query)->toJson();
    }


    private function getMessage() : string {


        if(request()->method() == 'POST'){
            return $this->messages['store'];
        }else if(request()->method() == 'PATCH'){
            return $this->messages['update'];
        }else if(request()->method() == 'DELETE'){
            return $this->messages['delete'];
        }

        return '';
    }


}
