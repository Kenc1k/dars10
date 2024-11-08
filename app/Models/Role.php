<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
    ];


    public function employes()
    {
        return $this->belongsToMany(Employe::class , 'role_users' , 'role_id', 'user_id');
    }
}
