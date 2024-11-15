<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard'); 
    }

    public function show($id)
    {
        return view('user-dashboard', ['userId' => $id]); // in resources/views/user-dashboard.blade.php
    }
}
