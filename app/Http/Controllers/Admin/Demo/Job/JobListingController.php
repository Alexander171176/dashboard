<?php

namespace App\Http\Controllers\Admin\Demo\Job;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class JobListingController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/job/JobListing');
    }
}
