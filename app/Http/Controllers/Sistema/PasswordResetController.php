<?php

namespace App\Http\Controllers\Sistema;

use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    protected $usuario;

    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    // Exibe o formulário de resetar a senha
    public function showForgetForm()
    {
        return view('sistema.password.forget-password');
    }

    public function postForgetForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:usuarios',
        ], [
            'email.required' => 'O campo de e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de e-mail válido.',
            'email.exists' => 'Este e-mail não está registrado em nosso sistema.',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send("sistema.emails.forget-password", ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        return redirect()->route("password.forget")
            ->with("success", "Nós enviamos um email para resetar sua senha.");
    }

    public function resetPassword($token)
    {
        return view('sistema.password.new-password', compact('token'));
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:6",
            "token" => "required"
        ], [
            'email.required' => 'O campo de e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de e-mail válido.',
            'password.required' => 'O campo de senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres.',
            'token.required' => 'O token é obrigatório.',
        ]);

        $resetPassword = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$resetPassword) {
            return redirect()->route("password.reset")->with("error", "Token inválido");
        }

        $this->usuario->where("email", $request->email)
            ->update(["password" => Hash::make($request->password)]);

        DB::table('password_resets')
            ->where('email', $request->email)
            ->delete();

        return redirect()->route("login")
            ->with("success", "Sua senha foi redefinida com sucesso. Faça login com sua nova senha.");
    }
}
