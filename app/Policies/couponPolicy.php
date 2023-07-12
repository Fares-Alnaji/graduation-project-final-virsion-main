<?php

namespace App\Policies;

use App\Models\admin;
use App\Models\coupon;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class couponPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     *  @param $coupon
     * @return bool
     */
    public function viewAny(admin $admin)
    {
        return $admin->hasPermissionTo('Read-coupons')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can view the model.
     *  @param $coupon
     * @param coupon $coupon
     * @return bool
     */
    public function view(admin $admin, coupon $coupon)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     * @param $coupon
     * @return bool
     */
    public function create(admin $admin)
    {
        return $admin->hasPermissionTo('Create-coupon')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can update the model.
     *  @param $coupon
     * @param coupon $coupon
     * @return bool
     */
    public function update(admin $admin, coupon $coupon)
    {
        return $admin->hasPermissionTo('Update-coupon')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can delete the model.
     * @param $coupon
     * @return bool
     */
    public function delete(admin $admin, coupon $coupon)
    {
        return $admin->hasPermissionTo('Delete-coupon')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can restore the model.
     *  @param $coupon
     * @param coupon $coupon
     * @return bool
     */
    public function restore(admin $admin, coupon $coupon)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     * @param $coupon
     * @param coupon $coupon
     * @return bool
     */
    public function forceDelete(admin $admin, coupon $coupon)
    {
        //
    }
}
