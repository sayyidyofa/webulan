<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

/**
 * App\Models\Usaha
 *
 * @property int $id
 * @property string $nama
 * @property string $brand
 * @property string $deskripsi
 * @property string $kategori
 * @property string $kontak
 * @property string $alamat_maps
 * @property string|null $kegiatan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $pengusaha_id
 * @property-read \App\Models\Pengusaha $pengusaha
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MediaSosial[] $usahaMediaSosials
 * @property-read int|null $usaha_media_sosials_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProdukUnggulan[] $usahaProdukUnggulans
 * @property-read int|null $usaha_produk_unggulans_count
 * @method static \Illuminate\Database\Eloquent\Builder|Usaha newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usaha newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usaha query()
 * @method static \Illuminate\Database\Eloquent\Builder|Usaha whereAlamatMaps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usaha whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usaha whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usaha whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usaha whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usaha whereKategori($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usaha whereKegiatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usaha whereKontak($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usaha whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usaha wherePengusahaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usaha whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
        'id',
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
