<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class GoogleAuthController extends Controller
{
    /**
     * Redirect the user to Google OAuth page.
     */
    public function redirectToGoogle(): RedirectResponse
    {
        if (! class_exists('Laravel\Socialite\Facades\Socialite')) {
            return redirect()->route('register')->with('error', 'يرجى تثبيت حزمة Socialite عبر الأمر: composer require laravel/socialite');
        }

        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain user information from Google and log them in or register them.
     */
    public function handleGoogleCallback(): RedirectResponse
    {
        if (! class_exists('Laravel\Socialite\Facades\Socialite')) {
            return redirect()->route('register')->with('error', 'يرجى تثبيت حزمة Socialite عبر الأمر: composer require laravel/socialite');
        }

        try {
            /** @var \Laravel\Socialite\Two\User $googleUser */
            $googleUser = Socialite::driver('google')->user();
        } catch (Throwable $e) {
            Log::error('Google Auth Callback Failed: ' . $e->getMessage());

            return redirect()->route('register')->with('error', __('register.google_error'));
        }

        try {
            $user = User::where('google_id', $googleUser->getId())
                ->orWhere('email', $googleUser->getEmail())
                ->first();

            if ($user) {
                $updates = [];

                if (! $user->google_id) {
                    $updates['google_id'] = $googleUser->getId();
                }

                if (! $user->avatar && $googleUser->getAvatar()) {
                    $updates['avatar'] = $googleUser->getAvatar();
                }

                if (! $user->email_verified_at) {
                    $updates['email_verified_at'] = now();
                }

                if (! empty($updates)) {
                    $user->update($updates);
                }
            } else {
                $user = User::create([
                    'name'              => $googleUser->getName() ?: ($googleUser->getNickname() ?: 'User'),
                    'email'             => $googleUser->getEmail(),
                    'google_id'         => $googleUser->getId(),
                    'avatar'            => $googleUser->getAvatar(),
                    'user_type'         => UserTypeEnum::STUDENT,
                    'password'          => Hash::make(Str::random(32)),
                    'email_verified_at' => now(),
                ]);

                event(new Registered($user));
            }

            Auth::login($user, true);

            $redirectUrl = session()->pull('url.intended', route('courses.index'));

            return redirect($redirectUrl);

        } catch (Throwable $e) {
            Log::error('Google User Processing Failed: ' . $e->getMessage());

            return redirect()->route('register')->with('error', __('register.google_error'));
        }
    }
}
