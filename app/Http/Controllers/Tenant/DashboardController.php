<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){

        $user = Auth::user();

        $bills = $user->room->bills()->get();
        $billTotal = count($bills);

        $announcementTotal = Announcement::count();

        return view('users.tenant.dashboard', compact(['bills', 'announcementTotal', 'billTotal']));
    }
}
