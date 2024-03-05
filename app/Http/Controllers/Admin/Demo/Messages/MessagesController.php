<?php

namespace App\Http\Controllers\Admin\Demo\Messages;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class MessagesController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Messages');
    }
}
