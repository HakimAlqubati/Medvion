<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\AcademicHeader;
use Illuminate\Auth\Access\HandlesAuthorization;

class AcademicHeaderPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:AcademicHeader');
    }

    public function view(AuthUser $authUser, AcademicHeader $academicHeader): bool
    {
        return $authUser->can('View:AcademicHeader');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:AcademicHeader');
    }

    public function update(AuthUser $authUser, AcademicHeader $academicHeader): bool
    {
        return $authUser->can('Update:AcademicHeader');
    }

    public function delete(AuthUser $authUser, AcademicHeader $academicHeader): bool
    {
        return $authUser->can('Delete:AcademicHeader');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:AcademicHeader');
    }

    public function restore(AuthUser $authUser, AcademicHeader $academicHeader): bool
    {
        return $authUser->can('Restore:AcademicHeader');
    }

    public function forceDelete(AuthUser $authUser, AcademicHeader $academicHeader): bool
    {
        return $authUser->can('ForceDelete:AcademicHeader');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:AcademicHeader');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:AcademicHeader');
    }

    public function replicate(AuthUser $authUser, AcademicHeader $academicHeader): bool
    {
        return $authUser->can('Replicate:AcademicHeader');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:AcademicHeader');
    }

}