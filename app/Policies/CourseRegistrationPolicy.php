<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\CourseRegistration;
use Illuminate\Auth\Access\HandlesAuthorization;

class CourseRegistrationPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:CourseRegistration');
    }

    public function view(AuthUser $authUser, CourseRegistration $courseRegistration): bool
    {
        return $authUser->can('View:CourseRegistration');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:CourseRegistration');
    }

    public function update(AuthUser $authUser, CourseRegistration $courseRegistration): bool
    {
        return $authUser->can('Update:CourseRegistration');
    }

    public function delete(AuthUser $authUser, CourseRegistration $courseRegistration): bool
    {
        return $authUser->can('Delete:CourseRegistration');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:CourseRegistration');
    }

    public function restore(AuthUser $authUser, CourseRegistration $courseRegistration): bool
    {
        return $authUser->can('Restore:CourseRegistration');
    }

    public function forceDelete(AuthUser $authUser, CourseRegistration $courseRegistration): bool
    {
        return $authUser->can('ForceDelete:CourseRegistration');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:CourseRegistration');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:CourseRegistration');
    }

    public function replicate(AuthUser $authUser, CourseRegistration $courseRegistration): bool
    {
        return $authUser->can('Replicate:CourseRegistration');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:CourseRegistration');
    }

}