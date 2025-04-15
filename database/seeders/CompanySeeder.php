<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::create([
            'name' => 'شركة الديكور المثالي',
            'logo' => 'companies/company1.jpg',
            'services' => 'تشطيب داخلي، تصميم ديكور، تجديد المساحات',
            'location' => 'القاهرة',
            'rating' => 4.5,
            'reviews_count' => 120,
            'contact_link' => 'https://example.com/contact',
        ]);

        Company::create([
            'name' => 'فن العمارة',
            'logo' => 'companies/company2.jpg',
            'services' => 'تشطيب خارجي، تصميم واجهات، ترميم',
            'location' => 'الجيزة',
            'rating' => 4.0,
            'reviews_count' => 85,
            'contact_link' => 'https://example.com/contact',
        ]);

        // أضف المزيد حسب الحاجة
    }
}