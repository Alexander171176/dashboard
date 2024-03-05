<?php

namespace App\Http\Controllers\Admin\Demo\Community;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/community/Profile');
    }
}
