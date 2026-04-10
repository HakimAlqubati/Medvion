<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\SurveySubmission;
use Illuminate\Auth\Access\HandlesAuthorization;

class SurveySubmissionPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:SurveySubmission');
    }

    public function view(AuthUser $authUser, SurveySubmission $surveySubmission): bool
    {
        return $authUser->can('View:SurveySubmission');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:SurveySubmission');
    }

    public function update(AuthUser $authUser, SurveySubmission $surveySubmission): bool
    {
        return $authUser->can('Update:SurveySubmission');
    }

    public function delete(AuthUser $authUser, SurveySubmission $surveySubmission): bool
    {
        return $authUser->can('Delete:SurveySubmission');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:SurveySubmission');
    }

    public function restore(AuthUser $authUser, SurveySubmission $surveySubmission): bool
    {
        return $authUser->can('Restore:SurveySubmission');
    }

    public function forceDelete(AuthUser $authUser, SurveySubmission $surveySubmission): bool
    {
        return $authUser->can('ForceDelete:SurveySubmission');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:SurveySubmission');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:SurveySubmission');
    }

    public function replicate(AuthUser $authUser, SurveySubmission $surveySubmission): bool
    {
        return $authUser->can('Replicate:SurveySubmission');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:SurveySubmission');
    }

}