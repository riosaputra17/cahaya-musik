<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $judul = 'Cahaya Musik | Dashboard';
        return view('admin.dashboard',  compact('judul'));
    }
}