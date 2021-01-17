<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

/**
 * App\Models\Pengusaha
 *
 * @property int $id
 * @property string $nama
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Usaha[] $pengusahaUsahas
 * @property-read int|null $pengusaha_usahas_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Pengusaha newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengusaha newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengusaha query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengusaha whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengusaha whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengusaha whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengusaha whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengusaha whereUserId($value)
 * @mixin \Eloquent
 */
class Pengusaha extends Model
{
    use HasFactory;

    public $table = 'pengusahas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function pengusahaUsahas()
    {
        return $this->hasMany(Usaha::class, 'pengusaha_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
