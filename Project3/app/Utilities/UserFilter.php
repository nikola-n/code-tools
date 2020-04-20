<?php

use App\Utilities\QueryFilter;

class UserFilter extends QueryFilter {

    public function email($email = '')
    {
        $this->query->where('email', $email);
    }
}
