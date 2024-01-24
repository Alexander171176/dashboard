<?php

namespace App\Http\Controllers\User\Messages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MessagesController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/Messages');
    }
}
