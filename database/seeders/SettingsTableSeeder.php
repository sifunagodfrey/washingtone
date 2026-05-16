<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Only insert if no settings exist
        if (DB::table('su_settings')->count() === 0) {
            DB::table('su_settings')->insert([
                'site_name'        => 'My Website',
                'site_description' => 'This is the default description of the site.',
                'support_email'    => 'support@example.com',
                'billing_email'    => 'billing@example.com',
                'support_number'   => '+254700000000',
                'whatsapp_number'  => '+254711111111',
                'address'          => 'Nairobi, Kenya',
                'logo'             => null,
                'favicon'          => null,
                'primary_color'    => '#4f46e5',
                'facebook_url'     => 'https://facebook.com',
                'twitter_url'      => 'https://twitter.com',
                'instagram_url'    => null,
                'linkedin_url'     => null,
                'youtube_url'      => null,
                'meta_description' => 'Default meta description for SEO.',
                'meta_keywords'    => 'website,default,example',
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }
    }
}
