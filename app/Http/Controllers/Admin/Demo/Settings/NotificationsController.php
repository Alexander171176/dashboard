<?php

namespace App\Http\Controllers\Admin\Demo\Settings;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class NotificationsController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/settings/Notifications');
    }
}
