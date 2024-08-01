<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return $this->response('Authenticated successfully', 200, [
                'token' => $request->user()->createToken('product')->plainTextToken
            ]);
        }

        return $this->response('Unauthorized', 403);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->response('Token revoked', 200);
    }
}
