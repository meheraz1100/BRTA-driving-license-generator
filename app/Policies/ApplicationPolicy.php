<?php

namespace App\Policies;

use App\Models\Application;
use App\Models\User;

class ApplicationPolicy
{
    public function view(User $user, Application $application): bool
    {
        return $user->role === 'admin'
            || $application->user_id === $user->id;
    }
}