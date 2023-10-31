<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $primaryKey = 'guru_id';
    protected $table = 'gurus';
    protected $guarded = ['guru_id'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'user_jab_id', 'jab_id');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id', 'mapel_id');
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id', 'sekolah_id');
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'penilaian_id', 'penilaian_id');
    }
}
