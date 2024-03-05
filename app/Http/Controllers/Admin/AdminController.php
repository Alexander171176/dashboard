<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\User\Avatar;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AdminController extends Controller
{
    public function index(Request $request):Response
    {
        $user = $request->user();
        $avatarPath = Avatar::getUserAvatarPath($user->id);

        return Inertia::render('Admin/Admin', [
            'avatar' => $avatarPath,
        ]);
    }
}
