<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//php artisan make:controller Admin/IndexController
class IndexController extends Controller
{
    //
    public function welcome(){
        return view('admin.index.welcome');
    }
    public function index(){
        return view('admin.index.index');
    }
}
