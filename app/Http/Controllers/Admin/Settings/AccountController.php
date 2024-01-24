<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/settings/Account');
    }
}
