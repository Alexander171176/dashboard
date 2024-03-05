<?php

namespace App\Http\Controllers\Admin\Demo\Job;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class CompanyProfileController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/job/CompanyProfile');
    }
}
