<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class subsPolocy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function subscriber_only($user){
        if($user->subs == 1){
            return true;
        }else{
            return false;
        }
    }
}
