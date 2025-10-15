<?php
namespace App\Services\Deals;

class AmazonDeals implements DealsProviderInterface
{
    public function __construct(
        private string $accessKey,
        private string $secretKey,
        private string $partnerTag,
        private string $region
    ) {}

    public function fetch(int $limit = 10): array
    {
        // TODO: implementar com o SDK da PA-API 5.0
        return []; // por enquanto retorna vazio (deixa o mock assumir)
    }
}
