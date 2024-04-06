<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;
    protected $table = 'challenges';
    protected $fillable = ['title', 'description', 'difficulty', 'user_id'];

    /**
     * Get the user that owns the challenge.
     */
    public function user()
    {
        return $this->belongsTo(Users::class);
    }
}
