<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Announcement extends Model
{
    use HasFactory;

    // Using fillable to prevent user passing all data from a request into an Announcement
    protected $fillable = [
        'body',
    ];

    /**
     * Sets up a relationship between user and announcements
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
