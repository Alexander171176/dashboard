<?php

namespace App\Http\Controllers\User\Demo\Settings;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class NotificationsController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/settings/Notifications');
    }
}
