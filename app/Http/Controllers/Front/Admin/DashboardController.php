<?php

namespace App\Http\Controllers\Front\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }
}
