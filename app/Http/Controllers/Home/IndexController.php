<?php

namespace App\Http\Controllers\Home;

use App\Home\indextop;
use App\Home\Single;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//php artisan make:controller Home/indexController
class indexController extends Controller
{

    public function index(Request $request){
        $index=indextop::paginate(8);
        $indextop=indextop::get();
        return view('home.index',compact('indextop','index'));
    }

    public function single(Request $request,$id){
        if ($request->method()=='POST'){
            $data=$request->except('_token','img','id');
            $id=$request->id;
            $img='/home/images/timg.jpg';
            $data['img']=$img;
            $result=Single::insert($data);
            return redirect("$id");
        }else{
            $homesingle=Single::get();
            $result=indextop::find($id);
            return view('home.single',compact('result','homesingle'));
        }
    }

}
