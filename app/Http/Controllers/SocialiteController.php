<?php

namespace App\Http\Controllers;

use App\Models\Google;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            // Google user object dari google
            $userFromGoogle = Socialite::driver('google')->user();

            // Ambil user dari database berdasarkan google user id
            $userFromDatabase = Google::where('google_id', $userFromGoogle->getId())->first();

            // Jika tidak ada user, maka buat user baru
            if ($userFromDatabase) {
                Auth::login($userFromDatabase);
                return redirect()->intended('/');
            } else {
                $newUser = Google::updateOrCreate(['email' => $userFromGoogle->email], [
                    'google_id' => $userFromGoogle->getId(),
                    'name' => $userFromGoogle->getName(),
                ]);
                Auth::login($newUser);

                session()->regenerate();
                return redirect('/home');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
