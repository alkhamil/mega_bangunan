<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pelanggan;
use App\Dimension;
use App\Criteria;

class DashboardCtrl extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $respondens = Pelanggan::all()->count();
        $dimensions = Dimension::all()->count();
        $criterias = Criteria::all()->count();
        return view('dashboard.index', compact('users','respondens','dimensions','criterias'));
    }
}
