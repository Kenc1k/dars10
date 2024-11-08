<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $table = 'employes';

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users' , 'employe_id' , 'role_id');
    }
}
