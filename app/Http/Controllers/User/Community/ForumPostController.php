<?php

namespace App\Http\Controllers\User\Community;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ForumPostController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/community/ForumPost');
    }
}