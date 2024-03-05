<?php

namespace App\Http\Controllers\Admin\Demo\Calendar;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class CalendarController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Calendar');
    }
}
