<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\EditMyselfRequest;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Services\RoleService;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    protected $roleService;

    public function __construct(UserService $userService, RoleService $roleService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    public function getList()
    {
        $user = $this->userService->all();
        return view('Admin.user.list', compact('user'));
    }

    public function create()
    {
        $role = $this->roleService->all();
        return view('Admin.user.add', compact('role'));
    }

    public function store(StoreUserRequest $request)
    {
        $this->userService->create($request);
        return redirect()->route('user.create')->with('message', 'Create user success !');
    }

    public function edit($id)
    {
        $role = $this->roleService->all();
        $user = $this->userService->findOrFail($id);
        return view('Admin.user.edit', compact('user', 'role'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $this->userService->update($request, $id);
        return redirect()->route('user.list')->with('message', 'Update user success');
    }

    public function destroy($id)
    {
        $this->userService->delete($id);
        return redirect()->route('user.list')->with('message', 'Delete user success');
    }

    public function editMyself($id)
    {
        $user = $this->userService->findOrFail($id);
        return view('Admin.user.editMyself', compact('user'));
    }

    public function updateMyself(EditMyselfRequest $request, $id)
    {
        $this->userService->update($request, $id);
        return redirect()->back()->with('message', 'Update user success');
    }

    public function getUser()
    {
        return view('pages.user');
    }

    public function postUser(EditMyselfRequest $request, $id)
    {
        $this->userService->update($request, $id);
        return redirect('homepage')->with('message', 'Update success !');
    }
}
