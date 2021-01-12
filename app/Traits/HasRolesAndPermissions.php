<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\Permission;
use App\Models\Attendance;
trait HasRolesAndPermissions
{
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_roles');
    }

    /**
     * @return mixed
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'users_permissions');
    }

    /*public function attendances()
    {
        return $this->belongsToMany(Attendance::class,'users_attendances');
    }*/

    public function hasRole($role ) {
        //foreach ($roles as $role) {
            if ($this->roles->contains('name', $role)) {
                return true;
            }
        //}
        return false;
    }

    protected function hasPermission($permission){
        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }

    protected function hasPermissionTo($permission){
       return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    public function hasPermissionThroughRole($permission){
        foreach ($permission->roles as $role){
            if($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    protected function getAllPermissions(array $permissions){
        return Permission::whereIn('slug',$permissions)->get();
    }

    public function givePermissionsTo(... $permissions){
        $permissions = $this->getAllPermissions($permissions);
        if($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    public function deletePermissions(... $permissions ){
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }

    public function refreshPermissions(... $permissions ){
        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    }

}