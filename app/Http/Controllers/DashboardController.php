<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Stakeholder;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function super(){
        $user = User::count();
        $admin = Admin::count();
        $stakeholder = Stakeholder::count();
        return view('super.dashboard.index', compact('user', 'admin', 'stakeholder'));
    }    

    public function admin(){
        
    }    

    public function stakeholder(){
        
    }
}
