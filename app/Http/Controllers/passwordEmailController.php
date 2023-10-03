<?php

namespace App\Http\Controllers;

use App\Mail\emailPassword;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class passwordEmailController extends Controller
{
    public function formPasswordForgot()
    {
        return view('auth.formpasswordforgot');
    }

    public function viewPasswordForgot()
    {
        return view('auth.passwordforgot');
    }

    public function passwordForgot(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email:rfc,dns|max:255',
            'password' => 'required|string|min:4',
        ]);
        //verifier si l'email existe dans la base de données
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('message1', 'Cet email n\'existe pas');
        }
        //verifier si le token existe dans la base de données
        $token = DB::table('password_reset_tokens')->where('email', $request->email)->first();
        if (!$token) {
            return redirect()->back()->with('message2', 'Vous n\'avez pas l\'autorisation de changer le mot de passe');
        }
        //verifier si le token est valide
        if (Carbon::parse($token->created_at)->addMinutes(720)->isPast()) {
            return redirect()->back()->with('message3', 'Votre autorisation a expiré'); //720 minutes = 12 heures
        }
        //mettre à jour le mot de passe
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        //supprimer le token
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();
        //rediriger l'utilisateur
        return redirect()->route('login')->with('message4', 'Votre mot de passe a été mis à jour');
    }

    public function emailPassword(Request $request)
    {


        $request->validate([

            'email' => 'required|string|email:rfc,dns|max:255',

        ]);
        //verifier si l'email existe dans la base de données
        $user = \App\Models\User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('message2', 'Cet email n\'existe pas');
        }
        //verifier si l'email existe dans la table password_reset_tokens
        $email = DB::table('password_reset_tokens')->where('email', $request->email)->first();
        if ($email) {
            return redirect()->back()->with('message5', 'Un email de confirmation vous a déjà été envoyé');
        }

        if ($user) {
            //generer un token
            $token = Str::random(60);
            //enregistrer le token dans la base de données
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
            //envoyer le mail
            $mailData = [
                'lien' => 'http://localhost:8000/form?token=' . $token,
                'nom' => $user->name,
            ];

            Mail::to($request->email)->send(new emailPassword($mailData));

           return redirect()->back()->with('message', 'Un email de confirmation vous a été envoyé');
        }
    }
}
