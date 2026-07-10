<?php

namespace App\Policies;

use App\Models\Certification;
use App\Models\Resume;
use App\Models\User;

class CertificationPolicy
{
    public function viewAny(User $user, Resume $resume): bool
    {
        return $resume->user_id === $user->id;
    }

    public function create(User $user, Resume $resume): bool
    {
        return $resume->user_id === $user->id;
    }

    public function update(User $user, Certification $certification): bool
    {
        return $certification->resume->user_id === $user->id;
    }

    public function delete(User $user, Certification $certification): bool
    {
        return $certification->resume->user_id === $user->id;
    }
}