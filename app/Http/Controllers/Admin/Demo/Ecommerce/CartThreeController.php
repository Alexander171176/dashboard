<?php

namespace App\Http\Controllers\Admin\Demo\Ecommerce;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class CartThreeController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/ecommerce/Cart3');
    }
}