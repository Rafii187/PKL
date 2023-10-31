<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $primaryKey = 'jab_id';
    protected $table = 'jabatans';
    protected $guarded = ['jab_id'];

    public function users()
    {
        return $this->hasMany(User::class, 'user_jab_id', 'jab_id');
    }

    public function guru()
    {
        return $this->hasMany(Guru::class, 'user_jab_id', 'jab_id');
    }
}
