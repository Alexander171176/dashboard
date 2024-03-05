<?php

namespace App\Http\Controllers\Admin\Demo\Fintech;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class FintechController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Fintech');
    }
}
