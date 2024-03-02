<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $guarded = false;
    protected $table = 'avatars';

    use HasFactory;

    // Определение обратного отношения к пользователю
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = ['path'];
}
