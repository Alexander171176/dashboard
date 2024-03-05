<?php

namespace App\Http\Controllers\User\Demo\Settings;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/settings/Account');
    }
}
