<?php

namespace App\Services;

use App\Repositories\RoleRepository;
use Illuminate\Support\Facades\Auth;

class RoleService
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function all()
    {
        return $this->roleRepository->all();
    }

    public function findOrFail($id)
    {
        return $this->roleRepository->findOrFail($id);
    }

    public function create($request)
    {
        $dataCreate = $request->all();
        $role = $this->roleRepository->create($dataCreate);
        if (!empty($request->permission)) {
            $dataCreate['permission'][] = config('constants.permission.login');
            $role->permissions()->attach($dataCreate['permission']);
        }
        return $role;
    }

    public function update($request, $id)
    {
        $dataUpdate = $request->all();
        $this->roleRepository->update($dataUpdate, $id);
        $role = $this->roleRepository->findOrFail($id);
        if (!empty($request->permission)) {
            $role->permissions()->sync($dataUpdate['permission']);
        }
        return $role;
    }

    public function delete($id)
    {
        return $this->roleRepository->delete($id);;
    }
}
