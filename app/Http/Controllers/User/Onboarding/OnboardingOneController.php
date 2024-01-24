<?php

namespace App\Http\Controllers\User\Onboarding;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OnboardingOneController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/Onboarding01');
    }
}
