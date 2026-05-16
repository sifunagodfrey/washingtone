-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2026 at 09:11 AM
-- Server version: 11.4.10-MariaDB-cll-lve
-- PHP Version: 8.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `washing1_oruko`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2026_03_17_051253_create_su_user_logs_table', 1),
(2, '2026_03_17_055453_create_su_admin_2fa_tokens_table', 2),
(3, '2026_03_17_061610_create_contact_messages_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `su_admin_2fa_tokens`
--

CREATE TABLE `su_admin_2fa_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `su_admin_2fa_tokens`
--

INSERT INTO `su_admin_2fa_tokens` (`id`, `user_id`, `code`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 6, '662901', '2026-03-18 09:23:54', '2026-03-18 09:18:54', '2026-03-18 09:18:54'),
(2, 3, '520643', '2026-04-15 04:48:13', '2026-04-15 04:38:03', '2026-04-15 04:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `su_blogs`
--

CREATE TABLE `su_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `content` longtext NOT NULL,
  `status` enum('draft','published') DEFAULT 'draft',
  `published_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `su_blogs`
--

INSERT INTO `su_blogs` (`id`, `category_id`, `author_id`, `title`, `slug`, `featured_image`, `content`, `status`, `published_at`, `created_at`, `updated_at`) VALUES
(23, 5, 3, 'Why Realigning Your Compass Changes Everything', 'why-realigning-your-compass-changes-everything', '1778872901_washingtone-book-realine-compass.jpg', '<p>Every now and then, life throws us off course. We wake up one morning and realize that the path we are on no longer leads to where we truly want to go. That quiet discomfort — that nagging sense of misalignment — is not a crisis. It is an invitation.</p><p>\r\n\r\n</p><p>Realigning your compass means going back to the core of who you are, what you value, and where you genuinely want to go. It is about stripping away the noise — the opinions of others, the pressures of society, the habits you picked up by default — and getting honest with yourself.</p><p>\r\n\r\n</p><h2>Start With Why</h2><p>\r\n</p><p>The first and most important question is: <em>Why do you exist in this world?</em> This is not a philosophical exercise — it is the foundation of everything. When you know your WHY, every decision becomes clearer. Your priorities sort themselves naturally, and you stop chasing goals that were never really yours to begin with.</p><p>\r\n\r\n</p><h2>Define Your What</h2><p>\r\n</p><p>Once you have your WHY, you need to map out your WHAT. What does success look like for you — specifically? Not the generic version that appears on motivational posters, but your version. The one that lights you up and keeps you going even when things are hard.</p><p>\r\n\r\n</p><h2>Commit to the How</h2><p>\r\n</p><p>The final step is HOW — the daily disciplines, strategies, and habits that will carry you from where you are to where you want to be. This is where most people struggle, because HOW requires consistency. But when it is rooted in a clear WHY and a compelling WHAT, it becomes surprisingly sustainable.</p><p>\r\n\r\n</p><p>Realigning your compass is not a one-time event. It is a practice. And it starts the moment you decide to be intentional about your life.</p><p>\r\n\r\n</p><p><strong>— Washingtone Oduor Oruko</strong></p>', 'published', '2026-05-15 20:21:23', '2026-05-15 17:21:23', '2026-05-15 17:21:41'),
(24, 6, 3, '7 Qualities That Make a Great Corporate MC', '7-qualities-that-make-a-great-corporate-mc', '1778872937_washingtone-mc-with-white.jpg', '<p>A great MC is the invisible engine that keeps an event running smoothly. When an MC is excellent, the audience barely notices them — they only feel the energy, the flow, and the seamlessness of the experience. When an MC is poor, everyone notices. Here are the seven qualities that separate truly great corporate MCs from the average ones.</p><p>\r\n\r\n</p><h2>1. Commanding Presence</h2><p>\r\n</p><p>A great MC owns the room the moment they step on stage. This is not about volume — it is about confidence, posture, and the ability to hold attention without demanding it.</p><p>\r\n\r\n</p><h2>2. Deep Preparation</h2><p>\r\n</p><p>Behind every smooth event is a host who did their homework. Great MCs study the program, know the speakers, understand the brand, and anticipate every possible scenario before they go live.</p><p>\r\n\r\n</p><h2>3. Adaptability</h2><p>\r\n</p><p>Things go wrong at events. Speakers run late. Technical systems fail. A great MC can pivot in real time, fill the gap with grace, and move the event forward without the audience ever feeling the disruption.</p><p>\r\n\r\n</p><h2>4. Emotional Intelligence</h2><p>\r\n</p><p>Reading a room is an art. The best MCs sense when to bring energy and when to pull back, when to be formal and when to be warm, when to tell a joke and when silence is more powerful.</p><p>\r\n\r\n</p><h2>5. Excellent Communication</h2><p>\r\n</p><p>Clear, crisp, and purposeful language. No filler words. No rambling. Every sentence serves the event.</p><p>\r\n\r\n</p><h2>6. Professionalism</h2><p>\r\n</p><p>Great MCs are reliable, punctual, well-dressed, and respectful of every stakeholder — from the CEO to the event crew.</p><p>\r\n\r\n</p><h2>7. Genuine Passion</h2><p>\r\n</p><p>You can feel when someone loves what they do. That passion is contagious. It lifts the energy of the room and makes every attendee feel that this event — and their presence at it — matters.</p><p>\r\n\r\n</p><p>These are the qualities Washingtone brings to every event. <a href=\"/get-in-touch\">Book him for your next corporate function today.</a></p>', 'published', '2026-05-15 20:21:23', '2026-05-15 17:21:23', '2026-05-15 17:22:17'),
(25, 7, 3, 'How Team Building Transforms Workplace Culture', 'how-team-building-transforms-workplace-culture', '1778872953_washingtone-doing-team-building-indoors.jpg', '<p>A team is more than a collection of people who share an office. A high-performing team is a unit that communicates openly, trusts each other deeply, and moves toward a shared vision with alignment and energy. Getting there requires deliberate investment — and team building is one of the most powerful tools available.</p><p>\r\n\r\n</p><h2>Beyond the Rope Course</h2><p>\r\n</p><p>Many people think team building is about fun activities — and fun is absolutely part of it. But the real value goes much deeper. Well-designed team building experiences create breakthroughs in communication, expose hidden strengths, dissolve interpersonal tensions, and remind people why they joined the organization in the first place.</p><p>\r\n\r\n</p><h2>What Changes After a Great Team Building Session</h2><p>\r\n</p><p><br></p><p>\r\n\r\n</p><h2>The Facilitator Matters</h2><p>\r\n</p><p>The difference between a mediocre team building day and a transformational one is the facilitator. A great facilitator does not just run activities — they create a safe space for real conversations, draw out insights, and help teams transfer what they learn back into their daily work.</p><p>\r\n\r\n</p><p>With over 70 corporate team building sessions facilitated across Kenya, Washingtone brings both the energy and the expertise to make your next session count. <a href=\"/get-in-touch\">Get in touch to plan your session today.</a></p>', 'published', '2026-05-15 20:21:23', '2026-05-15 17:21:23', '2026-05-15 17:22:33'),
(26, 8, 3, 'The Power of Living with Intention', 'the-power-of-living-with-intention', '1778872968_washintone-stage-direction-holding-mic.jpg', '<p>Most people drift through life on autopilot. They react to what happens, follow the path of least resistance, and wake up years later wondering how they got where they are. Living with intention is the antidote to that drift.</p><p>\r\n\r\n</p><p>Intentional living means making deliberate choices about how you spend your time, energy, and attention — and aligning those choices with your deepest values and goals. It is not about being rigid or controlling. It is about being awake.</p><p>\r\n\r\n</p><h2>The Three Pillars of Intentional Living</h2><p>\r\n\r\n</p><h3>1. Clarity</h3><p>\r\n</p><p>You cannot be intentional about a destination you have not defined. The first step is getting crystal clear on what you want — in your career, your relationships, your health, your finances, and your personal growth. Write it down. Make it specific. Give it a timeline.</p><p>\r\n\r\n</p><h3>2. Alignment</h3><p>\r\n</p><p>Once you have clarity, you need to audit your life. Are your daily actions aligned with your stated values and goals? Most people are shocked to discover the gap between what they say matters and how they actually spend their time. Closing that gap is the work of alignment.</p><p>\r\n\r\n</p><h3>3. Accountability</h3><p>\r\n</p><p>Good intentions without accountability lead to regret. Build systems that hold you to your commitments — whether that is a coach, a mentor, a trusted friend, or a disciplined journaling practice. The goal is to make it harder to drift than to stay on course.</p><p>\r\n\r\n</p><h2>Start Small, Start Today</h2><p>\r\n</p><p>Intentional living does not require a dramatic overhaul of your life. It starts with one decision: to pay attention. To notice where you are, where you want to go, and what is standing in the way. Then it continues, one day at a time, one choice at a time.</p><p>\r\n\r\n</p><p>As Washingtone often says: <em>\"The more we work on ourselves, the better our chances of success.\"</em></p>', 'published', '2026-05-15 20:21:23', '2026-05-15 17:21:23', '2026-05-15 17:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `su_blog_categories`
--

CREATE TABLE `su_blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `su_blog_categories`
--

INSERT INTO `su_blog_categories` (`id`, `name`, `slug`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Relocation', 'relocation', 'Articles about relocation', '71066cf1-481d-4f86-a896-1169589e288f.jpg', '2026-03-15 04:31:56', '2026-03-15 02:38:23'),
(5, 'Personal Development', 'personal-development', 'Articles on mindset, growth and self-improvement', NULL, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(6, 'Corporate & Events', 'corporate-events', 'Insights on MC work, event hosting and corporate culture', NULL, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(7, 'Team Building', 'team-building', 'Tips and guides for team bonding and workplace wellness', NULL, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(8, 'Life Coaching', 'life-coaching', 'Coaching perspectives on purpose, clarity and direction', NULL, '2026-05-15 17:21:23', '2026-05-15 17:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `su_contact_messages`
--

CREATE TABLE `su_contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Messages submitted via the Get in Touch / Contact form';

-- --------------------------------------------------------

--
-- Table structure for table `su_failed_jobs`
--

CREATE TABLE `su_failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_files`
--

CREATE TABLE `su_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_type` varchar(50) DEFAULT NULL,
  `mime_type` varchar(100) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `uploaded_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_gallery`
--

CREATE TABLE `su_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL COMMENT 'Stored filename / path relative to storage/app/public',
  `category` varchar(100) DEFAULT NULL COMMENT 'Optional tag: e.g. Weddings, Corporate, Team Building',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = visible, 0 = hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Gallery images — managed from admin panel';

--
-- Dumping data for table `su_gallery`
--

INSERT INTO `su_gallery` (`id`, `title`, `description`, `image`, `category`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Washingtone — MC in Action', NULL, 'washintone-event-mc-in-action.jpg', 'MC & Stage', 1, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(2, 'Stage Direction — Award Ceremony', NULL, 'washintone-stage-direction-award-main-image.jpg', 'MC & Stage', 2, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(3, 'Stage Direction — Holding Mic', NULL, 'washintone-stage-direction-holding-mic.jpg', 'MC & Stage', 3, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(4, 'Stage Direction — Award 3', NULL, 'washintone-stage-direction-award-3.jpg', 'Awards', 4, 1, '2026-05-15 17:21:23', '2026-05-16 04:20:46'),
(5, 'Stage Direction — Award', NULL, 'washintone-stage-direction-award.jpg', 'Awards', 5, 1, '2026-05-15 17:21:23', '2026-05-16 04:20:18'),
(6, 'Speaking on Mic', NULL, 'washintone-in-black-speaking-on-mic.jpg', 'MC & Stage', 6, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(7, 'Speaking on Mic 2', NULL, 'washintone-in-black-speaking-on-mic-2.jpg', 'MC & Stage', 7, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(8, 'After Event with People', NULL, 'washintone-after-event-with-people.jpg', 'MC & Stage', 8, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(9, 'Baby Shower MC', NULL, 'washingtone-oruko-in-baby-shower-mc.jpg', 'MC & Stage', 9, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(10, 'Baby Shower MC 2', NULL, 'washingtone-oruko-in-baby-shower-mc-2.jpg', 'MC & Stage', 10, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(11, 'MC with White', NULL, 'washingtone-mc-with-white.jpg', 'MC & Stage', 11, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(12, 'On Stage — Dancing', NULL, 'washingtone-oruko-on-stage-dancing.jpg', 'Dance', 12, 1, '2026-05-15 17:21:23', '2026-05-16 04:26:06'),
(13, 'On Stage — Singing', NULL, 'washingtone-oruko-on-stage-singing-2.jpg', 'MC & Stage', 13, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(14, 'On Stage — Singing Main', NULL, 'washingtone-oruko-on-stage-singing-3-main.jpg', 'MC & Stage', 14, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(15, 'Preparing Client for Event', NULL, 'washintone-preparing-client-for-event.jpg', 'Talks & Conferences', 15, 1, '2026-05-15 17:21:23', '2026-05-16 04:23:12'),
(16, 'Team Building — Outdoor', NULL, 'washingtone-doing-team-building.jpg', 'Team Building', 20, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(17, 'Team Building — Outdoor 2', NULL, 'washingtone-doing-team-building-2.jpg', 'Team Building', 21, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(18, 'Team Building — Indoors', NULL, 'washingtone-doing-team-building-indoors.jpg', 'Team Building', 22, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(19, 'Happy Team Building', NULL, 'washingtone-happy-team-building-2.jpg', 'Team Building', 23, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(20, 'Happy Team Building 3', NULL, 'washingtone-happy-team-building-3.jpg', 'Team Building', 24, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(21, 'Happy Team Building 4', NULL, 'washingtone-happy-team-building-4.jpg', 'Team Building', 25, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(22, 'Happy Team Building 5', NULL, 'washingtone-happy-team-building-5.jpg', 'Team Building', 26, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(23, 'School Team Building', NULL, 'washingtone-happy-team-building-school.jpg', 'Team Building', 27, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(24, 'School Team Building — Feast', NULL, 'washingtone-happy-team-building-school-feast.jpg', 'Team Building', 28, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(25, 'Talking at Team Building', NULL, 'washingtone-talking-at-team-building.jpg', 'Team Building', 29, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(26, 'Team Building — Black', NULL, 'team-building-black-image.jpg', 'Team Building', 30, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(27, 'Team Building — Black 2', NULL, 'team-building-black-image-2.jpg', 'Team Building', 31, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(28, 'Team Building — Dancing', NULL, 'team-building-while-people-dancing-image.jpg', 'Team Building', 32, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(29, 'Team Building — Dancing 2', NULL, 'team-building-while-people-dancing-image-2.jpg', 'Team Building', 33, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(30, 'Happy with Ladies', NULL, 'washingtone-happy-with-ladies.jpg', 'Team Building', 34, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(31, 'Highschool Talk', NULL, 'washingtone-talks-in-highschool.jpg', 'Talks & Conferences', 40, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(32, 'Highschool Talk 2', NULL, 'washingtone-talks-in-highschool-2.jpg', 'Talks & Conferences', 41, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(33, 'Talk — Grass Sitting', NULL, 'washintone-giving-talk-to-people-sitting-in-grass.jpg', 'Talks & Conferences', 42, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(34, 'Talk — Grass Sitting 2', NULL, 'washintone-giving-talk-to-people-sitting-in-grass-2.jpg', 'Talks & Conferences', 43, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(35, 'Talk — Grass Sitting 3', NULL, 'washintone-giving-talk-to-people-sitting-in-grass-3.jpg', 'Talks & Conferences', 44, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(36, 'Talk — Grass Sitting 4', NULL, 'washintone-giving-talk-to-people-sitting-in-grass-4.jpg', 'Talks & Conferences', 45, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(37, 'Conference — Holding a Lady', NULL, 'washintone-in-conference-holding-a-lady.jpg', 'Talks & Conferences', 46, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(38, 'Conference — Listening', NULL, 'washintone-in-conference-listening.jpg', 'Talks & Conferences', 47, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(39, 'Conference — Presenting Gift', NULL, 'washintone-in-conference-presenting-gift.jpg', 'Talks & Conferences', 48, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(40, 'Consultation with Foreigner', NULL, 'oruko-consultation-with-foreigner-image.jpg', 'Talks & Conferences', 49, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(41, 'Pointing in Field', NULL, 'washingtone-oruko-pointing-in-field.jpg', 'Talks & Conferences', 50, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(42, 'All Awards', NULL, 'all-washingtone-awards-presents-holding-them.jpg', 'Awards', 60, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(43, 'Receiving Awards', NULL, 'washingtone-receiving-awards.jpg', 'Awards', 61, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(44, 'Receiving Award', NULL, 'washingtone-receiving-award.jpg', 'Awards', 62, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(45, 'Holding More Awards', NULL, 'washingtone-holding-more-awards.jpg', 'Awards', 63, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(46, 'Carrying Awards', NULL, 'washingtone-carrying-awards.jpg', 'Awards', 64, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(47, 'Carrying Awards 2', NULL, 'washingtone-carrying-awards-2.jpg', 'Awards', 65, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(48, 'Dancing with People in Blue', NULL, 'washingtone-dancing-with-people-in-blue.jpg', 'Dance', 70, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(49, 'Dancing with Children', NULL, 'washingtone-dancing-with-children.jpg', 'Dance', 71, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(50, 'Dancing with Children 2', NULL, 'washingtone-dancing-with-children-2.jpg', 'Dance', 72, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(51, 'Traditional Dance', NULL, 'washingtone-dancing-traditional-dance.jpg', 'Dance', 73, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(52, 'Washingtone — In Black', NULL, 'washingtone-oruko-in-black.jpg', 'Portrait', 80, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(53, 'Wearing Maasai', NULL, 'washingtone-wearing-maasaiwashingtone-happy-team-building.jpg', 'Portrait', 81, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(54, 'MC & Stage Direction', NULL, '1778910588_f726afca-6413-4c75-a93f-bba517c0d3d2.jpg', 'Portrait', 0, 1, '2026-05-16 03:49:48', '2026-05-16 04:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `su_jobs`
--

CREATE TABLE `su_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(11) DEFAULT NULL,
  `available_at` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_notifications`
--

CREATE TABLE `su_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `su_notifications`
--

INSERT INTO `su_notifications` (`id`, `user_id`, `title`, `message`, `is_read`, `created_at`) VALUES
(1, 2, 'Payment Successful', 'Your payment has been received.', 0, '2026-03-15 04:35:02'),
(2, 2, 'Live Stream Reminder', 'Your stream starts in 1 hour.', 0, '2026-03-15 04:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `su_orders`
--

CREATE TABLE `su_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(50) NOT NULL COMMENT 'Human-readable order ref, e.g. ORD-20260515-0001',
  `customer_name` varchar(150) NOT NULL,
  `customer_email` varchar(150) DEFAULT NULL,
  `customer_phone` varchar(30) NOT NULL,
  `payment_method` enum('mpesa','whatsapp') NOT NULL DEFAULT 'whatsapp',
  `mpesa_transaction_code` varchar(50) DEFAULT NULL COMMENT 'M-Pesa confirmation code provided by customer',
  `total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` enum('pending','confirmed','processing','completed','cancelled') NOT NULL DEFAULT 'pending',
  `customer_notes` text DEFAULT NULL COMMENT 'Additional message from the customer at checkout',
  `admin_notes` text DEFAULT NULL COMMENT 'Internal notes by admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Customer orders from the Store / My Book page';

-- --------------------------------------------------------

--
-- Table structure for table `su_order_items`
--

CREATE TABLE `su_order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'NULL if product was later deleted',
  `product_name` varchar(255) NOT NULL COMMENT 'Snapshot of product name at time of order',
  `quantity` int(11) NOT NULL DEFAULT 1,
  `unit_price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Line items belonging to each store order';

-- --------------------------------------------------------

--
-- Table structure for table `su_page_content`
--

CREATE TABLE `su_page_content` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_slug` varchar(100) NOT NULL COMMENT 'Identifier: home, biography, privacy-policy, terms-conditions',
  `title` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL COMMENT 'Full HTML / rich-text content for the page',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Admin-editable content for static pages';

--
-- Dumping data for table `su_page_content`
--

INSERT INTO `su_page_content` (`id`, `page_slug`, `title`, `content`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'home', 'Home', NULL, NULL, NULL, '2026-05-15 13:15:58', '2026-05-15 13:15:58'),
(2, 'biography', 'Biography', NULL, NULL, NULL, '2026-05-15 13:15:58', '2026-05-15 13:15:58'),
(3, 'privacy-policy', 'Privacy Policy', NULL, NULL, NULL, '2026-05-15 13:15:58', '2026-05-15 13:15:58'),
(4, 'terms-conditions', 'Terms & Conditions', NULL, NULL, NULL, '2026-05-15 13:15:58', '2026-05-15 13:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `su_password_reset_tokens`
--

CREATE TABLE `su_password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `su_password_reset_tokens`
--

INSERT INTO `su_password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('info@elitehubcamp.com', '$2y$12$VpE7rhoMuElSi5bWaUblb.hhWyeKoslcozOJE85yJdUUDXM94BDUK', '2026-03-14 11:26:26'),
('sifuna.godfreyw@gmail.com', '$2y$12$xeC1VJCwNJE3dFTaGg/opeOrnk6hQn/1Ttd52ElaKmeiiIBMzPZ5W', '2026-03-17 04:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `su_personal_access_tokens`
--

CREATE TABLE `su_personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_rate_card_packages`
--

CREATE TABLE `su_rate_card_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(100) NOT NULL DEFAULT 'MC Services' COMMENT 'Grouping label, e.g. MC Services / Team Building / Dance Classes',
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00 COMMENT 'Base price in KES',
  `price_suffix` varchar(50) DEFAULT NULL COMMENT 'e.g. "per person", "per event" — shown after the price',
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'JSON array of package inclusions' CHECK (json_valid(`features`)),
  `is_featured` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Highlight this package on the Rate Card page',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = visible, 0 = hidden',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Admin-configurable Rate Card packages';

--
-- Dumping data for table `su_rate_card_packages`
--

INSERT INTO `su_rate_card_packages` (`id`, `category`, `title`, `description`, `price`, `price_suffix`, `features`, `is_featured`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
(8, 'School & Youth Events', 'School Concert & Talent Show MC', 'Professional MC services for school concerts, talent shows and prize-giving events.', 30000.00, NULL, '[\"Full event coordination & flow\",\"Engaging student introductions\",\"Prize-giving ceremony hosting\",\"Crowd energy management\",\"Pre-event rehearsal coordination\"]', 1, 1, 10, '2026-05-15 17:21:23', '2026-05-16 03:33:50'),
(9, 'School & Youth Events', 'Youth Talk & Motivation', 'Motivational talk and facilitation for youth groups, schools and youth conferences.', 20000.00, NULL, '[\"Interactive motivational session\",\"Purpose & goal-setting content\",\"Q&A facilitation\",\"Takeaway action plans for participants\",\"Customised to audience age group\"]', 0, 1, 11, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(10, 'Coaching & Wellness', 'Workplace Wellness Session', 'A structured wellness coaching session designed to improve staff morale, mental health awareness and workplace culture.', 45000.00, NULL, '[\"1-day facilitated wellness session\",\"Stress management tools\",\"Team communication workshops\",\"Individual reflection exercises\",\"Post-session action plan guide\"]', 1, 1, 12, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(11, 'Coaching & Wellness', 'Personal Coaching Package', 'One-on-one life coaching sessions focused on personal clarity, goal setting and life direction.', 15000.00, 'per session', '[\"90-minute individual session\",\"Values & purpose discovery\",\"Goal mapping exercise\",\"Accountability framework\",\"Follow-up summary notes\"]', 0, 1, 13, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(12, 'School & Youth Events', 'Youth Talks', 'Powerful motivational talks tailored for youth — schools, universities, youth conferences and community groups.', 35000.00, NULL, '[\"Customised motivational content\",\"Interactive Q&A session\",\"Purpose and goal-setting tools\",\"Bilingual delivery — English & Kiswahili\",\"Available for half-day or full-day events\"]', 0, 1, 14, '2026-05-16 05:37:48', '2026-05-16 05:37:48'),
(13, 'MC Services', 'Corporate MC', 'Premium corporate MC services for high-profile events — product launches, galas, award ceremonies and leadership summits.', 70000.00, NULL, '[\"Full event flow coordination\",\"Pre-event briefing and rehearsal\",\"Crowd engagement & energy management\",\"Professional stage presence\",\"Bilingual — English & Kiswahili\",\"Punctual, well-groomed and brand-aligned\"]', 1, 1, 3, '2026-05-16 05:37:48', '2026-05-16 05:37:48'),
(14, 'MC Services', 'Wedding MC', 'Elegant and memorable wedding MC services — keeping your big day flowing beautifully from start to finish.', 45000.00, NULL, '[\"Full wedding program coordination\",\"Introduction of wedding party\",\"Toast and speech facilitation\",\"Guest entertainment and crowd control\",\"Pre-wedding consultation included\",\"Formal and fun in equal measure\"]', 0, 1, 4, '2026-05-16 05:37:48', '2026-05-16 05:37:48'),
(15, 'Team Building', 'Team Building Session', 'High-energy team building facilitation designed to boost morale, communication and team cohesion.', 2000.00, 'per person', '[\"Customised activities for your team\",\"Indoor and outdoor options\",\"Leadership and trust-building exercises\",\"Motivational coaching throughout\",\"Post-session debrief and action plan\",\"Minimum 20 people\"]', 1, 1, 5, '2026-05-16 05:37:48', '2026-05-16 05:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `su_services`
--

CREATE TABLE `su_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `short_description` varchar(300) DEFAULT NULL,
  `features` longtext DEFAULT NULL COMMENT 'JSON array of feature bullet points',
  `description` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `su_services`
--

INSERT INTO `su_services` (`id`, `title`, `slug`, `short_description`, `features`, `description`, `icon`, `image`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
(19, 'Corporate MC Services', 'corporate-mc-services', 'Professional, energetic and unforgettable master of ceremonies for corporate events, award nights, conferences and more.', '[\"Over 200 events hosted across Kenya\",\"Baby showers, weddings and corporate gatherings\",\"Award ceremonies and leadership conferences\",\"Talent shows and beauty pageants\",\"Talk shows and product launches\",\"Bilingual — English and Kiswahili\"]', '<p>Washingtone Oruko is one of Kenya\'s most sought-after Corporate MCs, with over 10 years of experience hosting high-profile events across the country. He brings a perfect blend of professionalism, charisma and crowd intelligence to every function he hosts.</p>\r\n\r\n<p>Whether it is an annual staff gala, a product launch, an award ceremony or a leadership summit — Washingtone coordinates every aspect of your event with precision, keeping audiences engaged, entertained and on time throughout.</p>\r\n\r\n<p>His ability to read a room, adapt in real time and represent your brand with authenticity makes him the MC of choice for discerning organizations across Kenya.</p>', 'fas fa-microphone-alt', '1778871623_washintone-event-mc-in-action.jpg', 1, 1, '2026-05-15 18:06:48', '2026-05-15 17:00:23'),
(20, 'Team Building Facilitation', 'team-building-facilitation', 'Dynamic, results-driven team building sessions that boost morale, improve communication and unlock peak team performance.', '[\"Fully customized to your team and goals\",\"Outdoor and indoor session options\",\"Communication and trust-building activities\",\"Leadership emergence exercises\",\"Motivational coaching integrated throughout\",\"Post-session debrief and action planning\",\"Available for teams of 10 to 500+\"]', '<p>Washingtone has facilitated over 70 corporate team building sessions for organizations across Kenya, working with teams from diverse industries including banking, education, healthcare and hospitality.</p>\r\n\r\n<p>His team building programs go far beyond fun activities. Each session is purposefully designed to address real workplace challenges — communication breakdowns, low morale, leadership gaps and departmental silos — and replace them with trust, energy and shared vision.</p>\r\n\r\n<p>Every session is customized to your team\'s size, culture and specific goals, ensuring the experience delivers measurable change that participants carry back into their daily work.</p>', 'fas fa-users', '1778872690_washingtone-doing-team-building-2.jpg', 1, 2, '2026-05-15 18:06:48', '2026-05-15 17:18:10'),
(21, 'Life Coaching', 'life-coaching', 'One-on-one and group coaching sessions that help individuals discover purpose, set meaningful goals and take consistent action.', '[\"One-on-one private coaching sessions\",\"Purpose and values discovery\",\"Goal mapping and prioritization\",\"Accountability frameworks\",\"Mindset and confidence building\",\"Career and life transition support\",\"Available in-person or virtually\"]', '<p>As a certified life coach and the author of <em>Realign Your Compass</em>, Washingtone brings a deeply personal and results-oriented approach to coaching. He works with individuals who feel stuck, directionless or ready to level up — helping them move from confusion to clarity, and from intention to action.</p>\r\n\r\n<p>His coaching philosophy is rooted in three powerful questions: <strong>WHY</strong> do you exist, <strong>WHAT</strong> do you need to do to reach your destination, and <strong>HOW</strong> will you get there? These questions form the backbone of every coaching journey.</p>\r\n\r\n<p>Sessions are conducted one-on-one, in small groups, or as part of corporate wellness programs — in person or virtually.</p>', 'fas fa-compass', '1778871784_washingtone-mc-with-white.jpg', 1, 3, '2026-05-15 18:06:48', '2026-05-15 17:03:04'),
(22, 'Dance Classes & Choreography', 'dance-classes-choreography', 'Professional dance training for kids, youth and adults — at Kenya National Theatre and on location across Nairobi.', '[\"Classes for kids, youth and adults\",\"Multiple dance styles offered\",\"Kenya National Theatre based classes\",\"On-location classes available\",\"Corporate team building through dance\",\"Event choreography and performance\",\"Holiday and holiday camp programs\"]', '<p>Washingtone is a trained choreographer and dance instructor who has taught dance at the <strong>Kenya National Theatre</strong> for years, working with children, teenagers and adults across a wide range of styles.</p>\r\n\r\n<p>His classes are more than movement — they are a space for self-expression, confidence-building, discipline and joy. Students leave not just knowing how to dance, but feeling more comfortable in their own skin and more connected to their creative potential.</p>\r\n\r\n<p>Dance is also available as a team building or event activity, bringing energy, laughter and collaboration to corporate teams and event guests.</p>', 'fas fa-music', '1778871850_washingtone-doing-team-building.jpg', 1, 4, '2026-05-15 18:06:48', '2026-05-15 17:04:10'),
(23, 'Theatre Direction & Stage Script Writing', 'theatre-direction-stage-script-writing', 'Creative stage production, script writing and event direction that brings your story to life with impact and artistry.', '[\"Original stage script writing\",\"Full event direction and coordination\",\"School concert and talent show direction\",\"Beauty pageant direction and scripting\",\"Award ceremony production\",\"Corporate theatrical productions\",\"Rehearsal planning and coordination\"]', '<p>Washingtone is an experienced theatrical writer, stage director and event production coordinator. He has directed and produced numerous theatrical productions, school concerts and corporate stage performances across Kenya.</p>\r\n\r\n<p>His work as a stage director combines storytelling instinct, technical production knowledge and a deep understanding of audience psychology. Whether you need a script written from scratch, an existing story brought to life on stage, or an event professionally directed from start to finish — Washingtone delivers with creativity and precision.</p>\r\n\r\n<p>He has also played key roles in directing school concert events, beauty pageants and award ceremonies at national level.</p>', 'fas fa-theater-masks', '1778872766_washingtone-dancing-traditional-dance.jpg', 1, 5, '2026-05-15 18:06:48', '2026-05-15 17:19:26'),
(24, 'Motivational Talks & Speaking', 'motivational-talks-speaking', 'Powerful, authentic and transformative motivational talks for schools, corporates, churches and community organizations.', '[\"Keynote speaking for conferences and summits\",\"School and university motivational talks\",\"Church and community speaking engagements\",\"Corporate staff motivation sessions\",\"Youth empowerment programs\",\"Fully customized to your theme and audience\",\"Bilingual delivery — English and Kiswahili\"]', '<p>Washingtone is a gifted speaker who has delivered motivational talks to thousands of people across Kenya — in schools, universities, corporate organizations, churches and community groups. His talks are not generic inspirational content — they are carefully crafted, deeply personal and contextually relevant to each audience he addresses.</p>\r\n\r\n<p>Drawing from his own journey, his book <em>Realign Your Compass</em>, and over a decade of working with people across all walks of life, Washingtone speaks to the core of what drives human behaviour — purpose, identity, resilience and action.</p>\r\n\r\n<p>Each talk is customized to the theme, audience and objectives of your event, ensuring maximum relevance and lasting impact.</p>', 'fas fa-bullhorn', '1778872821_washingtone-mc-with-white.jpg', 1, 6, '2026-05-15 18:06:48', '2026-05-15 17:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `su_sessions`
--

CREATE TABLE `su_sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_settings`
--

CREATE TABLE `su_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `site_email` varchar(150) DEFAULT NULL,
  `support_email` varchar(150) DEFAULT NULL,
  `support_phone` varchar(50) DEFAULT NULL,
  `whatsapp_number` varchar(50) DEFAULT NULL,
  `alternative_phone` varchar(50) DEFAULT NULL,
  `business_location` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL COMMENT 'Twitter/X profile URL',
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `hero_title` varchar(255) DEFAULT NULL COMMENT 'Main headline on home hero section',
  `hero_subtitle` text DEFAULT NULL COMMENT 'Sub-text on home hero section',
  `hero_image` varchar(255) DEFAULT NULL,
  `about_short` text DEFAULT NULL COMMENT 'Short bio blurb on Home page',
  `mpesa_paybill` varchar(50) DEFAULT NULL COMMENT 'M-Pesa Paybill or Till Number',
  `mpesa_account_name` varchar(100) DEFAULT NULL,
  `whatsapp_order_number` varchar(50) DEFAULT NULL COMMENT 'WhatsApp number for store orders',
  `meta_description` text DEFAULT NULL COMMENT 'Default SEO meta description',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `su_settings`
--

INSERT INTO `su_settings` (`id`, `site_name`, `site_email`, `support_email`, `support_phone`, `whatsapp_number`, `alternative_phone`, `business_location`, `facebook`, `instagram`, `linkedin`, `tiktok`, `youtube`, `twitter`, `logo`, `favicon`, `hero_title`, `hero_subtitle`, `hero_image`, `about_short`, `mpesa_paybill`, `mpesa_account_name`, `whatsapp_order_number`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Washingtone Oruko', 'info@washingtoneoruko.com', 'info@washingtoneoruko.com', '+254 710 504259', '254710504259', NULL, 'Parklands - Nairobi, Kenya', 'https://www.facebook.com/washingtone.odywuor/', 'https://www.instagram.com/odywuor/', NULL, 'https://www.tiktok.com/@washyody', 'https://www.youtube.com/@washythemotivator4900', 'https://x.com/odywuor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-05-16 03:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `su_store_products`
--

CREATE TABLE `su_store_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` varchar(500) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `image` varchar(255) DEFAULT NULL COMMENT 'Primary / cover image',
  `gallery_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'JSON array of extra image filenames' CHECK (json_valid(`gallery_images`)),
  `stock_quantity` int(11) DEFAULT NULL COMMENT 'NULL = unlimited stock',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Products / books sold via the Store page';

--
-- Dumping data for table `su_store_products`
--

INSERT INTO `su_store_products` (`id`, `title`, `slug`, `short_description`, `description`, `price`, `image`, `gallery_images`, `stock_quantity`, `is_featured`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
(2, 'Realign Your Compass', 'realign-your-compass', 'A powerful self-help book by Washingtone Oruko — discover your WHY, define your WHAT, and master your HOW.', '<p>I purposely wrote <strong>Realigning Your Compass</strong> to create a conscious awareness that can help transform your life, propelling you to the level of your inner convictions, desires and aspirations.</p>\r\n\r\n<p>With this book, you will be able to answer the questions as to:</p>\r\n<ul>\r\n  <li><strong>WHY</strong> you exist in this world</li>\r\n  <li><strong>WHAT</strong> you need to do to get to your dreams land</li>\r\n  <li><strong>HOW</strong> to accomplish your desires for optimum fulfilment and satisfaction</li>\r\n</ul>\r\n\r\n<p>Its principles, strategies, tools and laws of success are deep-rooted into the laws of nature, which simply define every aspect of life and human dimension, hence very effective in creating long lasting change.</p>\r\n\r\n<p>Whether you are at a crossroads, feeling stuck, or simply ready to level up — this book will serve as your compass, pointing you back to the truest version of yourself.</p>\r\n\r\n<p><em>Order your copy today and begin the journey of transformation.</em></p>', 2500.00, 'washingtone-book-realine-compass.jpg', NULL, 100, 1, 'active', 0, '2026-05-15 17:21:23', '2026-05-15 17:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `su_users`
--

CREATE TABLE `su_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','suspended','pending') DEFAULT 'active',
  `has_active_subscription` tinyint(1) DEFAULT 0,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `su_users`
--

INSERT INTO `su_users` (`id`, `role_id`, `first_name`, `last_name`, `email`, `phone`, `password`, `avatar`, `email_verified_at`, `status`, `has_active_subscription`, `last_login_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 1, 'Godfrey', 'Sifuna', 'sifuna.godfreyw@gmail.com', NULL, '$2y$12$RRIn7YctjjwNkwNk/1waxOEAi3.62M34fNY84xqwBYNbQKr5DKqE2', NULL, NULL, 'active', 0, NULL, NULL, '2026-03-14 11:29:11', '2026-03-14 11:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `su_user_logs`
--

CREATE TABLE `su_user_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `status` enum('success','failed','pending') NOT NULL DEFAULT 'success',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `su_user_logs`
--

INSERT INTO `su_user_logs` (`id`, `user_id`, `type`, `title`, `message`, `meta`, `ip_address`, `user_agent`, `status`, `created_at`) VALUES
(1, NULL, 'email', 'Welcome Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"hopesifuna@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'failed', '2026-03-17 05:42:22'),
(2, NULL, 'email', 'Verification Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"hopesifuna@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'failed', '2026-03-17 05:42:43'),
(3, NULL, 'registration', 'User Registered', 'New user account created', '{\"email\":\"hopesifuna@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'success', '2026-03-17 05:42:43'),
(4, NULL, 'email', 'Password Reset Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'failed', '2026-03-17 05:51:44'),
(5, NULL, 'password', 'Password Reset Requested', 'Reset email sent', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'success', '2026-03-17 05:51:44'),
(6, NULL, 'admin_login', 'Admin Login Failed', 'Invalid credentials', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'failed', '2026-03-17 06:17:56'),
(7, NULL, 'admin_login', 'Admin Login Failed', 'Invalid credentials', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'failed', '2026-03-17 06:18:03'),
(8, NULL, 'email', 'Welcome Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'failed', '2026-03-17 07:18:59'),
(9, NULL, 'email', 'Verification Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'failed', '2026-03-17 07:19:20'),
(10, NULL, 'registration', 'User Registered', 'New user account created', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'success', '2026-03-17 07:19:20'),
(11, NULL, 'email', 'Password Reset Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'failed', '2026-03-17 07:20:06'),
(12, NULL, 'password', 'Password Reset Requested', 'Reset email sent', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'success', '2026-03-17 07:20:06'),
(13, NULL, 'login', 'User Logged In', 'User logged in successfully', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'success', '2026-03-17 10:12:43'),
(14, NULL, 'logout', 'User Logged Out', 'User logged out', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'success', '2026-03-17 10:15:49'),
(15, 8, 'login', 'User Logged In', 'User logged in successfully', '{\"email\":\"hopesifuna@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'success', '2026-03-17 10:15:59'),
(16, 8, 'logout', 'User Logged Out', 'User logged out', '{\"email\":\"hopesifuna@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'success', '2026-03-17 10:16:39'),
(17, 8, 'login', 'User Logged In', 'User logged in successfully', '{\"email\":\"hopesifuna@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'success', '2026-03-17 10:16:55'),
(18, 8, 'logout', 'User Logged Out', 'User logged out', '{\"email\":\"hopesifuna@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'success', '2026-03-17 10:24:41'),
(19, 8, 'login', 'User Logged In', 'User logged in successfully', '{\"email\":\"hopesifuna@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 09:59:22'),
(20, 8, 'logout', 'User Logged Out', 'User logged out', '{\"email\":\"hopesifuna@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 10:00:14'),
(21, NULL, 'email', 'Verification Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"hopesifunaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'failed', '2026-03-18 10:02:57'),
(22, NULL, 'email', 'Welcome Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"hopesifunaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'failed', '2026-03-18 10:03:18'),
(23, NULL, 'registration', 'User Registered', 'New user account created', '{\"email\":\"hopesifunaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 10:03:18'),
(24, 10, 'logout', 'User Logged Out', 'User logged out', '{\"email\":\"hopesifunaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 10:03:30'),
(25, 10, 'login', 'User Logged In', 'User logged in successfully', '{\"email\":\"hopesifunaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 10:03:46'),
(26, 10, 'logout', 'User Logged Out', 'User logged out', '{\"email\":\"hopesifunaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 12:16:51'),
(27, 10, 'login', 'User Logged In', 'User logged in successfully', '{\"email\":\"hopesifunaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 12:17:47'),
(28, NULL, 'email', 'Verification Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"hopesifunaaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'failed', '2026-03-18 12:17:49'),
(29, 10, 'logout', 'User Logged Out', 'User logged out', '{\"email\":\"hopesifunaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 12:18:09'),
(30, NULL, 'email', 'Welcome Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"hopesifunaaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'failed', '2026-03-18 12:18:10'),
(31, NULL, 'registration', 'User Registered', 'New user account created', '{\"email\":\"hopesifunaaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 12:18:10'),
(32, NULL, 'admin_login', 'Unauthorized Admin Access', 'User attempted admin login', '{\"email\":\"hopesifunaa@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'failed', '2026-03-18 12:18:17'),
(33, 6, 'email', '2FA Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"info@elitehubcamp.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'failed', '2026-03-18 12:19:15'),
(34, NULL, 'admin_login', '2FA Code Sent', 'Admin login requires OTP', '{\"email\":\"info@elitehubcamp.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 12:19:15'),
(35, NULL, 'email', 'Verification Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"admin@elitehubcamp.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'failed', '2026-03-18 14:04:51'),
(36, NULL, 'email', 'Welcome Email Failed', 'Connection could not be established with host \"mail.elitehubcamp.com:587\": stream_socket_client(): Unable to connect to mail.elitehubcamp.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"admin@elitehubcamp.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'failed', '2026-03-18 14:05:12'),
(37, NULL, 'registration', 'User Registered', 'New user account created', '{\"email\":\"admin@elitehubcamp.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'success', '2026-03-18 14:05:12'),
(38, NULL, 'admin_login', 'Unauthorized Admin Access', 'User attempted admin login', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:11:35'),
(39, NULL, 'admin_login', 'Unauthorized Admin Access', 'User attempted admin login', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:22:51'),
(40, NULL, 'admin_login', 'Unauthorized Admin Access', 'User attempted admin login', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:22:51'),
(41, NULL, 'admin_login', 'Unauthorized Admin Access', 'User attempted admin login', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:22:55'),
(42, NULL, 'admin_login', 'Unauthorized Admin Access', 'User attempted admin login', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:24:24'),
(43, NULL, 'admin_login', 'Admin Login Failed', 'Invalid credentials', '{\"email\":\"sifuna.godfrey@gsmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:24:40'),
(44, NULL, 'admin_login', 'Admin Login Failed', 'Invalid credentials', '{\"email\":\"sifuna.godfrey@gsmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:24:40'),
(45, NULL, 'admin_login', 'Unauthorized Admin Access', 'User attempted admin login', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:26:31'),
(46, NULL, 'admin_login', 'Admin Login Failed', 'Invalid credentials', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:34:22'),
(47, NULL, 'admin_login', 'Admin Login Failed', 'Invalid credentials', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:34:26'),
(48, 3, 'email', '2FA Email Failed', 'Connection could not be established with host \"mail.neptunesmovers.com:587\": stream_socket_client(): Unable to connect to mail.neptunesmovers.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:38:25'),
(49, NULL, 'admin_login', '2FA Code Sent', 'Admin login requires OTP', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'success', '2026-04-15 07:38:25'),
(50, 3, 'email', '2FA Email Failed', 'Connection could not be established with host \"mail.neptunesmovers.com:587\": stream_socket_client(): Unable to connect to mail.neptunesmovers.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:43:34'),
(51, NULL, 'admin_login', '2FA Code Sent', 'Admin login requires OTP', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'success', '2026-04-15 07:43:34'),
(52, 3, 'email', '2FA Email Failed', 'Connection could not be established with host \"mail.neptunesmovers.com:587\": stream_socket_client(): Unable to connect to mail.neptunesmovers.com:587 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond)', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-15 07:43:34'),
(53, NULL, 'admin_login', '2FA Code Sent', 'Admin login requires OTP', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'success', '2026-04-15 07:43:34'),
(54, 3, 'admin_login', 'Admin Login Success', 'Admin logged in successfully', '{\"user_id\":3}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'success', '2026-04-15 07:47:32'),
(55, NULL, 'admin_login', 'Admin Login Failed', 'Invalid credentials', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'failed', '2026-04-16 06:17:08'),
(56, 3, 'admin_login', 'Admin Login Success', 'Admin logged in successfully', '{\"user_id\":3}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'success', '2026-04-16 06:17:13'),
(57, 3, 'admin_login', 'Admin Login Success', 'Admin logged in successfully', '{\"user_id\":3}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'success', '2026-04-16 06:17:13'),
(58, 3, 'logout', 'User Logged Out', 'User logged out', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'success', '2026-04-16 11:25:35'),
(59, 3, 'login', 'User Logged In', 'User logged in successfully', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'success', '2026-04-16 11:25:43'),
(60, 3, 'login', 'User Logged In', 'User logged in successfully', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'success', '2026-04-17 06:19:12'),
(61, NULL, 'login', 'Login Failed', 'Invalid credentials', '{\"email\":\"hopesifuna@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'failed', '2026-05-15 13:22:41'),
(62, NULL, 'login', 'Login Failed', 'Invalid credentials', '{\"email\":\"admin@washingtoneoruko.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'failed', '2026-05-15 13:23:22'),
(63, NULL, 'login', 'Login Failed', 'Invalid credentials', '{\"email\":\"sifuna.godfrey@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'failed', '2026-05-15 13:23:33'),
(64, NULL, 'login', 'Login Failed', 'Invalid credentials', '{\"email\":\"sifuna.godfreyw@gmail.co\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'failed', '2026-05-15 14:17:37'),
(65, NULL, 'login', 'Login Failed', 'Invalid credentials', '{\"email\":\"hopesifuna@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'failed', '2026-05-15 14:17:42'),
(66, 3, 'login', 'User Logged In', 'User logged in successfully', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'success', '2026-05-15 14:18:19'),
(67, 3, 'login', 'User Logged In', 'User logged in successfully', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '102.204.12.234', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'success', '2026-05-15 18:00:37'),
(68, 3, 'login', 'User Logged In', 'User logged in successfully', '{\"email\":\"sifuna.godfreyw@gmail.com\"}', '102.204.12.234', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'success', '2026-05-16 05:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `su_user_profiles`
--

CREATE TABLE `su_user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `file_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `su_user_roles`
--

CREATE TABLE `su_user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `su_user_roles`
--

INSERT INTO `su_user_roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL, NULL),
(2, 'User', 'user', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `su_videos`
--

CREATE TABLE `su_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `youtube_url` varchar(500) NOT NULL COMMENT 'Full YouTube URL e.g. https://www.youtube.com/watch?v=XXXXX',
  `youtube_id` varchar(20) DEFAULT NULL COMMENT 'Extracted video ID — used for embed & thumbnail',
  `thumbnail` varchar(255) DEFAULT NULL COMMENT 'Custom thumbnail override (optional); else use YouTube default',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='YouTube videos shown on the Videos page';

--
-- Dumping data for table `su_videos`
--

INSERT INTO `su_videos` (`id`, `title`, `description`, `youtube_url`, `youtube_id`, `thumbnail`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Washingtone Oruko — Motivational Talk', 'Watch Washingtone deliver a powerful motivational talk that has inspired thousands across Kenya.', 'https://www.youtube.com/watch?v=W4V0HJPdO04', 'W4V0HJPdO04', NULL, 1, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23'),
(2, 'Washingtone Oruko — In Action', 'Washingtone Oruko — corporate MC, life coach and author — showcasing his craft.', 'https://www.youtube.com/watch?v=qwjd6nR0Kkw', 'qwjd6nR0Kkw', NULL, 2, 1, '2026-05-15 17:21:23', '2026-05-15 17:21:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `su_admin_2fa_tokens`
--
ALTER TABLE `su_admin_2fa_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `su_admin_2fa_tokens_user_id_foreign` (`user_id`);

--
-- Indexes for table `su_blogs`
--
ALTER TABLE `su_blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `su_blog_categories`
--
ALTER TABLE `su_blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `su_contact_messages`
--
ALTER TABLE `su_contact_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_is_read` (`is_read`);

--
-- Indexes for table `su_failed_jobs`
--
ALTER TABLE `su_failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`);

--
-- Indexes for table `su_files`
--
ALTER TABLE `su_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uploaded_by` (`uploaded_by`);

--
-- Indexes for table `su_gallery`
--
ALTER TABLE `su_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_status_sort` (`status`,`sort_order`);

--
-- Indexes for table `su_jobs`
--
ALTER TABLE `su_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `su_notifications`
--
ALTER TABLE `su_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `su_orders`
--
ALTER TABLE `su_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_number` (`order_number`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_payment_method` (`payment_method`);

--
-- Indexes for table `su_order_items`
--
ALTER TABLE `su_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `su_page_content`
--
ALTER TABLE `su_page_content`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_slug` (`page_slug`);

--
-- Indexes for table `su_password_reset_tokens`
--
ALTER TABLE `su_password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `su_personal_access_tokens`
--
ALTER TABLE `su_personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `su_rate_card_packages`
--
ALTER TABLE `su_rate_card_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_status_sort` (`status`,`sort_order`);

--
-- Indexes for table `su_services`
--
ALTER TABLE `su_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `su_sessions`
--
ALTER TABLE `su_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `su_settings`
--
ALTER TABLE `su_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `su_store_products`
--
ALTER TABLE `su_store_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `idx_status` (`status`);

--
-- Indexes for table `su_users`
--
ALTER TABLE `su_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_users_role` (`role_id`);

--
-- Indexes for table `su_user_logs`
--
ALTER TABLE `su_user_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `su_user_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `su_user_profiles`
--
ALTER TABLE `su_user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Indexes for table `su_user_roles`
--
ALTER TABLE `su_user_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `su_videos`
--
ALTER TABLE `su_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_status_sort` (`status`,`sort_order`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `su_admin_2fa_tokens`
--
ALTER TABLE `su_admin_2fa_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `su_blogs`
--
ALTER TABLE `su_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `su_blog_categories`
--
ALTER TABLE `su_blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `su_contact_messages`
--
ALTER TABLE `su_contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_failed_jobs`
--
ALTER TABLE `su_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_files`
--
ALTER TABLE `su_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_gallery`
--
ALTER TABLE `su_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `su_jobs`
--
ALTER TABLE `su_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_notifications`
--
ALTER TABLE `su_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `su_orders`
--
ALTER TABLE `su_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_order_items`
--
ALTER TABLE `su_order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_page_content`
--
ALTER TABLE `su_page_content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `su_personal_access_tokens`
--
ALTER TABLE `su_personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_rate_card_packages`
--
ALTER TABLE `su_rate_card_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `su_services`
--
ALTER TABLE `su_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `su_settings`
--
ALTER TABLE `su_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `su_store_products`
--
ALTER TABLE `su_store_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `su_users`
--
ALTER TABLE `su_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `su_user_logs`
--
ALTER TABLE `su_user_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `su_user_profiles`
--
ALTER TABLE `su_user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `su_user_roles`
--
ALTER TABLE `su_user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `su_videos`
--
ALTER TABLE `su_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `su_blogs`
--
ALTER TABLE `su_blogs`
  ADD CONSTRAINT `su_blogs_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `su_blog_categories` (`id`),
  ADD CONSTRAINT `su_blogs_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `su_users` (`id`);

--
-- Constraints for table `su_order_items`
--
ALTER TABLE `su_order_items`
  ADD CONSTRAINT `su_order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `su_orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `su_order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `su_store_products` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
