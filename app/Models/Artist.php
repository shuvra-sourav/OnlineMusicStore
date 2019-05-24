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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Artist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Artist whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Artist whereDod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Artist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Artist whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Artist wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Artist whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Artist whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Artist whereVersionString($value)
 * @mixin \Eloquent
 */
class Artist extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function songs()
    {
        return $this->belongsToMany(Song::class, 'song_artist');
    }
}
