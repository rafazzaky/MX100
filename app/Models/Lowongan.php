<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lowongan extends Model
{
    use HasFactory;

    protected $table = 'lowongan';

    protected $fillable = [
        'judul', 'deskripsi', 'author', 'is_published'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }
}
