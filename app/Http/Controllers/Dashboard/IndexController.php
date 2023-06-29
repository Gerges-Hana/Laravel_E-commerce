<?php

namespace App\Http\Controllers\Dashboard;
// namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //

    public function index(){
        // dd('ggggg');
        return view('dashboard.index');
    }


}
