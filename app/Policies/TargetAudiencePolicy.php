<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\TargetAudience;
use Illuminate\Auth\Access\HandlesAuthorization;

class TargetAudiencePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:TargetAudience');
    }

    public function view(AuthUser $authUser, TargetAudience $targetAudience): bool
    {
        return $authUser->can('View:TargetAudience');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:TargetAudience');
    }

    public function update(AuthUser $authUser, TargetAudience $targetAudience): bool
    {
        return $authUser->can('Update:TargetAudience');
    }

    public function delete(AuthUser $authUser, TargetAudience $targetAudience): bool
    {
        return $authUser->can('Delete:TargetAudience');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:TargetAudience');
    }

    public function restore(AuthUser $authUser, TargetAudience $targetAudience): bool
    {
        return $authUser->can('Restore:TargetAudience');
    }

    public function forceDelete(AuthUser $authUser, TargetAudience $targetAudience): bool
    {
        return $authUser->can('ForceDelete:TargetAudience');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:TargetAudience');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:TargetAudience');
    }

    public function replicate(AuthUser $authUser, TargetAudience $targetAudience): bool
    {
        return $authUser->can('Replicate:TargetAudience');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:TargetAudience');
    }

}