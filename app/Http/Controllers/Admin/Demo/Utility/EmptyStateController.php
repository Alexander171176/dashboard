<?php

namespace App\Http\Controllers\Admin\Demo\Utility;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class EmptyStateController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/utility/EmptyState');
    }
}
