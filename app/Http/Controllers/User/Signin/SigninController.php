<?php

namespace App\Http\Controllers\User\Signin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SigninController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/Signin');
    }
}
