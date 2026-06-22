<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Seeds every settings key the site reads at runtime so the pages and the
     * shared layout render without "property on null" errors:
     *  - logo / get_in_touch / join_us  -> shared on every view (AppServiceProvider + layout footer)
     *  - aboutus / aboutus_header       -> About Us page
     *  - contactus                      -> Contact Us page
     *  - faqs_header                    -> FAQs page header
     *  - trackorder                     -> Track Order page
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'logo',
                'value' => 'PACEX',
                'description' => 'Site logo',
                // Relative to storage/app/public (served via asset('storage/'.$logo)).
                // Replace with a real uploaded logo path from the admin panel.
                'image' => 'images/logo.png',
            ],
            [
                'key' => 'get_in_touch',
                'value' => '<br>Address: Beirut, Lebanon<br>Phone: +961 00 000 000<br>Email: info@pacex.com',
                'description' => 'GET IN TOUCH',
                'image' => null,
            ],
            [
                'key' => 'join_us',
                'value' => 'Subscribe to get updates on new arrivals and special offers.',
                'description' => 'NEWSLETTER',
                'image' => null,
            ],
            [
                'key' => 'aboutus_header',
                'value' => 'About Us',
                'description' => 'About Us page header image',
                'image' => 'images/about-header.jpg',
            ],
            [
                'key' => 'aboutus',
                'value' => '<p>Welcome to PACEX. Update this content from the admin settings panel.</p>',
                'description' => 'About Us',
                'image' => null,
            ],
            [
                'key' => 'contactus',
                'value' => '<p>Get in touch with PACEX. Update this content from the admin settings panel.</p>',
                'description' => 'Contact Us',
                'image' => null,
            ],
            [
                'key' => 'faqs_header',
                'value' => 'FAQs',
                'description' => 'FAQs page header image',
                'image' => 'images/faqs-header.jpg',
            ],
            [
                'key' => 'trackorder',
                'value' => '<p>Enter your order number to track your order status.</p>',
                'description' => 'Track Order',
                'image' => null,
            ],
        ];

        foreach ($settings as $setting) {
            Settings::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
