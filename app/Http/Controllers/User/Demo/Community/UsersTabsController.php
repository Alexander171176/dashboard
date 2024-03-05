<?php

namespace App\Http\Controllers\User\Demo\Community;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class UsersTabsController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/community/UsersTabs');
    }
}
