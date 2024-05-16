<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'feed_id', 'body'];

    public function feed() : BelongsTo{
        return $this->belongsTo(Feed::class);
    }

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }

   
}
