<?php

namespace App\Http\Controllers;

use App\Models\GoldTransaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $transactions = GoldTransaction::latest()->paginate(5);
        return view('dashboard', compact('transactions'));
    }
}
