<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Language
 *
 * @property int $id
 * @property int $album_id
 * @property int $lyricist_id
 * @property int $composer_id
 * @property int $category_id
 * @property int $release_year
 * @property string $title
 * @property string $slug
 * @property string $youtube_id
 * @property string $cover_image
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Song whereAlbumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Song whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Song whereCoverImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Song whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Song whereComposerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Song whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Song whereLyricistId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Song whereReleaseYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Song whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Song whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Song whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Song whereVersionString($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Song whereYoutubeId($value)
 * @mixin \Eloquent
 */
class Song extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'song_artist');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function composer()
    {
        return $this->belongsTo(Composer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lyricist()
    {
        return $this->belongsTo(Lyricist::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paragraphs()
    {
        return $this->hasMany(Paragraph::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lines()
    {
        return $this->hasManyThrough(Line::class, Paragraph::class);
    }
    
    public function keywords()
    {
        $words = array();
        foreach ($this->lines as $line) {
            $keywords = preg_split("/[\s,]+/", $line->data, 0, PREG_SPLIT_NO_EMPTY);
            foreach ($keywords as $keyword) {
                $words[] = str_replace('।', '', preg_replace('/^[\pZ\pC]+|[\pZ\pC]+$/u', '', $keyword));
            }
        }
        return array_unique($words);
    }
}
