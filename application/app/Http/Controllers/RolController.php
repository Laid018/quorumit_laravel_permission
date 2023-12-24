<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolController extends Controller
{
  /**
     * Display all roles
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $roles = Role::latest()->paginate(10);

        return view('roles.index', compact('roles'));
    }

    /**
     * Show form for creating rol
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created rol
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $request->validate([
            "name" => "required|unique:roles,name",
            "permission" => "required"
        ]);

        $role = Role::create(['name' => $request->get('name')]);
        $role->syncPermissions($request->get('permission'));

        return redirect()->route('roles.index')
            ->withSuccess(__('Rol created successfully.'));
    }

    /**
     * Show rol data
     * 
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(int $id) 
    {
        $rol = Role::find($id);
        $rolePermissions = $rol->permissions;
        return view('roles.show', [
            'role' => $rol,
            'rolePermissions' => $rolePermissions
        ]);
    }

    /**
     * Edit rol data
     * 
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id) 
    {
        $role = Role::find($id);
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        $permissions = Permission::all();

        return view('roles.edit', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions,
            'roles' => Role::latest()->get()
        ]);
    }

    /**
     * Update rol data
     * 
     * @param int $id
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, Request $request) 
    {
        $request->validate([
            "name" => "required|unique:roles,name",
            "permission" => "required"
        ]);

        $role = Role::find($id);
        $role->update($request->only('name'));
        $role->syncPermissions($request->get('permission'));

        return redirect()->route('roles.index')
            ->withSuccess(__('Rol updated successfully.'));
    }

    /**
     * Delete rol data
     * 
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id) 
    {
        $role = Role::findById($id);
        $role->delete();

        return redirect()->route('roles.index')
            ->withSuccess(__('Rol deleted successfully.'));
    }
}
