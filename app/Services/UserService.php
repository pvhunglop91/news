<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * @var $userRepository
     */
    protected $userRepository;
    /**
     * UserService constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get all user.
     *
     * @return String
     */
    public function all()
    {
        return $this->userRepository->all();
    }

    public function findOrFail($id)
    {
        return $this->userRepository->findOrFail($id);
    }

    public function create($request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user = $this->userRepository->create($data);
        if (!empty(request()->role_id)) {
            $user->roles()->attach($data['role_id']);
        }
        return $user;
    }

    public function update($request, $id)
    {
        $user = $this->userRepository->findOrFail($id);
        $data = $request->all();
        if (isset($request->changePassword)) {
            $data['password'] = Hash::make($request->password);
        }
        $this->userRepository->update($data, $id);

        if (!empty(request()->role_id)) {
            $user->roles()->sync($data['role_id']);
        }
        return $user;
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }

}
