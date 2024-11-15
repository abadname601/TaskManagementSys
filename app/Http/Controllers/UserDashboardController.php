<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    /**
     * Show the user dashboard.
     *
     * @param  int  $userId
     * @return \Illuminate\View\View
     */
    public function show($userId)
    {
        return view('user-dashboard', ['userId' => $userId]);
    }
}
