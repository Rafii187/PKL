<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $primaryKey = 'penilaian_id';
    protected $table = 'penilaians';
    protected $guarded = ['penilaian_id'];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'guru_id');
    }
}