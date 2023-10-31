<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $primaryKey = 'sekolah_id';
    protected $table = 'sekolahs';
    protected $guarded = ['sekolah_id'];

    public function guru()
    {
        return $this->hasMany(Guru::class, 'sekolah_id', 'sekolah_id');
    }
}