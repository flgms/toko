<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            // Elektronik
            [
                'category_id' => 1,
                'name' => 'Smartphone Samsung Galaxy A54',
                'slug' => 'smartphone-samsung-galaxy-a54',
                'description' => 'Smartphone dengan kamera 50MP, layar AMOLED 6.4 inch, dan baterai 5000mAh',
                'price' => 5499000,
                'stock' => 15
            ],
            [
                'category_id' => 1,
                'name' => 'Laptop ASUS VivoBook 14',
                'slug' => 'laptop-asus-vivobook-14',
                'description' => 'Laptop ringan dengan prosesor Intel Core i5, RAM 8GB, SSD 512GB',
                'price' => 7999000,
                'stock' => 10
            ],
            [
                'category_id' => 1,
                'name' => 'Earbuds TWS Pro',
                'slug' => 'earbuds-tws-pro',
                'description' => 'Earbuds wireless dengan noise cancelling dan kualitas suara premium',
                'price' => 299000,
                'stock' => 50
            ],
            [
                'category_id' => 1,
                'name' => 'Smart Watch X5',
                'slug' => 'smart-watch-x5',
                'description' => 'Smartwatch dengan monitoring kesehatan, GPS, dan tahan air',
                'price' => 1299000,
                'stock' => 25
            ],

            // Fashion
            [
                'category_id' => 2,
                'name' => 'Kaos Polos Cotton Premium',
                'slug' => 'kaos-polos-cotton-premium',
                'description' => 'Kaos polos berbahan cotton combed 30s, nyaman dan adem',
                'price' => 75000,
                'stock' => 100
            ],
            [
                'category_id' => 2,
                'name' => 'Celana Jeans Slim Fit',
                'slug' => 'celana-jeans-slim-fit',
                'description' => 'Celana jeans dengan potongan slim fit modern',
                'price' => 250000,
                'stock' => 40
            ],
            [
                'category_id' => 2,
                'name' => 'Jaket Hoodie Premium',
                'slug' => 'jaket-hoodie-premium',
                'description' => 'Jaket hoodie tebal dan hangat untuk segala aktivitas',
                'price' => 185000,
                'stock' => 30
            ],
            [
                'category_id' => 2,
                'name' => 'Sepatu Sneakers Sport',
                'slug' => 'sepatu-sneakers-sport',
                'description' => 'Sepatu sneakers ringan dan nyaman untuk olahraga',
                'price' => 450000,
                'stock' => 20
            ],

            // Makanan & Minuman
            [
                'category_id' => 3,
                'name' => 'Kopi Arabica Premium 200gr',
                'slug' => 'kopi-arabica-premium-200gr',
                'description' => 'Kopi arabica pilihan dengan aroma dan rasa yang kaya',
                'price' => 85000,
                'stock' => 60
            ],
            [
                'category_id' => 3,
                'name' => 'Teh Hijau Organik 100gr',
                'slug' => 'teh-hijau-organik-100gr',
                'description' => 'Teh hijau organik berkualitas tinggi untuk kesehatan',
                'price' => 65000,
                'stock' => 45
            ],
            [
                'category_id' => 3,
                'name' => 'Madu Murni 500ml',
                'slug' => 'madu-murni-500ml',
                'description' => 'Madu murni 100% tanpa campuran',
                'price' => 120000,
                'stock' => 35
            ],
            [
                'category_id' => 3,
                'name' => 'Cokelat Dark Premium 100gr',
                'slug' => 'cokelat-dark-premium-100gr',
                'description' => 'Cokelat dark dengan kandungan kakao 70%',
                'price' => 45000,
                'stock' => 80
            ],

            // Olahraga
            [
                'category_id' => 4,
                'name' => 'Matras Yoga Anti Slip',
                'slug' => 'matras-yoga-anti-slip',
                'description' => 'Matras yoga dengan permukaan anti slip dan empuk',
                'price' => 150000,
                'stock' => 25
            ],
            [
                'category_id' => 4,
                'name' => 'Dumbbell Set 5kg',
                'slug' => 'dumbbell-set-5kg',
                'description' => 'Set dumbbell 5kg untuk latihan di rumah',
                'price' => 180000,
                'stock' => 15
            ],
            [
                'category_id' => 4,
                'name' => 'Botol Minum Sport 1L',
                'slug' => 'botol-minum-sport-1l',
                'description' => 'Botol minum sport dengan kapasitas 1 liter',
                'price' => 55000,
                'stock' => 70
            ],
            [
                'category_id' => 4,
                'name' => 'Resistance Band Set',
                'slug' => 'resistance-band-set',
                'description' => 'Set resistance band dengan 5 level kekuatan',
                'price' => 95000,
                'stock' => 40
            ],

            // Buku
            [
                'category_id' => 5,
                'name' => 'Buku Novel Best Seller',
                'slug' => 'buku-novel-best-seller',
                'description' => 'Novel best seller pilihan dengan cerita menarik',
                'price' => 85000,
                'stock' => 50
            ],
            [
                'category_id' => 5,
                'name' => 'Buku Motivasi & Pengembangan Diri',
                'slug' => 'buku-motivasi-pengembangan-diri',
                'description' => 'Buku motivasi untuk meningkatkan kualitas hidup',
                'price' => 95000,
                'stock' => 35
            ],
            [
                'category_id' => 5,
                'name' => 'Set Alat Tulis Lengkap',
                'slug' => 'set-alat-tulis-lengkap',
                'description' => 'Set alat tulis lengkap untuk sekolah atau kantor',
                'price' => 125000,
                'stock' => 60
            ],
            [
                'category_id' => 5,
                'name' => 'Buku Resep Masakan Nusantara',
                'slug' => 'buku-resep-masakan-nusantara',
                'description' => 'Kumpulan resep masakan tradisional Indonesia',
                'price' => 75000,
                'stock' => 30
            ],

            // Kesehatan
            [
                'category_id' => 6,
                'name' => 'Vitamin C 1000mg',
                'slug' => 'vitamin-c-1000mg',
                'description' => 'Suplemen vitamin C untuk meningkatkan daya tahan tubuh',
                'price' => 85000,
                'stock' => 100
            ],
            [
                'category_id' => 6,
                'name' => 'Masker Wajah Sheet 10pcs',
                'slug' => 'masker-wajah-sheet-10pcs',
                'description' => 'Masker wajah sheet dengan berbagai varian',
                'price' => 65000,
                'stock' => 75
            ],
            [
                'category_id' => 6,
                'name' => 'Hand Sanitizer 500ml',
                'slug' => 'hand-sanitizer-500ml',
                'description' => 'Hand sanitizer dengan kandungan alkohol 70%',
                'price' => 35000,
                'stock' => 120
            ],
            [
                'category_id' => 6,
                'name' => 'Essential Oil Lavender 10ml',
                'slug' => 'essential-oil-lavender-10ml',
                'description' => 'Essential oil lavender untuk relaksasi',
                'price' => 95000,
                'stock' => 45
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}