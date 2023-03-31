<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Photo
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $img_path
 * @property int $album_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Database\Factories\PhotoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Photo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereAlbumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereImgPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo withoutTrashed()
 * @property-read \App\Models\Album $album
 * @property-read mixed $path
 * @mixin \Eloquent
 */
class Photo extends Model
{
    use HasFactory;
    use SoftDeletes;//trait

    public function album(){
        return $this->belongsTo(Album::class);
    }

    public function getPathAttribute()
    {
        $url = $this->img_path;
        if (!str_starts_with($url, 'http')) { //se la stringa non inizia con HTTP
            $url = 'storage/' . $url;
        }
        return $url;
    }

}
