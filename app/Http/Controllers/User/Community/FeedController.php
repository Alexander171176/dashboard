<?php

namespace App\Http\Controllers\User\Community;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FeedController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/community/Feed');
    }
}
