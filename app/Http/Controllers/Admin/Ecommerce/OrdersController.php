<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrdersController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/ecommerce/Orders');
    }
}
