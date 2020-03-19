<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgeController extends Controller
{
    public function form()
    {
        return View('age/form');
    }

    public function dashboard(Request $request)
    {
        return View('age/dashboard');
    }

    public function restricted()
    {
        return View('age/restricted');
    }
}
