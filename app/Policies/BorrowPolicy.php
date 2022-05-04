<?php

namespace App\Policies;

use App\Models\Borrow;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BorrowPolicy
{
    use HandlesAuthorization;

    public function access(User $user, Borrow $borrow)
    {
        return $user->id == $borrow->return_managed_by||$user->id==$borrow->request_managed_by;
    }
}
