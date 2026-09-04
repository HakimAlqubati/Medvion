<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Handles the business logic for user registration.
 */
class UserRegistrationService
{
    /**
     * Create a new user from the validated registration data, fire the
     * Registered event (which triggers email verification if configured),
     * log the user in, and return the newly-created User instance.
     *
     * @param  array<string, mixed>  $data
     */
    public function register(array $data): User
    {
        $spec = null;
        if (! empty($data['specialty'])) {
            $spec = is_numeric($data['specialty'])
                ? \App\Models\Specialization::find($data['specialty'])
                : \App\Models\Specialization::where('name->ar', $data['specialty'])->orWhere('name->en', $data['specialty'])->first();
        }

        $qual = null;
        if (! empty($data['qualification'])) {
            $qual = is_numeric($data['qualification'])
                ? \App\Models\Qualification::find($data['qualification'])
                : \App\Models\Qualification::where('name->ar', $data['qualification'])->orWhere('name->en', $data['qualification'])->first();
        }

        /** @var User $user */
        $user = User::create([
            'name'              => $data['name'],
            'email'             => $data['email'],
            'password'          => Hash::make($data['password']),
            'phone'             => $data['phone']            ?? null,
            'city'              => $data['city']             ?? null,
            'address'           => $data['address']          ?? null,
            'specialization_id' => $spec?->id,
            'specialty'         => $spec ? ($spec->getTranslation('name', 'ar') ?: $spec->name) : ($data['specialty'] ?? null),
            'qualification_id'  => $qual?->id,
            'qualification'     => $qual ? ($qual->getTranslation('name', 'ar') ?: $qual->name) : ($data['qualification'] ?? null),
            'graduation_year'   => $data['graduation_year']  ?? null,
            'workplace'         => $data['workplace']        ?? null,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return $user;
    }
}
