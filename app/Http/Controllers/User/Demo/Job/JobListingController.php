<?php

namespace App\Http\Controllers\User\Demo\Job;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class JobListingController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/job/JobListing');
    }
}
