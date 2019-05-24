<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Language
 *
 * @property int $id
 * @property int $paragraph_id
 * @property string $data
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Line whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Line whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Line whereParagraphId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Line whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Line whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Line whereVersionString($value)
 * @mixin \Eloquent
 */
class Line extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paragraph()
    {
        return $this->belongsTo(Paragraph::class);
    }
}
