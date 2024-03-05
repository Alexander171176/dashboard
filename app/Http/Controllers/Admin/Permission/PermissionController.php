<?php

namespace App\Http\Controllers\Admin\Permission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Permission\CreatePermissionRequest;
use App\Http\Resources\Admin\Permission\PermissionResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $permissions = Permission::all();
        $permissionsCount = DB::table('permissions')->count();

        return Inertia::render('Admin/Permissions/Index', [
            'permissions' => $permissions,
            'permissionsCount' => $permissionsCount,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePermissionRequest $request): Redirectresponse
    {
        Permission::create($request->validated());
        return to_route('permissions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Permissions/Create');
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
        $permission = Permission::findById($id);
        return Inertia::render('Admin/Permissions/Edit', [
            'permission' => new PermissionResource($permission)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreatePermissionRequest $request, string $id): Redirectresponse
    {
        $permission = Permission::findById($id);
        $permission->update($request->validated());
        return to_route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $permission = Permission::findById($id);
        $permission->delete();
        return back();
    }
}
