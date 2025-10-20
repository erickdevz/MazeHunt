<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PromotionSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('promotions')->insertBatch([
            [
                'source' => 'manual',
                'title'  => 'Headset Gamer XYZ',
                'affiliate_url' => 'https://www.amazon.com/dp/ASIN?tag=seu-tag-20',
                'image_url' => 'https://m.media-amazon.com/images/I/xxxxx.jpg',
                'price_text' => 'R$ 199,90',
                'currency' => 'BRL',
                'is_prime' => 1,
                'is_active'=> 1,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
