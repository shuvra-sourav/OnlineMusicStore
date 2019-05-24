<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Language
 *
 * @property int $id
 * @property int $song_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Paragraph whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Paragraph whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Paragraph whereSongId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Paragraph whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Paragraph whereVersionString($value)
 * @mixin \Eloquent
 */
class Paragraph extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lines()
    {
        return $this->hasMany(Line::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}
