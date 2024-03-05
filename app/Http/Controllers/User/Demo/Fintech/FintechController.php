<?php

namespace App\Http\Controllers\User\Demo\Fintech;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class FintechController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/Fintech');
    }
}
