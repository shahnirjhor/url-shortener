<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ApplicationSetting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ApplicationSetting::create([
            'item_name' => 'URL Shortener',
            'item_short_name' => 'URL Shortener',
            'item_version' => 'V 1.0',
            'company_name' => '#',
            'company_email' => 'info@gmail.com',
            'company_address' => 'Dhaka, Bangladesh',
            'developed_by' => 'Rakib Hossain',
            'developed_by_href' => '#',
            'developed_by_title' => 'Your hope our goal',
            'developed_by_prefix' => 'Developed by',
            'support_email' => '#',
            'language' => 'en',
            'is_demo' => '0',
            'time_zone' => 'Asia/Dhaka',
        ]);
    }
}
