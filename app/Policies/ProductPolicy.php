<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;
    
    public function create(User $user)
    {
        return true; // further logic could be added here given time
    }

    public function delete(User $user)
    {
        return true; // further logic could be added here given time
    }
}
