<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class LabController extends Controller
{
    public function index()
    {
        $instructores = User::all()->where('role', 'instructor');
        // dd($instructores);
        return Inertia::render('Dashboard', [
            'instructores' => $instructores,
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
