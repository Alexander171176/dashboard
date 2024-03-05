<?php

namespace App\Http\Controllers\User\Demo\ResetPassword;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ResetPasswordController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/ResetPassword');
    }
}
