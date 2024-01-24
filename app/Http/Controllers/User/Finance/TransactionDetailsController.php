<?php

namespace App\Http\Controllers\User\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TransactionDetailsController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/finance/TransactionDetails');
    }
}
