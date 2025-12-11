<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Elektronik',
                'slug' => 'elektronik',
                'description' => 'Produk elektronik dan gadget terbaru'
            ],
            [
                'name' => 'Fashion',
                'slug' => 'fashion',
                'description' => 'Pakaian dan aksesori fashion'
            ],
            [
                'name' => 'Makanan & Minuman',
                'slug' => 'makanan-minuman',
                'description' => 'Makanan dan minuman berkualitas'
            ],
            [
                'name' => 'Olahraga',
                'slug' => 'olahraga',
                'description' => 'Peralatan dan perlengkapan olahraga'
            ],
            [
                'name' => 'Buku',
                'slug' => 'buku',
                'description' => 'Buku dan alat tulis'
            ],
            [
                'name' => 'Kesehatan',
                'slug' => 'kesehatan',
                'description' => 'Produk kesehatan dan kecantikan'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}