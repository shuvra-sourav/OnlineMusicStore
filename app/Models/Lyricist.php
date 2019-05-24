<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Language
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $photo
 * @property \Carbon\Carbon|null $dob
 * @property \Carbon\Carbon|null $dod
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Lyricist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Lyricist whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Lyricist whereDod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Lyricist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Lyricist whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Lyricist wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Lyricist whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Lyricist whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Lyricist whereVersionString($value)
 * @mixin \Eloquent
 */
class Lyricist extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
