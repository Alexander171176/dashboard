<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Avatar;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AdminController extends Controller
{
    public function index(Request $request):Response
    {
        $user = $request->user();
        $avatar = $user->avatar ? Avatar::find($user->avatar)->first() : null; // Получаем объект модели Avatar

        // Теперь можно безопасно обращаться к свойству 'path'
        $avatarPath = $avatar ? $avatar->path : null;

        return Inertia::render('Admin/Admin', [
            'user' => $user,
            'avatar' => $avatarPath,
        ]);
    }
}
