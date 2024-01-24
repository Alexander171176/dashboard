<?php

namespace App\Http\Controllers\User\Onboarding;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OnboardingFourController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/Onboarding04');
    }
}
