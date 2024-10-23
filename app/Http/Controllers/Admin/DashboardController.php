<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Circuler;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        $membersCount = Member::count();
        $circulersCount = Circuler::count();
        $payments = Payment::paginate(50);
        return view('admin.dashboard', compact('membersCount', 'circulersCount','payments'));
    }

    public function filemanager()
    {
        return view('admin.file-manager');
    }
}
