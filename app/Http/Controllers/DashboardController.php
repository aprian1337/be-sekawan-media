<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Stakeholder;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function super(){
        $user = User::count();
        $admin = Admin::count();
        $stakeholder = Stakeholder::count();
        $vehicle = Vehicle::count();
        return view('super.dashboard.index', compact('user', 'admin', 'stakeholder', 'vehicle'));
    }    

    public function admin(){
        
    }    

    public function stakeholder(){
        
    }
}
