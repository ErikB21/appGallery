<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Album
 *
 * @property int $id
 * @property string $album_name
 * @property string $album_thumb
 * @property string|null $description
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Photo> $photos
 * @property-read int|null $photos_count
 * @method static \Database\Factories\AlbumFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Album newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Album newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Album query()
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereAlbumName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereAlbumThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereUserId($value)
 * @property-read mixed $path
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Photo> $photos
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Album onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Album withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Album withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Photo> $photos
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Photo> $photos
 * @mixin \Eloquent
 */
class Album extends Model
{
    use HasFactory;
    // use SoftDeletes;//trait

    protected $fillable =[
        'album_name',
        'description',
        'user_id',
        'album_thumb'
    ];

    // protected $guarded = ['id']; al posto del metodo fillable

    public function photos():HasMany{
        return $this->hasMany(Photo::class, 'album_id', 'id');
    }

    public function categories():BelongsToMany{
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    //creo un metodo HELPER per la path delle immagini. Se la path inizia con HTTP
    //allora non add storage, altrimenti si
    public function getPathAttribute()
    {
        $url = $this->album_thumb;
        if(stristr($this->album_thumb, 'http') === false){
            $url = 'storage/' . $url;
        }
        return $url;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
