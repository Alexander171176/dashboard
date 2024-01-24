<?php

namespace App\Http\Controllers\User\Signup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SignupController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/Signup');
    }
}
