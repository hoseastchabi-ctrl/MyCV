<?php

namespace App\Policies;

use App\Models\Resume;
use App\Models\Skill;
use App\Models\User;

class SkillPolicy
{
    public function viewAny(User $user, Resume $resume): bool
    {
        return $resume->user_id === $user->id;
    }

    public function create(User $user, Resume $resume): bool
    {
        return $resume->user_id === $user->id;
    }

    public function update(User $user, Skill $skill): bool
    {
        return $skill->resume->user_id === $user->id;
    }

    public function delete(User $user, Skill $skill): bool
    {
        return $skill->resume->user_id === $user->id;
    }
}