<?php

namespace App\Http\Controllers\Admin\Demo\Signin;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class SigninController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Signin');
    }
}
