<?php

namespace App\Http\Controllers\Admin\Demo\Analytics;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class AnalyticsController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Analytics');
    }
}
