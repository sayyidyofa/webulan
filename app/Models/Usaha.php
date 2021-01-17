<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class Usaha extends Model
{
    use HasFactory;

    public $table = 'usahas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama',
        'brand',
        'pengusaha_id',
        'deskripsi',
        'kategori',
        'kontak',
        'alamat_maps',
        'kegiatan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function usahaMediaSosials()
    {
        return $this->hasMany(MediaSosial::class, 'usaha_id', 'id');
    }

    public function usahaProdukUnggulans()
    {
        return $this->hasMany(ProdukUnggulan::class, 'usaha_id', 'id');
    }

    public function pengusaha()
    {
        return $this->belongsTo(Pengusaha::class, 'pengusaha_id');
    }
}
