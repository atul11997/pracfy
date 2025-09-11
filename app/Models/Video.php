<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'videos',
    ];

        protected static function boot()
    {
        parent::boot();

        static::deleting(function ($record) {
            $imagePath = public_path('uploads/videos/' . $record->videos);
            if (file_exists($imagePath) && is_file($imagePath)) {
                unlink($imagePath);
            }
        });
    }
}
