<?php

namespace App\Http\Controllers\Admin\Demo\Signup;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class SignupController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Signup');
    }
}
