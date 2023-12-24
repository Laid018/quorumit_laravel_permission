<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display all permission
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $permissions = Permission::latest()->paginate(10);

        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show form for creating permission
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $permissions = Permission::all();
        return view('permissions.create', compact('permissions'));
    }

    /**
     * Store a newly created permission
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $request->validate([
            "name" => "required|unique:permissions,name",
        ]);
        Permission::create($request->only('name'));

        return redirect()->route('permissions.index')
            ->withSuccess(__('Permission created successfully.'));
    }

    /**
     * Show permission data
     * 
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(int $id) 
    {
        $permission = Permission::find($id);
        return view('permissions.show', [
            'permission' => $permission
        ]);
    }

    /**
     * Edit permission data
     * 
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id) 
    {
        $permission = Permission::find($id);
        $permissions = Permission::all();

        return view('permissions.edit', [
            'permission' => $permission,
            'permissions' => $permissions,
        ]);
    }

    /**
     * Update permission data
     * 
     * @param int $id
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, Request $request) 
    {
        $request->validate(['name' => 'required']);
        $permission = Permission::find($id);
        $permission->update($request->all());

        return redirect()->route('permissions.index')
            ->withSuccess(__('Permission updated successfully.'));
    }

    /**
     * Delete permission data
     * 
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id) 
    {
        $permission = Permission::findById($id);
        $permission->delete();

        return redirect()->route('permissions.index')
            ->withSuccess(__('Permission deleted successfully.'));
    }
}
