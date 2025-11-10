<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Debug: Log which view is being loaded
        \Log::info('Loading dashboard view: dashboards.administrator');
        
        return view('dashboards.administrator');
    }
}
