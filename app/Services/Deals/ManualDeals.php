<?php
namespace App\Services\Deals;

use App\Models\PromotionModel;

class ManualDeals implements DealsProviderInterface {
    public function fetch(int $limit = 10): array {
        $rows = $this->promotions
        ->where('source', 'manual')
        ->orderBy('created_at', 'DESC')
        ->findAll($limit);

        return array_map(fn($r) => [
        'title' => $r['title'],
        'image' => $r['image_url'],
        'price' => $r['price_text'],
        'url'   => $r['affiliate_url'],
        'prime' => (bool)$r['is_prime'],
        'brand' => $r['brand'] ?? null,
        ], $rows);
    }
}

