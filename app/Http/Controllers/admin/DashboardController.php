<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ParticipantModel;

class DashboardController extends Controller
{

    public function index()
    {
        $totalParticipants = ParticipantModel::count();
        return view('admin/dashboard.index', compact('totalParticipants'));
    }
}
