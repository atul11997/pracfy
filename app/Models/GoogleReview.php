<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'google_id',
        'google_token',
        'google_refresh_token'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
