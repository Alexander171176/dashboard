<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\User\Avatar;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index(Request $request): Response
    {
        $user = $request->user();
        $avatarPath = Avatar::getUserAvatarPath($user->id);

        return Inertia::render('User/Dashboard', [
            'avatar' => $avatarPath,
        ]);
    }
}
