<?php

namespace App\Http\Controllers\User\Demo\Utility;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class PageNotFoundController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/utility/PageNotFound');
    }
}
