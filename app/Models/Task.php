<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'project_type', 'status', 'target_date', 'priority', 'user_id', 'notes', 'attachment',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
