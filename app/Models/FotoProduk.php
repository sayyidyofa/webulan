<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \DateTimeInterface;

/**
 * App\Models\FotoProduk
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $produk_unggulan_id
 * @property-read mixed $foto
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\ProdukUnggulan $produk_unggulan
 * @method static \Illuminate\Database\Eloquent\Builder|FotoProduk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FotoProduk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FotoProduk query()
 * @method static \Illuminate\Database\Eloquent\Builder|FotoProduk whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FotoProduk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FotoProduk whereProdukUnggulanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FotoProduk whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FotoProduk extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public $table = 'foto_produks';

    protected $appends = [
        'foto',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'produk_unggulan_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function produk_unggulan()
    {
        return $this->belongsTo(ProdukUnggulan::class, 'produk_unggulan_id');
    }

    public function getFotoAttribute()
    {
        $files = $this->getMedia('foto');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }
}
