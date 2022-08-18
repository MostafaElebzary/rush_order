<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Branch;
use App\Models\Company;
use App\Models\Copoun;
use Illuminate\Database\Seeder;

class CompanySeed extends Seeder
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
                'title_ar' => "مطاعم",
                'title_en' => "resturants",
                'image' => '1.jpg',
                'parent_id' => null,


            ],
        ];
        foreach ($data as $row) {
            Activity::updateOrCreate($row);
        }

        $data = [
            [
                'title_ar' => 'شركة 1',
                'title_en' => 'company 1',
                'logo' => '1.jpg',
                'banner' => '1.png',
                'location' => 'www.googlemap.com',
                'phone1' => '0101010101010',
                'phone2' => '0151515151515',
                'email1' => 'c1@gmail.com',
                'email2' => 'c1@gmail.com',
                'activity_id' => 1,
                'owner_name' => 'owner',
                'owner_phone' => '010101010',
                'ceo_name' => 'ceo',
                'ceo_phone' => '01010',
                'commercial_file' => '0',
                'branches_count' => '0',
                'maroof_id' => null,
                'lat' => '18.1725',
                'lng' => '10.1851',
                'is_active' => 1,
                'expire_date' => '2022-09-01',
                'delivery_price' => 15.30,

            ],
            [
                'title_ar' => 'شركة 2',
                'title_en' => 'company 2',
                'logo' => '2.jpg',
                'banner' => '2.png',
                'location' => 'www.googlemap2.com',
                'phone1' => '01022220101010',
                'phone2' => '01512215151515',
                'email1' => 'c2@gmail.com',
                'email2' => 'c2@gmail.com',
                'activity_id' => '1',
                'owner_name' => 'owner2',
                'owner_phone' => '01010102210',
                'ceo_name' => 'ceo2',
                'ceo_phone' => '0101220',
                'commercial_file' => '2',
                'branches_count' => '2',
                'maroof_id' => null,
                'lat' => '18.1725',
                'lng' => '11.1851',
                'is_active' => 1,
                'expire_date' => '2022-09-01',
                'delivery_price' => 15.30,

            ],
            [
                'title_ar' => 'شركة 3',
                'title_en' => 'company 3',
                'logo' => '3.jpg',
                'banner' => '3.png',
                'location' => 'www.googlemap3.com',
                'phone1' => '01022220333330',
                'phone2' => '01512215131515',
                'email1' => 'c23@gmail.com',
                'email2' => 'c23@gmail.com',
                'activity_id' => 1,
                'owner_name' => 'owner23',
                'owner_phone' => '010101302210',
                'ceo_name' => 'ceo32',
                'ceo_phone' => '01013220',
                'commercial_file' => '3',
                'branches_count' => '3',
                'maroof_id' => null,
                'lat' => '18.1725',
                'lng' => '11.1851',
                'is_active' => 1,
                'expire_date' => '2022-09-01',
                'delivery_price' => 15.30,

            ],

        ];
        foreach ($data as $row) {
            Company::updateOrCreate($row);
        }


        $data = [
            [
                'company_id' => 1,
                'city_id' => 1,
                'title_ar' => 'branch 1',
                'title_en' => 'branch 1',
                'lat' => '18.1725',
                'lng' => '11.1851',
                'delivery_time' => '30-60',

            ],
            [
                'company_id' => 1,
                'city_id' => 1,
                'title_ar' => 'branch 2',
                'title_en' => 'branch 2',
                'lat' => '35.1725',
                'lng' => '18.1851',
                'delivery_time' => '30-60',

            ],
            [
                'company_id' => 1,
                'city_id' => 1,
                'title_ar' => 'branch 3',
                'title_en' => 'branch 3',
                'lat' => '25.1725',
                'lng' => '38.1851',
                'delivery_time' => '30-60',

            ],

            [
                'company_id' => 2,
                'city_id' => 1,
                'title_ar' => 'branch 1',
                'title_en' => 'branch 1',
                'lat' => '18.1725',
                'lng' => '11.1851',
                'delivery_time' => '30-60',

            ],
            [
                'company_id' => 2,
                'city_id' => 1,
                'title_ar' => 'branch 2',
                'title_en' => 'branch 2',
                'lat' => '35.1725',
                'lng' => '18.1851',
                'delivery_time' => '30-60',

            ],
            [
                'company_id' => 2,
                'city_id' => 1,
                'title_ar' => 'branch 3',
                'title_en' => 'branch 3',
                'lat' => '25.1725',
                'lng' => '38.1851',
                'delivery_time' => '30-60',

            ],
        ];
        foreach ($data as $row) {
            Branch::updateOrCreate($row);
        }
        $data = [

            [
                'code' => "rush60",
                'from_date' => "2022-08-01",
                'to_date' => "2022-09-01",
                'amount' => '60',
                'discount_type' => 'Ratio',
                'active' => 1,


            ],
        ];
        foreach ($data as $row) {
            Copoun::updateOrCreate($row);
        }


    }
}
