<?php

namespace App\Services;

use App\Repositories\CustomAuthRepository;
use Illuminate\Support\Facades\Hash;

class CustomAuthService
{
    protected $customAuthRepository;

    public function __construct(CustomAuthRepository $customAuthRepository)
    {
        $this->customAuthRepository = $customAuthRepository;
    }

    public function create($dataLogin)
    {
        $data = [
            'name' => $dataLogin['name'],
            'email' => $dataLogin['email'],
            'password' => Hash::make($dataLogin['password'])
        ];
        return $this->customAuthRepository->create($data);
    }

}
