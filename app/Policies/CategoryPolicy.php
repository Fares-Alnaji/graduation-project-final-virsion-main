<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\admin;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     * @param $category
     * @return bool
     */
    public function viewAny(admin $admin)
    {
        return $admin->hasPermissionTo('Read-Categories')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can view the model.
     * @param $category
     * @param Category $category
     * @return bool
     */
    public function view(admin $admin, Category $category)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     * @param $category
     * @return bool
     */
    public function create(admin $admin)
    {
        return $admin->hasPermissionTo('Create-Category')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can update the model.
     * @param $category
     * @param Category $category
     * @return bool
     */
    public function update(admin $admin, Category $category)
    {
        return $admin->hasPermissionTo('Update-Category')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can delete the model.
     * @param $category
     * @return bool
     */
    public function delete(admin $admin, Category $category)
    {
        return $admin->hasPermissionTo('Delete-Category')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can restore the model.
     * @param $category
     * @param Category $category
     * @return bool
     */
    public function restore(admin $admin, Category $category)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     * @param $category
     * @param Category $category
     * @return bool
     */
    public function forceDelete(admin $admin, Category $category)
    {
        //
    }
}
