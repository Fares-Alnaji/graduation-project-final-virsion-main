<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\admin;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     * @param $admin
     * @return bool
     */
    public function viewAny(admin $admin)
    {
        return $admin->hasPermissionTo('Read-Products')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can view the model.
     *  @param $admin
     * @param Product $product
     * @return bool
     */
    public function view(admin $admin, Product $product)
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
        return $admin->hasPermissionTo('Create-Product')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can update the model.
     *  @param $admin
     * @param Product $product
     * @return bool
     */
    public function update(admin $admin, Product $product)
    {
        return $admin->hasPermissionTo('Update-Product')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can delete the model.
     * @param $admin
     * @return Product $product
     */
    public function delete(admin $admin, Product $product)
    {
        return $admin->hasPermissionTo('Delete-Product')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can restore the model.
     *  @param $admin
     * @param Product $product
     * @return bool
     */
    public function restore(admin $admin, Product $product)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     * @param $admin
     * @param Product $product
     * @return bool
     */
    public function forceDelete(admin $admin, Product $product)
    {
        //
    }
}
