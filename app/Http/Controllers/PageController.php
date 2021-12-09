<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function home(){

      $data = \App\Models\Cryptocurrency::getData('50');

      return view('home', compact('data'));

    }

}
