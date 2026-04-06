<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Impact;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImpactPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Impact');
    }

    public function view(AuthUser $authUser, Impact $impact): bool
    {
        return $authUser->can('View:Impact');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Impact');
    }

    public function update(AuthUser $authUser, Impact $impact): bool
    {
        return $authUser->can('Update:Impact');
    }

    public function delete(AuthUser $authUser, Impact $impact): bool
    {
        return $authUser->can('Delete:Impact');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Impact');
    }

    public function restore(AuthUser $authUser, Impact $impact): bool
    {
        return $authUser->can('Restore:Impact');
    }

    public function forceDelete(AuthUser $authUser, Impact $impact): bool
    {
        return $authUser->can('ForceDelete:Impact');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Impact');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Impact');
    }

    public function replicate(AuthUser $authUser, Impact $impact): bool
    {
        return $authUser->can('Replicate:Impact');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Impact');
    }

}