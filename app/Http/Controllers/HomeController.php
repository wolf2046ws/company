<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index()
    {
        return view('home');
    }
}
