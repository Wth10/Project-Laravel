<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\boletin;


class PageController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function login(){
        return view('login');
    }   

    public function register(){
        return view('register');
    }

    public function profile(){
        return view('profile');
    }

}
