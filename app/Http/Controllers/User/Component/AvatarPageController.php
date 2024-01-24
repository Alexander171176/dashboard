<?php

namespace App\Http\Controllers\User\Component;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AvatarPageController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/component/AvatarPage');
    }
}
