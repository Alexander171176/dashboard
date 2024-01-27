<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Resources\RoleResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():Response
    {
        $roles = Role::all();
        $rolesCount = DB::table('roles')->count();

        return Inertia::render('Admin/Roles/Index', [
            'roles' => $roles,
            'rolesCount' => $rolesCount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():Response
    {
        return Inertia::render('Admin/Roles/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRoleRequest $request)
    {
        Role::create($request->validated());
        return to_route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        $role = Role::findById($id);
        return Inertia::render('Admin/Roles/Edit', [
            'role' => new RoleResource($role)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateRoleRequest $request, string $id)
    {
        $role = Role::findById($id);
        $role->update($request->validated());
        return to_route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $role = Role::findById($id);
        $role->delete();
        return back();
    }
}
