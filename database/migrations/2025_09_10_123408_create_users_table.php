<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('google_id')->nullable();
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('phone')->nullable();
            $table->rememberToken();

            $table->string('clinic_name')->nullable();
            $table->string('clinic_logo')->nullable();
            $table->string('clinic_photo')->nullable();
            $table->string('telephone_number')->nullable();
            $table->string('alternate_phone')->nullable();

            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('linkdin_link')->nullable();

            $table->string('pincode')->nullable();
            $table->date('dr_dob')->nullable();
            $table->string('country')->nullable();
            $table->longText('address_map_link')->nullable();

            $table->string('selected_theme')->default('theme1');
            $table->longText('theme_customizations')->nullable();

            // Extra fields from your inserts
            $table->string('clinic_open_from')->nullable();
            $table->string('clinic_open_to')->nullable();
            $table->string('closed_clinic')->nullable();
            $table->time('clinic_open_time')->nullable();
            $table->time('clinic_close_time')->nullable();
            $table->string('half_day')->nullable();
            $table->time('time_of_half_day_from')->nullable();
            $table->time('time_of_half_day_to')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
