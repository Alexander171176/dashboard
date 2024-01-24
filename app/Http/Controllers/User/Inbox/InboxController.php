<?php

namespace App\Http\Controllers\User\Inbox;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InboxController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/Inbox');
    }
}
