<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\admin;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     *  @param $blog
     * @return bool
     */
    public function viewAny(admin $admin)
    {
        return $admin->hasPermissionTo('Read-Blogs')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can view the model.
     *  @param $blog
     * @param Blog $blog
     * @return bool
     */
    public function view(admin $admin, Blog $blog)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *   @param $blog
     * @return bool
     */
    public function create(admin $admin)
    {
        return $admin->hasPermissionTo('Create-Blog')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can update the model.
     *  @param $blog
     * @param Blog $blog
     * @return bool
     */
    public function update(admin $admin, Blog $blog)
    {
        return $admin->hasPermissionTo('Update-Blog')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can delete the model.
     * @param $blog
     * @return bool
     */
    public function delete(admin $admin, Blog $blog)
    {
        return $admin->hasPermissionTo('Delete-Blog')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can restore the model.
     *  @param $blog
     * @param Blog $blog
     * @return bool
     */
    public function restore(admin $admin, Blog $blog)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *  @param $blog
     * @param Blog $blog
     * @return bool
     */
    public function forceDelete(admin $admin, Blog $blog)
    {
        //
    }
}
