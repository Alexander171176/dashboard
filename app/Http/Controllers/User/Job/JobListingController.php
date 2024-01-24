<?php

namespace App\Http\Controllers\User\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobListingController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/job/JobListing');
    }
}