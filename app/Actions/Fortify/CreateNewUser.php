<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Coordinator;
use App\Models\Lider;
use App\Models\Voter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'dni' => ['required', 'numeric','unique:users,dni'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return $user = User::create([
            'firstname' => strtoupper($input['firstname']),
            'lastname' => strtoupper($input['lastname']),
            'dni' => $input['dni'],
            'email' => $input['email'],
            'role' => 'USER',
            'status' => 'ACTIVE',
            'password' => Hash::make($input['password']),
        ]);

    }
}
