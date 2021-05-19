<?php

namespace App\Hateoas;

use App\User;
use GDebrauwer\Hateoas\Traits\CreatesLinks;

class UserHateoas
{
    use CreatesLinks;

    /**
     * Get the HATEOAS link to view the user.
     *
     * @param \App\User $user
     *
     * @return null|\GDebrauwer\Hateoas\Link
     */
    public function self(User $user)
    {
        if (! auth()->user()->can('view', $user)) {
            return;
        }

        return $this->link('user.show', ['user' => $user]);
    }

    /**
     * Get the HATEOAS link to delete the user.
     *
     * @param \App\User $user
     *
     * @return null|\GDebrauwer\Hateoas\Link
     */
    public function delete(User $user)
    {
        if (! auth()->user()->can('delete', $user)) {
            return $this->link('user.archive', ['user' => $user]);
        }

        return $this->link('user.destroy', ['user' => $user]);
    }
}