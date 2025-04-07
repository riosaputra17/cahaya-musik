<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorHandlingController extends Controller
{
    public function errorUnauthorized()
    {
        return view('error_page.error-unauthorized');
    }
}