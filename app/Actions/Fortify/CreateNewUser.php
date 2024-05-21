<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Patient;
use App\Models\Payment;
use Carbon\Carbon;
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
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'national_id' => ['required', 'string', 'max:255', 'unique:users'],
            'trans_ID' => ['required', 'string', 'max:255', 'unique:payments'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['fname']." ".$input['lname'],
            'user_type' => 'Patient',
            'national_id' => $input['national_id'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $patient = Patient::create([
            'first_name' => $input['fname'],
            'last_name' => $input['lname'],
            'dob' => $input['dob'],
            'gender' => $input['gender'],
            'national_id' => $input['national_id'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'scheme_type' => $input['plan'],
            'last_pay_date' => Carbon::today(),
        ]);

        $payment = Payment::create([
            'user_id' => $input['national_id'],
            'type' =>   $input['payment'],
            'reason' =>    $input['plan']. " subscription plan",
            'amount' => $input['amount'],
            'trans_ID' => $input['trans_ID'],
        ]);

        return $user;
    }
}
