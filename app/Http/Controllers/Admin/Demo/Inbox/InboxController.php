<?php

namespace App\Http\Controllers\Admin\Demo\Inbox;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class InboxController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Inbox');
    }
}
