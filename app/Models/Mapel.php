<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $primaryKey = 'mapel_id';
    protected $table = 'mapels';
    protected $guarded = ['mapel_id'];

    public function guru()
    {
        return $this->hasMany(Guru::class, 'mapel_id', 'mapel_id');
    }
}
