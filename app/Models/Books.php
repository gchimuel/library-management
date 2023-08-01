<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Books extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'synopsis',
        'author_id'
    ];
    protected $dates = ['deleted_at'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Authors::class, 'author_id', 'id');
    }

}
