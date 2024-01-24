<?php

namespace App\Http\Controllers\User\Utility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KnowledgeBaseController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/utility/KnowledgeBase');
    }
}
