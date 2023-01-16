<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SettingWebsite::create([
            'logo' => 'logo_default.png',
            // 'footer' => 'logo_default.png',
            'favicon'  => 'favicon_default.png',
            'title_web' => 'Rumah Makan Mitra',
            'name_web'  => 'Rumah Makan Mitra',
            'footer_web'  => 'GIFY TECH',
            'desc_web'  => 'Let&#39;s Connect',
            'version_web'  => '1.0',
            'wa'  => '85767113554',
            'phone'  => '85767113554',
            'mail'  => 'hello@mail.id',
            'address'  => 'Indonesia',
            'instagram'  => 'https://www.instagram.com/',
            'twitter'  => 'https://twitter.com/',
            'facebook'  => 'https://www.facebook.com/',
            'youtube'  => 'https://www.youtube.com/',
            'working_hours' => 'Mon-Sun: 09.00 am - 21.00 pm',
            'desc_footer' => 'Menjadi laundry yang keratif dan up to date yang dikelolah secara professional dengan memadukan kemajuan teknologi, sehingga memberikan keuntungan maksimal untuk Pelanggan, Pegawai, dan Pemilik',
        ]);
    }
}
