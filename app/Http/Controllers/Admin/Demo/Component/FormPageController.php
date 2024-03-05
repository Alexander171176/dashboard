<?php

namespace App\Http\Controllers\Admin\Demo\Component;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class FormPageController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/component/FormPage');
    }
}
