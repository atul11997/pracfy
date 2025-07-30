<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'google_id',
        'username',
        'name',
        'email',
        'photo',
        'password',
        'address',
        'city',
        'state',
        'phone',
        'clinic_name',
        'clinic_logo',
        'clinic_photo',
        'telephone_number',
        'alternate_phone',
        'facebook_link',
        'instagram_link',
        'twitter_link',
        'linkdin_link',
        'pincode',
        'dr_dob',
        'country',
        'address_map_link',
        'selected_theme',
        'clinic_open_from', 
        'clinic_open_to', 
        'closed_clinic',
        'clinic_open_time',
        'clinic_close_time',
        'half_day',
        'time_of_half_day_from',
        'time_of_half_day_to'
    ];

    public function pages() { return $this->hasMany(Page::class); }
    public function banners() { return $this->hasMany(Banner::class); }
    public function about() { return $this->hasMany(About::class); }
    public function service() { return $this->hasMany(Service::class); }
    public function address() { return $this->hasMany(Address::class); }
    public function social_media() { return $this->hasMany(SocialMedia::class); }
    public function gallery() { return $this->hasMany(Gallery::class); }
    public function video() { return $this->hasMany(Video::class); }
    public function faq() { return $this->hasMany(FAQ::class); }
    public function blog() { return $this->hasMany(Blog::class, 'userid'); }
    public function testimonial() { return $this->hasMany(Testimonial::class); }
    public function departments() { return $this->hasMany(Department::class); }
    public function doctors() { return $this->hasMany(Doctor::class); }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
