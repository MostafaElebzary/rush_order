<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeed extends Seeder
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
                'key' => "aboutus_ar",
                'value' => "aboutus_ar",
            ],
            [
                'key' => "aboutus_en",
                'value' => "aboutus_en",
            ],
            [
                'key' => "email",
                'value' => "email@email.com",
            ], [
                'key' => "phone",
                'value' => "966505505050",
            ], [
                'key' => "whatsapp",
                'value' => "966505509090",
            ], [
                'key' => "facebook",
                'value' => "www.facebook.com/rush-order",
            ], [
                'key' => "twiter",
                'value' => "www.twitter.com/rush-order",
            ], [
                'key' => "instagram",
                'value' => "www.instagram.com/rush-order",
            ], [
                'key' => "privacy",
                'value' => "privacy",
            ], [
                'key' => "terms",
                'value' => "terms",
            ],
        ];
        foreach ($data as $row) {
            Setting::updateOrCreate($row);
        }
    }
}
