<?php

namespace App\Services;

use Spatie\Permission\Models\Permission;

class PermissionService
{
    public function get(array $request)
    {
        $permissons = Permission::when($request['name'], fn ($q) => $q->search('name', $request['name']))
            ->orderBy('name')
            ->paginate();

        return $permissons;
    }

    public function store(array $data): Permission
    {
        return Permission::create($data);
    }

    public function update(Permission $permission, array $data): Permission
    {
        $permission->update($data);

        return $permission->refresh();
    }

    public function delete(Permission $permission): bool
    {
        return $permission->delete();
    }

    public function withoutPagination()
    {
        return Permission::orderBy('name')->get();
    }
}
