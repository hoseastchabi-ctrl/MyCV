<?php

namespace App\Policies;

use App\Models\Education;
use App\Models\Resume;
use App\Models\User;

class EducationPolicy
{
    public function viewAny(User $user, Resume $resume): bool
    {
        return $resume->user_id === $user->id;
    }

    public function create(User $user, Resume $resume): bool
    {
        return $resume->user_id === $user->id;
    }

    public function update(User $user, Education $education): bool
    {
        return $education->resume->user_id === $user->id;
    }

    public function delete(User $user, Education $education): bool
    {
        return $education->resume->user_id === $user->id;
    }
}