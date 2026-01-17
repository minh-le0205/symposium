<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    /** @use HasFactory<\Database\Factories\TalkFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
