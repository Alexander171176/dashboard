<?php

namespace App\Http\Controllers\Admin\Community;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UsersTilesController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/community/UsersTiles');
    }
}
