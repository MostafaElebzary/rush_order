<?php

namespace Database\Seeders;

use App\Models\NotificationSetting;
use Illuminate\Database\Seeder;

class NotificationSettingSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => "تسجيل عميل",
            ],[
                'title' => "طلب توصيل",
            ],[
                'title' => "طلب استلام من السيارة",
            ],[
                'title' => "طلب استلام من الفرع",
            ],[
                'title' => "استلام الطلب",
            ],[
                'title' => "استلام الطب من السيارة",
            ],[
                'title' => "استلام الطب من الفرع",
            ]
        ];

        NotificationSetting::truncate();
        foreach ($data as $row) {

            NotificationSetting::create($row);


        }
    }
}
