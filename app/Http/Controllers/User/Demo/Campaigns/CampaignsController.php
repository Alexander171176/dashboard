<?php

namespace App\Http\Controllers\User\Demo\Campaigns;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class CampaignsController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/Campaigns');
    }
}
