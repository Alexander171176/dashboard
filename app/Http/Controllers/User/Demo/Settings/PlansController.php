<?php

namespace App\Http\Controllers\User\Demo\Settings;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class PlansController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/settings/Plans');
    }
}
