<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Qualification;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class QualificationPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Qualification');
    }

    public function view(AuthUser $authUser, Qualification $qualification): bool
    {
        return $authUser->can('View:Qualification');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Qualification');
    }

    public function update(AuthUser $authUser, Qualification $qualification): bool
    {
        return $authUser->can('Update:Qualification');
    }

    public function delete(AuthUser $authUser, Qualification $qualification): bool
    {
        return $authUser->can('Delete:Qualification');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Qualification');
    }

    public function restore(AuthUser $authUser, Qualification $qualification): bool
    {
        return $authUser->can('Restore:Qualification');
    }

    public function forceDelete(AuthUser $authUser, Qualification $qualification): bool
    {
        return $authUser->can('ForceDelete:Qualification');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Qualification');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Qualification');
    }

    public function replicate(AuthUser $authUser, Qualification $qualification): bool
    {
        return $authUser->can('Replicate:Qualification');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Qualification');
    }
}
