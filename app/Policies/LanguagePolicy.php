<?php

namespace App\Policies;

use App\Models\Language;
use App\Models\Resume;
use App\Models\User;

class LanguagePolicy
{
    public function viewAny(User $user, Resume $resume): bool
    {
        return $resume->user_id === $user->id;
    }

    public function create(User $user, Resume $resume): bool
    {
        return $resume->user_id === $user->id;
    }

    public function update(User $user, Language $language): bool
    {
        return $language->resume->user_id === $user->id;
    }

    public function delete(User $user, Language $language): bool
    {
        return $language->resume->user_id === $user->id;
    }
}