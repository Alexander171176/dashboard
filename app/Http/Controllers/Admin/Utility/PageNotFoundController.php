<?php

namespace App\Http\Controllers\Admin\Utility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageNotFoundController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/utility/PageNotFound');
    }
}