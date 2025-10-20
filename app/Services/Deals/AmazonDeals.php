<?php
namespace App\Services\Deals;

use App\Models\PromotionModel;

/**
 * Serviço responsável por buscar promoções na Amazon
 * via API de Afiliados (PA-API 5.0) — ou modo mock temporário.
 */
class AmazonDeals implements DealsProviderInterface
{
    private string $accessKey;
    private string $secretKey;
    private string $partnerTag;
    private string $region;

    public function __construct(
        string $accessKey,
        string $secretKey,
        string $partnerTag,
        string $region = 'us-east-1'
    ) {
        $this->accessKey  = $accessKey;
        $this->secretKey  = $secretKey;
        $this->partnerTag = $partnerTag;
        $this->region     = $region;
    }

    /**
     * Busca promoções (mock temporário)
     * No futuro, substituir pela chamada real à Amazon PA-API 5.0
     */
    public function fetch(int $limit = 10): array
    {
        // 👉 Se a API ainda não está configurada, usa mock
        if (empty($this->accessKey) || empty($this->secretKey) || empty($this->partnerTag)) {
            return $this->mock($limit);
        }

        // TODO: implementar integração real com a Amazon Product Advertising API 5.0
        // Exemplo:
        // $client = new AmazonProductClient($this->accessKey, $this->secretKey, $this->region);
        // $response = $client->searchItems([
        //     'Keywords' => 'promoções',
        //     'PartnerTag' => $this->partnerTag,
        //     'Resources' => ['Images.Primary.Medium', 'ItemInfo.Title', 'Offers.Listings.Price']
        // ]);

        return $this->mock($limit);
    }

    /**
     * Mock — gera produtos fictícios com os campos corretos do DB
     */
    private function mock(int $limit): array
    {
        $items = [];

        for ($i = 1; $i <= $limit; $i++) {
            $items[] = [
                'title'       => "Amazon Produto #{$i} - " . bin2hex(random_bytes(2)),
                'store'       => 'Amazon',
                'price'       => rand(99, 1999) / 10,
                'currency'    => 'BRL',
                'product_url' => "https://www.amazon.com/dp/EXEMPLO{$i}?tag={$this->partnerTag}",
                'image_url'   => "https://picsum.photos/seed/amazon{$i}/400/300",
                'image_url2'  => (rand(0, 1) ? "https://picsum.photos/seed/amazon{$i}b/400/300" : null),
                'source_id'   => 'mock-' . uniqid(),
                'expires_at'  => date('Y-m-d H:i:s', strtotime('+7 days')),
            ];
        }

        return $items;
    }
}
