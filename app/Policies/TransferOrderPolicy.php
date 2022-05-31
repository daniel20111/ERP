<?php

namespace App\Policies;

use App\Models\TransferOrder;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransferOrderPolicy
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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TransferOrder  $transferOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, TransferOrder $transferOrder)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TransferOrder  $transferOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, TransferOrder $transferOrder)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TransferOrder  $transferOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, TransferOrder $transferOrder)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TransferOrder  $transferOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, TransferOrder $transferOrder)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TransferOrder  $transferOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, TransferOrder $transferOrder)
    {
        //
    }
}
