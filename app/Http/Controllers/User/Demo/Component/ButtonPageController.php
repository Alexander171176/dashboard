<?php

namespace App\Http\Controllers\User\Demo\Component;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ButtonPageController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/component/ButtonPage');
    }
}
