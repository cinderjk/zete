<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
