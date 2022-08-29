<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PanelController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return Inertia::render('Panel/Index', ['user' => $user]);
    }
}
