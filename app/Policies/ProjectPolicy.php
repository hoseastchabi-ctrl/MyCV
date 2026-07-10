<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\Resume;
use App\Models\User;

class ProjectPolicy
{
    public function viewAny(User $user, Resume $resume): bool
    {
        return $resume->user_id === $user->id;
    }

    public function create(User $user, Resume $resume): bool
    {
        return $resume->user_id === $user->id;
    }

    public function update(User $user, Project $project): bool
    {
        return $project->resume->user_id === $user->id;
    }

    public function delete(User $user, Project $project): bool
    {
        return $project->resume->user_id === $user->id;
    }
}