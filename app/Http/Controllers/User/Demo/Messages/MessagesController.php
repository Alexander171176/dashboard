<?php

namespace App\Http\Controllers\User\Demo\Messages;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class MessagesController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/Messages');
    }
}
