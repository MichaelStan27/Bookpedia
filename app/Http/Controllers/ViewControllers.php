<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;



class ViewControllers extends Controller {
    public function index($view = 'welcome') {
        if (View::exists($view)) {
            return view($view);
        }
        return redirect('/');
    }
}
