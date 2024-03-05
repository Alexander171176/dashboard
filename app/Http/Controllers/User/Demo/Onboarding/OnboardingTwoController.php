<?php

namespace App\Http\Controllers\User\Demo\Onboarding;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class OnboardingTwoController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/Onboarding02');
    }
}
