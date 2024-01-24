<?php

namespace App\Http\Controllers\User\Campaigns;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CampaignsController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/Campaigns');
    }
}
