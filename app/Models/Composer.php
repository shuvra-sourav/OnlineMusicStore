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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Composer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Composer whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Composer whereDod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Composer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Composer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Composer wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Composer whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Composer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Composer whereVersionString($value)
 * @mixin \Eloquent
 */
class Composer extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
