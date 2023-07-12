<?php

namespace App\Policies;

use App\Models\Slider;
use App\Models\admin;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class SliderPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     * @param $slider
     * @return bool
     */
    public function viewAny(admin $admin)
    {
        return $admin->hasPermissionTo('Read-Sliders')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can view the model.
     *  @param $slider
     * @param Slider $slider
     * @return bool
     */
    public function view(admin $admin, Slider $slider)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     * @param $slider
     * @return bool
     */
    public function create(admin $admin)
    {
        return $admin->hasPermissionTo('Create-Slider')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can update the model.
     *  @param $slider
     * @param Slider $slider
     * @return bool
     */
    public function update(admin $admin, Slider $slider)
    {
        return $admin->hasPermissionTo('Update-Slider')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can delete the model.
     * @param $slider
     * @return bool
     */
    public function delete(admin $admin, Slider $slider)
    {
        return $admin->hasPermissionTo('Delete-Slider')
        ? $this->allow()
        : $this->deny();
    }

    /**
     * Determine whether the user can restore the model.
     *  @param $slider
     * @param Slider $slider
     * @return bool
     */
    public function restore(admin $admin, Slider $slider)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *  @param $slider
     * @param Slider $slider
     * @return bool
     */
    public function forceDelete(admin $admin, Slider $slider)
    {
        //
    }
}
