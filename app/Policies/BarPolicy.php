<?php

namespace App\Policies;

use App\Models\Bar;
use App\Models\User;

class BarPolicy
{
    public function view(User $user, Bar $bar): bool
    {
        return $bar->owner_user_id === $user->id;
    }
}
