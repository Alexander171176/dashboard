<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvatarController extends Controller
{
    /**
     * Обработка запроса на загрузку аватара пользователя.
     */
    public function upload(Request $request): \Illuminate\Http\JsonResponse
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $path = $avatar->store('avatars', 'public'); // Сохраняем файл в папку 'avatars' в хранилище

            $user = Auth::user();

            // Удаляем все предыдущие аватары пользователя
            if ($user->avatar()->exists()) {
                $user->avatar()->delete();
            }

            // Создаем новую запись аватара
            $user->avatar()->create([
                'path' => $path,
            ]);

            return response()->json(['message' => 'Аватар успешно загружен', 'path' => $path], 200);
        }

        return response()->json(['message' => 'Файл не был загружен'], 400);
    }
}
