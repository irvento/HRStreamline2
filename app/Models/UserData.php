<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{

    use Notifiable;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
