<?php

namespace Database\Seeders;

use App\Models\WriterHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WriterHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // WriterHistory::create([
        //     'title'=>'القصيدة الأولي ',
        //     'description'=>'rwd]m من العصر الحديث ',
        //     'content'=>' تنقلنا إلى العصر الحديث، حيث يتقاطع القديم مع المستقبل. قصة تروي تحولات العالم الحديث، وكيف يتغير وجه التاريخ بين لحظة وأخرى.تنقلنا إلى العصر الحديث، حيث يتقاطع القديم مع المستقبل. قصة تروي تحولات العالم الحديث، وكيف يتغير وجه التاريخ بين لحظة وأخرى. ',
        //     'auther_name'=>'احمد محمد ',
        //     'about_auther'=>' مواليد سنة 1980 '
        // ]);


        for ($i = 1; $i <= 20; $i++) {
            WriterHistory::create([
                'title' => "القصيدة الـ$i",
                'description' => "قصيدة  من العصر الحديث رقم $i",
                'content' => "تنقلنا إلى العصر الحديث، حيث يتقاطع القديم مع المستقبل. قصة تروي تحولات العالم الحديث، وكيف يتغير وجه التاريخ بين لحظة وأخرى.",
                'auther_name' => "احمد محمد $i",
                'about_auther' => "مواليد سنة 198$i",
            ]);
        }
    }
}
