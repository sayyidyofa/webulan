<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class ProdukUnggulan extends Model
{
    use HasFactory;

    public $table = 'produk_unggulans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama',
        'deskripsi',
        'usaha_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function produkUnggulanFotoProduks()
    {
        return $this->hasMany(FotoProduk::class, 'produk_unggulan_id', 'id');
    }

    public function usaha()
    {
        return $this->belongsTo(Usaha::class, 'usaha_id');
    }
}
