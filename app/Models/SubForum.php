<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class SubForum extends Model
{
    public $incrementing = false;

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'sub_forum_roles', 'sub_forum_id', 'role_id');
    }
}
