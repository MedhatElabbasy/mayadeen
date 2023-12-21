<?php

namespace Database\Seeders;

use App\Models\Story;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            Story::create([
                'title' => "القصة  $i",
                'description' => "قصة رقم $i من العصور القديمة",
                'content' => "تأخذنا إلى عمق العصور القديمة، حيث يتقاطع الحلم مع الواقع. في هذا الزمان، نشهد قصة غامضة تتناول تحديات ومحن أبطال لا يعرفون المستحيل.",
                'w1_name' => "اسم الكاتب 1 - رقم $i",
                'w1_number' => "   $i",
                'w1_email' => "writer1_$i@example.com",
                'w2_name' => "اسم الكاتب 2 - رقم $i",
                'w2_number' => "   $i",
                'w2_email' => "writer2_$i@example.com",
                'w3_name' => "اسم الكاتب 3 - رقم $i",
                'w3_number' => "   $i",
                'w3_email' => "writer3_$i@example.com",
            ]);
        }


    }
}