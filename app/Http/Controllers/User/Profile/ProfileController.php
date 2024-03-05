<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\ProfileUpdateRequest;
use App\Models\Admin\User\Avatar;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    public function index(Request $request): Response
    {
        $user = $request->user();
        $avatar = $user->avatar ? Avatar::find($user->avatar)->first() : null; // Получаем объект модели Avatar

        // Теперь можно безопасно обращаться к свойству 'path'
        $avatarPath = $avatar ? $avatar->path : null;

        return Inertia::render('Profile/Index', [
            'user' => $user,
            'avatar' => $avatarPath,
        ]);
    }

    public function edit(Request $request): Response
    {
        $user = $request->user();
        $avatar = $user->avatar ? Avatar::find($user->avatar)->first() : null; // Получаем аватар пользователя

        // Теперь можно безопасно обращаться к свойству 'path'
        $avatarPath = $avatar ? $avatar->path : null;

        // Отладочный вывод для проверки данных об аватаре
        //dd($avatar);

        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
            'user' => $user,
            'avatar' => $avatarPath,
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $userData = $request->validated();

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('public/avatars');
            $avatar = Avatar::updateOrCreate(
                ['user_id' => $user->id],
                ['path' => $avatarPath]
            );
        }

        if ($user->email !== $userData['email']) {
            $user->email_verified_at = null;
        }

        $user->fill($userData)->save();

        return Redirect::route('profile.edit');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Удаляем аватарку, если она есть
        if ($user->avatar) {
            Storage::delete($user->avatar);
        }

        // Удаляем пользователя
        $user->delete();

        // Инвалидируем текущую сессию и обновляем CSRF-токен
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

