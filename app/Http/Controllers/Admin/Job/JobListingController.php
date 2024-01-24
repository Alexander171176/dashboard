<?php

namespace App\Http\Controllers\Admin\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobListingController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/job/JobListing');
    }
}
