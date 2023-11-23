<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Maintenance;

class DashboardController extends Controller
{
    public function dashboard(){

        $tenants = User::role('tenant')->get();
        $roomsTotal = Room::count();
        $maintenanceTotal = Maintenance::count();

        return view('users.admin.dashboard', compact(['tenants', 'roomsTotal', 'maintenanceTotal']));
    }
}
