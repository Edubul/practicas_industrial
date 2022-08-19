<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use Inertia\Inertia;

class ExternosController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/RegisterExternos');
    }

    public function store(Request $input)
    {

        $validate = $input->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'num_control' => ['max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'string', 'min:8'],

        ]);

        if ($validate) {

            User::create([
                'name' => $input['name'],
                'last_name' => $input['last_name'],
                'num_control' => $input['num_control'],
                'email' => $input['email'],
                'role' => 'externo',
                'password' => bcrypt($input['password']),
            ]);

            return Inertia::render('Auth/Login')->with('success', 'Usuario creado exitosamente');
        }
    }
}
