<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NotificationsController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/settings/Notifications');
    }
}
