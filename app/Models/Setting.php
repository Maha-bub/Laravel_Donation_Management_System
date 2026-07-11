<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'site_email',
        'site_phone',
        'address',
        'footer_text',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'logo',
    ];

    /**
     * Convenience accessor used across the app: Setting::current()
     * Always returns the single settings row, creating a default one if
     * none exists yet.
     */
    public static function current(): self
    {
        return static::first() ?? static::create([
            'site_name' => 'Esho Desh Gori',
            'site_email' => 'info@donat.com',
            'site_phone' => '+163 3654 7896',
            'address' => 'Network City, USA',
        ]);
    }
}
