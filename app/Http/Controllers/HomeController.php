<?php





namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('homepage'); // Create this view later in resources/views/home.blade.php
    }
}
