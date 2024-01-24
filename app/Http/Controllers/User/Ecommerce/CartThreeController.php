<?php

namespace App\Http\Controllers\User\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartThreeController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/ecommerce/Cart3');
    }
}
