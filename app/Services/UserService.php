<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class UserService
{
    public function getProfileImage($user)
    {
        $imagePath = 'public/img/usuarios/' . $user->imagem;
        if ($user->imagem && Storage::exists($imagePath)) {
            return 'storage/img/usuarios/' . $user->imagem;
        } else {
            return 'assets/media/avatars/blank.png';
        }
    }
}