<?php

namespace App\Http\Controllers\Auth;

use App\Mail\PasswordResetConfirmationMail;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function show()
    {
        return view('admin.auth.forget-password');
    }

    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:users",
        ], [
            "email.required" => "O campo de e-mail é obrigatório.",
            "email.email" => "Por favor, insira um endereço de e-mail válido.",
            "email.exists" => "Este e-mail não está registrado em nosso sistema.",
        ]);

        $token = Str::random(64);

        $user = $this->user->where('email', '=', $request->email)->first();
        $user->remember_token = $token;
        $user->save();

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            ['token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::to($user->email)->send(new ResetPasswordMail($user));

        return redirect()->route("password.forget")
            ->with("success", "Nós enviamos um email para resetar sua senha.");
    }

    public function resetPassword($token)
    {
        return view('admin.auth.new-password', compact('token'));
    }

    public function resetStore(Request $request)
    {
        $request->validate([
            "password" => "required|min:6",
            "token" => "required"
        ], [
            "password.required" => "O campo de senha é obrigatório.",
            "password.min" => "A senha deve ter pelo menos 6 caracteres.",
            "token.required" => "O token é obrigatório.",
        ]);

        $user = $this->user->where("remember_token", $request->token)->first();

        if (!$user) {
            return redirect()->route("login")->with("error", __("Token Invalido."));
        }

        $user->update([
            "remember_token" => null,
            "password" => $request->password
        ]);

        DB::table('password_reset_tokens')
            ->where('email', '=', $user->email)
            ->delete();

        Mail::to($user->email)->send(new PasswordResetConfirmationMail($user));

        return redirect()->route("login")
            ->with("success", "Sua senha foi redefinida com sucesso. Faça login com sua nova senha.");
    }
}
