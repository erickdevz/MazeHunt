<?php
namespace App\Services\Deals;

class ShopeeDeals implements DealsProviderInterface
{
    public function __construct(
        private string $partnerId,
        private string $partnerKey,
        private ?int $shopId = null
    ) {}

    public function fetch(int $limit = 10): array
    {
        // TODO: implementar com a Partner/Open API da Shopee
        return [];
    }
}
