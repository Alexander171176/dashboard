<?php

namespace App\Http\Controllers\Admin\Demo\Onboarding;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class OnboardingFourController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Onboarding04');
    }
}
