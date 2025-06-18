<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\News;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create categories
        $categories = [
            [
                'name' => 'Teknologi Pendidikan',
                'description' => 'Berita seputar perkembangan teknologi dalam dunia pendidikan'
            ],
            [
                'name' => 'E-Learning',
                'description' => 'Informasi terkini tentang pembelajaran elektronik dan platform online'
            ],
            [
                'name' => 'Inovasi Edukasi',
                'description' => 'Berbagai inovasi dan terobosan baru dalam bidang pendidikan'
            ],
            [
                'name' => 'Digital Learning',
                'description' => 'Pembelajaran digital dan transformasi pendidikan era modern'
            ],
            [
                'name' => 'Kursus Online',
                'description' => 'Informasi seputar kursus-kursus online dan pembelajaran jarak jauh'
            ]
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }

        // Create news with existing categories
        News::factory(20)->create();
        
        // Create some specific news with custom content
        $customNews = [
            [
                'title' => 'Revolusi Pembelajaran Online di Era Digital',
                'excerpt' => 'Bagaimana teknologi mengubah cara kita belajar dan mengajar di era digital ini.',
                'content' => 'Era digital telah membawa perubahan besar dalam dunia pendidikan. Pembelajaran online kini menjadi pilihan utama bagi banyak institusi pendidikan di seluruh dunia. Dengan berbagai platform pembelajaran yang tersedia, siswa dapat mengakses materi pelajaran kapan saja dan di mana saja.

Teknologi telah memungkinkan terciptanya lingkungan belajar yang lebih interaktif dan engaging. Video pembelajaran, simulasi virtual, dan gamifikasi menjadi tools yang semakin populer digunakan oleh para educator.

Namun, tantangan juga muncul dalam implementasi pembelajaran online. Infrastruktur teknologi, literasi digital, dan motivasi belajar siswa menjadi faktor-faktor penting yang perlu diperhatikan.',
                'author' => 'Dr. Ahmad Santoso',
                'is_published' => true,
                'published_at' => now()->subDays(1),
                'category_id' => Category::where('name', 'Teknologi Pendidikan')->first()->id
            ],
            [
                'title' => 'Tips Memilih Platform E-Learning yang Tepat',
                'excerpt' => 'Panduan lengkap memilih platform pembelajaran online yang sesuai dengan kebutuhan Anda.',
                'content' => 'Memilih platform e-learning yang tepat adalah langkah penting dalam kesuksesan pembelajaran online. Ada beberapa faktor yang perlu dipertimbangkan dalam memilih platform yang sesuai.

Pertama, pastikan platform tersebut user-friendly dan mudah digunakan. Interface yang kompleks dapat menghambat proses pembelajaran. Kedua, fitur-fitur yang tersedia harus sesuai dengan kebutuhan pembelajaran Anda.

Ketiga, perhatikan sistem support dan customer service yang disediakan. Platform yang baik harus memiliki tim support yang responsif. Terakhir, pertimbangkan juga aspek biaya dan value yang ditawarkan.',
                'author' => 'Prof. Sari Wulandari',
                'is_published' => true,
                'published_at' => now()->subDays(3),
                'category_id' => Category::where('name', 'E-Learning')->first()->id
            ]
        ];

        foreach ($customNews as $newsData) {
            News::create($newsData);
        }
    }
}