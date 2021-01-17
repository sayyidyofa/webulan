<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

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
