<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

// ============================================================
// WashingtoneSeeder
// Seeds all tables for the Washingtone Oruko portfolio site.
// Run: php artisan db:seed --class=WashingtoneSeeder
// ============================================================

class WashingtoneSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        // ----------------------------------------
        // 1. USER ROLES
        // ----------------------------------------
        DB::table('su_user_roles')->upsert([
            ['id' => 1, 'name' => 'Admin', 'slug' => 'admin', 'description' => 'Full admin access', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 2, 'name' => 'User',  'slug' => 'user',  'description' => 'Standard user',     'created_at' => $now, 'updated_at' => $now],
        ], ['id'], ['name', 'slug', 'description']);


        // ----------------------------------------
        // 2. ADMIN USER (Washingtone)
        // ----------------------------------------
        DB::table('su_users')->upsert([
            [
                'id'         => 1,
                'role_id'    => 1,
                'first_name' => 'Washingtone',
                'last_name'  => 'Oruko',
                'email'      => 'admin@washingtoneoruko.com',
                'phone'      => '+254700000000',  // update with real number
                'password'   => Hash::make('Admin@123!'),  // change on first login
                'status'     => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ], ['id'], ['first_name', 'last_name', 'email']);


        // ----------------------------------------
        // 3. SETTINGS
        // ----------------------------------------
        DB::table('su_settings')->upsert([
            [
                'id'                    => 1,
                'site_name'             => 'Washingtone Oruko',
                'site_email'            => 'info@washingtoneoruko.com',
                'support_email'         => 'info@washingtoneoruko.com',
                'support_phone'         => '+254700000000',
                'whatsapp_number'       => '+254700000000',
                'alternative_phone'     => null,
                'business_location'     => 'Nairobi, Kenya',
                'facebook'              => 'https://facebook.com/washingtoneoruko',
                'instagram'             => 'https://instagram.com/washingtoneoruko',
                'linkedin'              => 'https://linkedin.com/in/washingtoneoruko',
                'tiktok'                => 'https://tiktok.com/@washingtoneoruko',
                'youtube'               => 'https://youtube.com/@washingtoneoruko',
                'twitter'               => 'https://twitter.com/washingtoneoruko',
                'hero_title'            => 'Washingtone Oruko',
                'hero_subtitle'         => 'Corporate MC · Life Coach · Author · Team Building Facilitator',
                'about_short'           => 'Washingtone is a charismatic Kenyan personality passionate about impacting, uplifting and transforming lives through personal development, corporate emceeing and team building facilitation.',
                'mpesa_paybill'         => null,   // set when ready
                'mpesa_account_name'    => 'Washingtone Oruko',
                'whatsapp_order_number' => '+254700000000',
                'meta_description'      => 'Washingtone Oruko — Corporate MC, Life Coach, Author of Realign Your Compass, and Team Building Facilitator based in Nairobi, Kenya.',
                'created_at'            => $now,
                'updated_at'            => $now,
            ]
        ], ['id'], ['site_name', 'hero_title', 'hero_subtitle', 'about_short', 'meta_description', 'updated_at']);


        // ----------------------------------------
        // 4. SERVICES
        // ----------------------------------------
        $services = [
            [
                'title'             => 'Corporate MC',
                'slug'              => 'corporate-mc',
                'short_description' => 'Elevating corporate events with energy, elegance and precision.',
                'description'       => '<p>Washingtone is a seasoned Corporate Master of Ceremonies with over 10 years of experience managing event flow for more than 200 events. From award ceremonies to annual general meetings, he ensures every moment runs seamlessly.</p><p>His style is unique — infused with creativity, warmth and professionalism that leaves every audience thoroughly engaged and every client thoroughly satisfied.</p>',
                'features'          => json_encode(['Over 200 events hosted', 'Award ceremonies & AGMs', 'Seamless event flow management', 'Bilingual: English & Kiswahili', 'Custom program development']),
                'icon'              => 'bi bi-mic',
                'image'             => null,
                'status'            => 1,
                'sort_order'        => 1,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'title'             => 'Team Building Facilitation',
                'slug'              => 'team-building',
                'short_description' => 'Transforming teams into high-performing, cohesive units.',
                'description'       => '<p>With over 70 team building sessions conducted, Washingtone helps organizations unlock their full potential. His facilitation style is energetic, practical and results-driven — tailored to each organization\'s unique culture and goals.</p><p>Companies, schools and churches across Kenya have seen measurable improvements in productivity, morale and staff retention after engaging Washingtone\'s team building services.</p>',
                'features'          => json_encode(['Over 70 team buildings conducted', 'Custom-designed activities', 'Workplace wellness integration', 'Measurable productivity outcomes', 'Suitable for 10–500 participants']),
                'icon'              => 'bi bi-people',
                'image'             => null,
                'status'            => 1,
                'sort_order'        => 2,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'title'             => 'Life Coaching & Personal Development',
                'slug'              => 'life-coaching',
                'short_description' => 'Helping individuals discover purpose, clarity and direction.',
                'description'       => '<p>As a self-help life coach and author of <em>Realign Your Compass</em>, Washingtone guides individuals on a journey of self-discovery and personal transformation. His coaching sessions are grounded in practical, time-tested principles that produce lasting change.</p>',
                'features'          => json_encode(['One-on-one coaching sessions', 'Workshops & seminars', 'Based on Realign Your Compass', 'Goal setting & accountability', 'Both personal & corporate clients']),
                'icon'              => 'bi bi-compass',
                'image'             => null,
                'status'            => 1,
                'sort_order'        => 3,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'title'             => 'Wedding & Social Events MC',
                'slug'              => 'wedding-mc',
                'short_description' => 'Creating unforgettable memories at your most cherished events.',
                'description'       => '<p>From intimate baby showers to grand wedding receptions, Washingtone brings warmth, elegance and infectious energy to every social event. He works closely with couples and families to ensure the program reflects their vision perfectly.</p>',
                'features'          => json_encode(['Weddings & reception programmes', 'Baby showers & gender reveals', 'Private parties & celebrations', 'Bilingual hosting', 'Client consultation included']),
                'icon'              => 'bi bi-balloon-heart',
                'image'             => null,
                'status'            => 1,
                'sort_order'        => 4,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'title'             => 'Theatre, Dance & Creative Arts',
                'slug'              => 'theatre-dance',
                'short_description' => 'Shaping young talent through creative expression and the performing arts.',
                'description'       => '<p>Washingtone is an accomplished theatrical writer, director and choreographer who has trained pupils and students across Kenya for drama and music festivals, helping many qualify to the national level.</p><p>He has conducted dance classes for kids, youths and adults at the Kenya National Theatre, and has organized successful school concerts across Kenya.</p>',
                'features'          => json_encode(['Stage script writing & direction', 'Dance choreography (modern & cultural)', 'Drama festival coaching', 'School concerts & cultural events', 'Kids, youth & adult dance classes']),
                'icon'              => 'bi bi-stars',
                'image'             => null,
                'status'            => 1,
                'sort_order'        => 5,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'title'             => 'Event Management (Ody Sound Eventers)',
                'slug'              => 'event-management',
                'short_description' => 'Full-service event management — sound, DJ, MC and logistics.',
                'description'       => '<p>As founder and director of Ody Sound Eventers, Washingtone offers comprehensive event management services including Sound & PA systems, MC services, DJ services and full event logistics coordination.</p><p>From beauty pageants to cultural festivals, Ody Sound Eventers has delivered top-notch events that consistently exceed client expectations.</p>',
                'features'          => json_encode(['Sound & PA systems', 'Professional DJ services', 'Full event logistics', 'Beauty pageant management', 'Cultural festival organisation']),
                'icon'              => 'bi bi-music-note-beamed',
                'image'             => null,
                'status'            => 1,
                'sort_order'        => 6,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
        ];

        DB::table('su_services')->upsert($services, ['slug'], ['title', 'short_description', 'description', 'features', 'icon', 'sort_order', 'updated_at']);


        // ----------------------------------------
        // 5. RATE CARD PACKAGES
        // ----------------------------------------
        DB::table('su_rate_card_packages')->delete();
        DB::table('su_rate_card_packages')->insert([
            ['category' => 'MC Services',   'title' => 'Baby Shower MC',           'description' => 'Host a memorable baby shower celebration.',                 'price' => 20000.00, 'price_suffix' => null,         'features' => json_encode(['Program coordination', 'Games & activities hosting', 'Up to 4 hours']), 'is_featured' => 0, 'status' => 1, 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['category' => 'MC Services',   'title' => 'Talks & Shows MC',         'description' => 'Professional hosting for talks, panels and shows.',          'price' => 30000.00, 'price_suffix' => null,         'features' => json_encode(['Speaker introductions', 'Q&A moderation', 'Audience engagement']), 'is_featured' => 0, 'status' => 1, 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['category' => 'MC Services',   'title' => 'Wedding MC',               'description' => 'Make your wedding day truly unforgettable.',                  'price' => 40000.00, 'price_suffix' => null,         'features' => json_encode(['Pre-event consultation', 'Full reception programme', 'Bilingual hosting', 'Coordination with vendors']), 'is_featured' => 1, 'status' => 1, 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['category' => 'MC Services',   'title' => 'Private Events MC',        'description' => 'Elegant hosting for private celebrations and gatherings.',    'price' => 50000.00, 'price_suffix' => null,         'features' => json_encode(['Customised programme', 'Guest engagement activities', 'Flexible scheduling']), 'is_featured' => 0, 'status' => 1, 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['category' => 'MC Services',   'title' => 'Corporate MC',             'description' => 'Polished, professional hosting for corporate events.',        'price' => 70000.00, 'price_suffix' => null,         'features' => json_encode(['AGMs & award ceremonies', 'Product launches', 'Custom program scripting', 'Brand-aligned delivery']), 'is_featured' => 1, 'status' => 1, 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['category' => 'Team Building', 'title' => 'Team Building Package',    'description' => 'Dynamic facilitation designed to unite and motivate your team.','price' => 1000.00, 'price_suffix' => 'per person',  'features' => json_encode(['Custom activities', 'Workplace wellness focus', 'Full-day or half-day', 'Certificate of participation']), 'is_featured' => 1, 'status' => 1, 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['category' => 'Dance Classes', 'title' => 'Dance Classes',            'description' => 'Learn modern, contemporary and cultural dances.',             'price' =>  500.00, 'price_suffix' => 'per person',  'features' => json_encode(['Kids, youth & adult classes', 'Modern & cultural dance styles', 'Held at Kenya National Theatre']), 'is_featured' => 0, 'status' => 1, 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
        ]);


        // ----------------------------------------
        // 6. STORE PRODUCT — Realign Your Compass
        // ----------------------------------------
        DB::table('su_store_products')->upsert([
            [
                'title'             => 'Realign Your Compass',
                'slug'              => 'realign-your-compass',
                'short_description' => 'A self-help masterpiece packed with practicable nuggets and time-tested principles that dramatically transform the quality of your life.',
                'description'       => '<p><strong>Realign Your Compass</strong> by Washingtone Oduor Oruko is a powerful self-help book built on a single unbeatable principle: <em>learn, grow and develop</em>.</p><p>Success is not defined by what you have, but by who you are. The more you work on yourself, the better your chances of success. This book will challenge you, inspire you and equip you with the practical tools to realign your life with your true purpose.</p><p>Whether you feel stuck, directionless or simply want to level up, <em>Realign Your Compass</em> is the guide you have been waiting for.</p><h4>What You Will Learn</h4><ul><li>How to discover and rediscover your inner strength and potential</li><li>Practical steps for never-ending self-improvement</li><li>How to develop resilience and adapt to inevitable changes</li><li>How to gain clarity on who you are, what you want and where you are going</li><li>Time-tested principles for transforming the quality of your life</li></ul>',
                'price'             => 2500.00,
                'image'             => null,
                'gallery_images'    => json_encode([]),
                'stock_quantity'    => null,
                'is_featured'       => 1,
                'status'            => 'active',
                'sort_order'        => 1,
                'created_at'        => $now,
                'updated_at'        => $now,
            ]
        ], ['slug'], ['title', 'short_description', 'description', 'price', 'is_featured', 'updated_at']);


        // ----------------------------------------
        // 7. VIDEOS (YouTube — placeholder IDs)
        // ----------------------------------------
        DB::table('su_videos')->delete();
        $videoData = [
            ['title' => 'Washingtone Oruko — Motivational Talk',          'youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'description' => 'An inspiring talk on personal development and self-discovery.', 'sort_order' => 1],
            ['title' => 'Corporate Team Building Highlights',              'youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'description' => 'Watch highlights from one of our energetic team building sessions.', 'sort_order' => 2],
            ['title' => 'Washingtone as Wedding MC — Event Highlights',    'youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'description' => 'A glimpse into Washingtone\'s elegant wedding MC style.', 'sort_order' => 3],
            ['title' => 'Kiwetu Cultural Festival 2019 — Karen Village',   'youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'description' => 'Highlights from the 2019 Kiwetu Cultural Festival attended by 1,000+ guests.', 'sort_order' => 4],
        ];
        foreach ($videoData as $v) {
            preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|shorts\/))([A-Za-z0-9_\-]{11})/', $v['youtube_url'], $m);
            DB::table('su_videos')->insert([
                'title'       => $v['title'],
                'description' => $v['description'],
                'youtube_url' => $v['youtube_url'],
                'youtube_id'  => $m[1] ?? null,
                'sort_order'  => $v['sort_order'],
                'status'      => 1,
                'created_at'  => $now,
                'updated_at'  => $now,
            ]);
        }


        // ----------------------------------------
        // 8. GALLERY (placeholder — admin uploads real photos)
        // ----------------------------------------
        DB::table('su_gallery')->delete();
        $galleryItems = [
            ['title' => 'Corporate Event — Nairobi',       'category' => 'Corporate Events',  'sort_order' => 1],
            ['title' => 'Wedding MC — Karen',              'category' => 'Weddings',           'sort_order' => 2],
            ['title' => 'Team Building Session',           'category' => 'Team Building',      'sort_order' => 3],
            ['title' => 'Kiwetu Cultural Festival 2019',   'category' => 'Cultural Events',    'sort_order' => 4],
            ['title' => 'Dance Class — Kenya National Theatre', 'category' => 'Dance & Arts', 'sort_order' => 5],
            ['title' => 'Book Launch — Realign Your Compass', 'category' => 'Speaking',       'sort_order' => 6],
            ['title' => 'Miss & Mr. Utawala Pageant',     'category' => 'Events',             'sort_order' => 7],
            ['title' => 'Corporate Workshop',              'category' => 'Corporate Events',   'sort_order' => 8],
        ];
        foreach ($galleryItems as $g) {
            DB::table('su_gallery')->insert([
                'title'      => $g['title'],
                'category'   => $g['category'],
                'image'      => 'placeholder.jpg',  // admin replaces via upload
                'sort_order' => $g['sort_order'],
                'status'     => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }


        // ----------------------------------------
        // 9. BLOG CATEGORIES
        // ----------------------------------------
        DB::table('su_blog_categories')->upsert([
            ['id' => 1, 'name' => 'Personal Development', 'slug' => 'personal-development', 'description' => 'Tips and insights for self-improvement and growth.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 2, 'name' => 'Leadership',           'slug' => 'leadership',           'description' => 'Articles on leadership, influence and impact.',    'created_at' => $now, 'updated_at' => $now],
            ['id' => 3, 'name' => 'Event Tips',           'slug' => 'event-tips',           'description' => 'Guides and tips for planning memorable events.',    'created_at' => $now, 'updated_at' => $now],
        ], ['slug'], ['name', 'description', 'updated_at']);


        // ----------------------------------------
        // 10. BLOG POSTS
        // ----------------------------------------
        DB::table('su_blogs')->delete();
        DB::table('su_blogs')->insert([
            [
                'category_id'    => 1,
                'author_id'      => 1,
                'title'          => 'The Power of Knowing Who You Are',
                'slug'           => 'power-of-knowing-who-you-are',
                'featured_image' => null,
                'content'        => '<p>One of the greatest tragedies of our time is the number of people who spend their entire lives without ever truly knowing who they are. We chase titles, possessions and the approval of others — all while the most important discovery of our lives remains unmade.</p><p>To change what you see, you first have to change who you are. Your external world is always a reflection of your internal world. When you invest in understanding yourself — your values, your purpose, your unique strengths — everything around you begins to shift.</p><p>Start today. Ask yourself: <em>Who am I?</em> Not the version others expect, but the truest version of yourself. That question, honestly answered, is the beginning of everything.</p>',
                'status'         => 'published',
                'published_at'   => Carbon::now()->subDays(10),
                'created_at'     => Carbon::now()->subDays(10),
                'updated_at'     => Carbon::now()->subDays(10),
            ],
            [
                'category_id'    => 1,
                'author_id'      => 1,
                'title'          => '5 Daily Habits That Will Transform Your Life',
                'slug'           => '5-daily-habits-transform-your-life',
                'featured_image' => null,
                'content'        => '<p>Transformation does not happen overnight. It is the result of consistent, intentional habits practiced day after day. Here are five habits that can radically change the trajectory of your life.</p><ol><li><strong>Start with gratitude.</strong> Before you check your phone, spend 5 minutes writing down three things you are grateful for. Gratitude rewires the brain for optimism.</li><li><strong>Move your body.</strong> Exercise is not just about physical health — it is a mental health tool. Even 20 minutes of movement can transform your mood for the entire day.</li><li><strong>Read every day.</strong> Leaders are readers. Commit to at least 15 pages a day and within a year you will have read 12+ books.</li><li><strong>Reflect before you sleep.</strong> A brief evening review of your day keeps you aligned with your goals and helps you improve continuously.</li><li><strong>Protect your mind.</strong> Be intentional about what you watch, listen to and discuss. Your mind becomes what you feed it.</li></ol>',
                'status'         => 'published',
                'published_at'   => Carbon::now()->subDays(5),
                'created_at'     => Carbon::now()->subDays(5),
                'updated_at'     => Carbon::now()->subDays(5),
            ],
            [
                'category_id'    => 3,
                'author_id'      => 1,
                'title'          => 'How to Choose the Right MC for Your Corporate Event',
                'slug'           => 'how-to-choose-right-mc-corporate-event',
                'featured_image' => null,
                'content'        => '<p>Your Master of Ceremonies is the heartbeat of your event. The wrong choice can leave your guests disengaged and your program in disarray. The right MC elevates every moment and leaves every attendee with a lasting impression.</p><p>Here is what to look for when selecting an MC for your next corporate event:</p><ul><li><strong>Experience and versatility.</strong> A seasoned MC has handled the unexpected and knows how to keep the energy high even when things go off-script.</li><li><strong>Communication skills.</strong> Look beyond a loud voice — great MCs are articulate, warm and able to connect authentically with diverse audiences.</li><li><strong>Client testimonials.</strong> Past clients are your best reference. Ask to speak with previous event organisers and check for video footage of the MC in action.</li><li><strong>Preparation and professionalism.</strong> A great MC does thorough research before your event. They know your brand, your people and your program inside out.</li><li><strong>Cultural awareness.</strong> Especially important in Kenya — an MC who can navigate language, culture and context creates an inclusive experience for all guests.</li></ul>',
                'status'         => 'published',
                'published_at'   => Carbon::now()->subDays(2),
                'created_at'     => Carbon::now()->subDays(2),
                'updated_at'     => Carbon::now()->subDays(2),
            ],
        ]);


        // ----------------------------------------
        // 11. PAGE CONTENT
        // ----------------------------------------
        DB::table('su_page_content')->upsert([
            [
                'page_slug'        => 'biography',
                'title'            => 'Biography',
                'content'          => '<h2>About Washingtone Oduor Oruko</h2><p>Washingtone Oduor Oruko, born on the 17th day of October, 1989, is a young dynamic Kenyan, best known for his charismatic personality, more so in personal development. Washingtone is an author and a self-help life coach who is passionate about impacting, uplifting and helping people become better while transforming their lives.</p><p>Being a theatrical writer, director and choreographer, he has played major roles in shaping and transforming the lives of young teens; both in primary schools, secondary, as well as college and university students, through his works of art.</p><p>Washingtone is a corporate MC, a team building facilitator and a workplace wellness coach. He helps companies by inspiring, motivating and uplifting the morale of their employees, thereby positioning them to not just be effective, but proficient and efficient in discharging their duties, thus improving the overall performance and maximum productivity of every team member.</p><h3>Education</h3><ul><li>Diploma in Business Management — St. Paul\'s University, Kenya</li></ul><h3>Languages</h3><ul><li>English</li><li>Kiswahili</li></ul>',
                'meta_title'       => 'Biography — Washingtone Oruko',
                'meta_description' => 'Learn about Washingtone Oduor Oruko — Corporate MC, Life Coach, Author and Team Building Facilitator from Nairobi, Kenya.',
                'created_at'       => $now,
                'updated_at'       => $now,
            ],
            [
                'page_slug'        => 'privacy-policy',
                'title'            => 'Privacy Policy',
                'content'          => '<h2>Privacy Policy</h2><p>Last updated: ' . now()->format('F d, Y') . '</p><p>Washingtone Oruko ("we", "our", "us") respects your privacy and is committed to protecting your personal data. This privacy policy explains how we collect, use and store your information when you visit this website.</p><h3>Information We Collect</h3><ul><li>Name, email address and phone number submitted via our contact form.</li><li>Order details submitted when purchasing products from our store.</li><li>Basic browsing data collected automatically (e.g. IP address, browser type).</li></ul><h3>How We Use Your Information</h3><ul><li>To respond to your enquiries and messages.</li><li>To process your store orders and communicate order status.</li><li>To improve our website and services.</li></ul><h3>Data Sharing</h3><p>We do not sell, trade or rent your personal information to third parties. Your data is used solely for the purposes outlined above.</p><h3>Contact</h3><p>For any privacy-related questions, contact us at info@washingtoneoruko.com.</p>',
                'meta_title'       => 'Privacy Policy — Washingtone Oruko',
                'meta_description' => 'Privacy Policy for the Washingtone Oruko website.',
                'created_at'       => $now,
                'updated_at'       => $now,
            ],
            [
                'page_slug'        => 'terms-conditions',
                'title'            => 'Terms & Conditions',
                'content'          => '<h2>Terms &amp; Conditions</h2><p>Last updated: ' . now()->format('F d, Y') . '</p><p>By accessing and using this website, you accept and agree to be bound by the following terms.</p><h3>Use of Site</h3><p>This website is provided for informational purposes and to facilitate bookings and purchases of Washingtone Oruko\'s services and products. Unauthorised use of this website may give rise to a claim for damages.</p><h3>Store Orders</h3><p>All orders placed through our store are subject to acceptance and availability. Prices are displayed in Kenyan Shillings (KES). Payment is processed via M-Pesa or WhatsApp order confirmation.</p><h3>Intellectual Property</h3><p>All content on this website — including text, images, and the book <em>Realign Your Compass</em> — is the intellectual property of Washingtone Oduor Oruko. Reproduction without written permission is prohibited.</p><h3>Contact</h3><p>For any questions regarding these terms, email info@washingtoneoruko.com.</p>',
                'meta_title'       => 'Terms & Conditions — Washingtone Oruko',
                'meta_description' => 'Terms and Conditions for the Washingtone Oruko website.',
                'created_at'       => $now,
                'updated_at'       => $now,
            ],
        ], ['page_slug'], ['title', 'content', 'meta_title', 'meta_description', 'updated_at']);

        $this->command->info('✅  WashingtoneSeeder completed successfully.');
        $this->command->warn('⚠️   Remember to update the admin password and WhatsApp/M-Pesa numbers in settings.');
    }
}
