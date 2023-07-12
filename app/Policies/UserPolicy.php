<?php

namespace App\Policies;

use App\Models\User;
use App\Models\admin;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     * @param $user
     * @return bool
     */
    public function viewAny(admin $admin)
    {
        return $admin->hasPermissionTo('Read-Users')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can view the model.
     *  @param $user
     * @param User $user
     * @return bool
     */
    public function view(admin $admin, User $model)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *  @param $user
     * @return bool
     */
    public function create(admin $admin)
    {
        return $admin->hasPermissionTo('Create-User')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can update the model.
     * @param $user
     * @param User $user
     * @return bool
     */
    public function update(admin $admin, User $model)
    {
        return $admin->hasPermissionTo('Update-User')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can delete the model.
     *  @param $user
     * @param User $user
     */
    public function delete(admin $admin, User $model)
    {
        return $admin->hasPermissionTo('Delete-User')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can restore the model.
     *  @param $user
     * @param User $user
     * @return bool
     */
    public function restore(admin $admin, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *  @param $user
     * @param User $user
     * @return bool
     */
    public function forceDelete(admin $admin, User $model)
    {
        //
    }
}
