<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

/**
 * App\Models\ProdukUnggulan
 *
 * @property int $id
 * @property string $nama
 * @property string|null $deskripsi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $usaha_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FotoProduk[] $produkUnggulanFotoProduks
 * @property-read int|null $produk_unggulan_foto_produks_count
 * @property-read \App\Models\Usaha $usaha
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukUnggulan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukUnggulan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukUnggulan query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukUnggulan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukUnggulan whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukUnggulan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukUnggulan whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukUnggulan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukUnggulan whereUsahaId($value)
 * @mixin \Eloquent
 */
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
