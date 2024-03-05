<?php

namespace App\Http\Controllers\User\Demo\Component;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class AlertPageController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/component/AlertPage');
    }
}
