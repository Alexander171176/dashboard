<?php

namespace App\Http\Controllers\Admin\Demo\Onboarding;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class OnboardingOneController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Onboarding01');
    }
}
