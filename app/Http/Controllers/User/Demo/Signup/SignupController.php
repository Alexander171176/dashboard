<?php

namespace App\Http\Controllers\User\Demo\Signup;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class SignupController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/Signup');
    }
}
