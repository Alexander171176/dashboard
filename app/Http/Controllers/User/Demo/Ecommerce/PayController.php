<?php

namespace App\Http\Controllers\User\Demo\Ecommerce;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class PayController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/ecommerce/Pay');
    }
}
