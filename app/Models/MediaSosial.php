<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

/**
 * App\Models\MediaSosial
 *
 * @property int $id
 * @property string $link_accname
 * @property string $vendor
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $usaha_id
 * @property-read \App\Models\Usaha $usaha
 * @method static \Illuminate\Database\Eloquent\Builder|MediaSosial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaSosial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaSosial query()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaSosial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaSosial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaSosial whereLinkAccname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaSosial whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaSosial whereUsahaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaSosial whereVendor($value)
 * @mixin \Eloquent
 */
class MediaSosial extends Model
{
    use HasFactory;

    public $table = 'media_sosials';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'link_accname',
        'vendor',
        'usaha_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const VENDOR_RADIO = [
        'facebook'  => 'Facebook',
        'instagram' => 'Instagram',
        'tiktok'    => 'TikTok',
        'website'   => 'Website Sendiri',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function usaha()
    {
        return $this->belongsTo(Usaha::class, 'usaha_id');
    }
}
