<?php

namespace App\Http\Controllers;

use App\Http\Requests\Roles\StoreRoleRequest;
use App\Http\Requests\Roles\UpdateRoleRequest;
use App\Services\PermissionService;
use App\Services\RoleService;

class RoleController extends Controller
{
    protected $roleService;

    protected $permissionService;

    public function __construct(RoleService $roleService, PermissionService $permissionService)
    {
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;
    }

    public function getList()
    {
        $role = $this->roleService->all();
        return view('Admin.role.list', compact('role'));
    }

    public function create()
    {
        $permissions = $this->permissionService->all();
        return view('Admin.role.add', compact('permissions'));
    }

    public function store(StoreRoleRequest $request)
    {
        $this->roleService->create($request);
        return redirect()->route('role.create')->with('message', 'Create role success !');
    }

    public function edit($id)
    {
        $role = $this->roleService->findOrFail($id);
        $permissions = $this->permissionService->all();
        return view('Admin.role.edit', compact('role', 'permissions'));
    }

    public function update(UpdateRoleRequest $request, $id)
    {
        $this->roleService->update($request, $id);
        return redirect()->route('role.list')->with('message', 'Update role success !');
    }

    public function destroy($id)
    {
        $this->roleService->delete($id);
        return redirect()->route('role.list')->with('message', 'Delete role success !');
    }
}
