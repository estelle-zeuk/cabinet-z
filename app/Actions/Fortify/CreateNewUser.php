<?php

namespace App\Actions\Fortify;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Repositories\CompanyRepository;
use App\Repositories\UserRepository;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    private $companyRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * CreateNewUser constructor.
     * @param StatefulGuard $guard
     * @param CompanyRepository $companyRepository
     * @param UserRepository $userRepository
     */
    public function __construct(StatefulGuard $guard, CompanyRepository $companyRepository, UserRepository $userRepository)
    {
        $this->guard = $guard;
        $this->companyRepository = $companyRepository;
        $this->userRepository = $userRepository;
    }
    
    public function create(array $input)
    {
            // Inputs validations
            $message = [
                        'name.required' => __('validation.required',['attribute'=>__('labels.name')]),
                        'username.required' => __('validation.required',['attribute'=>__('labels.username')]),
                        'email.required' => __('validation.required',['attribute'=>__('labels.email')]),
                    ];

               Validator::make($input, [
                    'username' => ['required','string','max:255','unique:users'],
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => $this->passwordRules(),
                ],$message);

            return $this->userRepository->store([
                'name' => $input['name'],
                'username' => $input['username'],
                'category' => 1,
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);
    }
}
