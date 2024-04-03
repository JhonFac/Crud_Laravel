<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;
use App\Models\Programs;

class ProgramParticipant extends Model
{
    use HasFactory;
    protected $table = 'program_participants';
    protected $fillable = [
        'program_id', 'entity_type', 'entity_id'
    ];

    public function user()
    {
        return $this->belongsTo(Users::class, 'entity_id');
    }

    public function program()
    {
        return $this->belongsTo(Programs::class);
    }
}
