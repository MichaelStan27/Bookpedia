<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;



class ViewControllers extends Controller
{
    public function index($dir = 'welcome'){
        if(View::exists($dir)){
            return view($dir);
        }
        return redirect('/');
    }
}
