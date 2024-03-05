<?php

namespace App\Http\Controllers\User\Demo\Onboarding;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class OnboardingOneController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/Onboarding01');
    }
}
