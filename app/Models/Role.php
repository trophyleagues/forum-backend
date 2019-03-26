<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Role extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany('App\Models\SubForum');
    }
}
