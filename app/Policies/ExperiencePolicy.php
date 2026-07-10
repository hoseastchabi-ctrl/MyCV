<?php

namespace App\Policies;

use App\Models\Experience;
use App\Models\Resume;
use App\Models\User;

class ExperiencePolicy
{
    public function viewAny(User $user, Resume $resume): bool
    {
        return $resume->user_id === $user->id;
    }

    public function create(User $user, Resume $resume): bool
    {
        return $resume->user_id === $user->id;
    }

    public function update(User $user, Experience $experience): bool
    {
        return $experience->resume->user_id === $user->id;
    }

    public function delete(User $user, Experience $experience): bool
    {
        return $experience->resume->user_id === $user->id;
    }
}