<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Role;
use Gate;
class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function grant(User $currentUser, Role $role){
        if (Gate::denies('角色授权')) {
            return false;
        }
        return !$currentUser->roles->contains('id',$role->id)&&($role->id!=1);
    }
}
