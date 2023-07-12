<?php

namespace App\Policies;

// use App\Models\Admin;
use App\Models\admin;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     * @param $admin
     * @return bool
     */
    public function viewAny(admin $admin)
    {
        return $admin->hasPermissionTo('Read-Admins')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can view the model.
     *  @param $admin
     * @param Admin $admin
     * @return bool
     */
    public function view(admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     * @param $admin
     * @return bool
     */
    public function create(admin $admin)
    {
        return $admin->hasPermissionTo('Create-Admin')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can update the model.
     *  @param $admin
     * @param Admin $admin
     * @return bool
     */
    public function update(admin $admin)
    {
        return $admin->hasPermissionTo('Update-Admin')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can delete the model.
     * @param $admin
     * @param Admin $admin
     */
    public function delete(admin $admin)
    {
        return $admin->hasPermissionTo('Delete-Admin')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can restore the model.
     * @param $admin
     * @param Admin $admin
     * @return bool
     */
    public function restore(admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *  @param $admin
     * @param Admin $admin
     * @return bool
     */
    public function forceDelete(admin $admin)
    {
        //
    }
}
