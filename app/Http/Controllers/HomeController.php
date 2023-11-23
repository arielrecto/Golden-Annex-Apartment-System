<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){


        $user = Auth::user()->hasRole('admin');

        if(!$user){
            return to_route('tenant.dashboard');
        }

        return to_route('admin.dashboard');
    }
}
