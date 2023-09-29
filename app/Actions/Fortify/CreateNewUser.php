<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Http\UploadedFile;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, mixed>  $input
     * @return User
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'role_id' => ['required', 'integer', 'exists:roles,id'],
            'password' => $this->passwordRules(),
            'profile_picture' => ['nullable', 'image', 'max:1024'],

        ])->validate();

        // Check if the profile_picture key exists in the input array
        if (array_key_exists('profile_picture', $input)) {
            // Get the file from the input array
            $file = $input['profile_picture'];

            // Get the original file name from the file
            $fileName = $file->getClientOriginalName();

            // Move the file to the public/profile-pictures directory
            $file->move(public_path('profile-pictures'), $fileName);
        }

        // Create the user with the given data
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' => $input['role_id'],
            'profile_picture' => $fileName ?? 'profil.jpg',

        ]);

    }
}
