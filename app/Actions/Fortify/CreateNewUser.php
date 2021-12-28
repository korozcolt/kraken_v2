<?php

namespace App\Actions\Fortify;

use App\Models\User;
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
            'phone' => ['required', 'numeric'],
            'phone_two' => ['numeric','nullable'],
            'address' => ['string','nullable'],
            'birthdate' => ['date','nullable'],
            'son_number' => ['numeric','nullable'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'firstname' => $input['firstname'],
            'lastname' => $input['lastname'],
            'dni' => $input['dni'],
            'phone' => $input['phone'],
            'phone_two' => $input['phone_two'],
            'address' => $input['address'],
            'birthdate' => $input['birthdate'],
            'son_number' => $input['son_number'],
            'email' => $input['email'],
            'role' => 'USER',
            'status' => 'ACTIVE',
            'password' => Hash::make($input['password']),
        
        ]);
    }
}
