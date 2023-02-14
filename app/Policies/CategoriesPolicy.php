<?php

namespace App\Policies;

use App\Models\Categories;

use App\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class CategoriesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        $roleJson = $user->position->permissions;

        if (!empty($roleJson)) {
            $roleArr = json_decode($roleJson, true);

            $check = isRole($roleArr, 'categories');

            return $check;
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Categories $categories)
    {
        $roleJson = $user->position->permissions;

        if (!empty($roleJson)) {
            $roleArr = json_decode($roleJson, true);

            $check = isRole($roleArr, 'categories', 'edit');

            return $check;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        $roleJson = $user->position->permissions;

        if (!empty($roleJson)) {
            $roleArr = json_decode($roleJson, true);

            $check = isRole($roleArr, 'categories', 'add');

            return $check;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Categories $categories)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Categories $categories)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Categories $categories)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Categories $categories)
    {
        //
    }
}
