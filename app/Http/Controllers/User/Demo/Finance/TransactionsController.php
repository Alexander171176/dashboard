<?php

namespace App\Http\Controllers\User\Demo\Finance;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class TransactionsController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/finance/Transactions');
    }
}
