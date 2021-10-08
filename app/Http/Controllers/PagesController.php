<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }

    public function dashboardPage()
    {
        return view('dashboard');
    }
}
