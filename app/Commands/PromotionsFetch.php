<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

use App\Models\PromotionModel;
use App\Services\Deals\AmazonDeals;
// use App\Services\Deals\ShopeeDeals; // quando você criar

class PromotionsFetch extends BaseCommand
{
    protected $group       = 'mazehunt';
    protected $name        = 'promotions:fetch';
    protected $description = 'Busca promoções (mock ou APIs reais) e salva/atualiza no banco.';
    protected $usage       = 'promotions:fetch [count]';
    protected $arguments   = ['count' => 'Quantidade de itens por execução (padrão 10)'];

    public function run(array $params)
    {
        $count   = (int)($params[0] ?? 10);
        if ($count <= 0) {
            $count = 10;
        }

        $model = new PromotionModel();

        // 1) Remove itens expirados (expires_at < agora)
        $purged = $model->where('expires_at <', date('Y-m-d H:i:s'))->delete();
        if ($purged) {
            CLI::write("Purga: {$purged} promoções antigas removidas.", 'yellow');
        }

        // 2) Monta provedores
        $providers = [];

        // Amazon — se credenciais estiverem ausentes o provider cai para MOCK automaticamente
        $providers[] = new AmazonDeals(
            (string) env('AMAZON_ACCESS_KEY', ''),   // vazio => mock
            (string) env('AMAZON_SECRET_KEY', ''),   // vazio => mock
            (string) env('AMAZON_PARTNER_TAG', 'mazehunt-20'),
            (string) env('AMAZON_REGION', 'us-east-1')
        );

        // Shopee (quando implementar)
        // if (env('SHOPEE_ENABLED')) {
        //     $providers[] = new ShopeeDeals(
        //         env('SHOPEE_PARTNER_ID'),
        //         env('SHOPEE_PARTNER_KEY'),
        //         env('SHOPEE_SHOP_ID') ? (int) env('SHOPEE_SHOP_ID') : null
        //     );
        // }

        // 3) Busca itens dos provedores
        $items = [];
        foreach ($providers as $p) {
            try {
                $items = array_merge($items, $p->fetch($count));
            } catch (\Throwable $e) {
                CLI::error('Erro ao buscar de um provider: ' . $e->getMessage());
            }
        }

        // Garante um limite “global” se juntou vários providers
        if (count($items) > $count) {
            $items = array_slice($items, 0, $count);
        }

        if (empty($items)) {
            CLI::write('Nenhuma promoção retornada pelos providers.', 'yellow');
            return;
        }

        // 4) Upsert (dedupe por source_id OU product_url)
        $inserted = 0;
        $updated  = 0;

        foreach ($items as $i) {
            // Normaliza/garante campos
            $row = [
                'title'       => $i['title']        ?? '',
                'store'       => $i['store']        ?? null,
                'price'       => $i['price']        ?? null,
                'currency'    => $i['currency']     ?? 'BRL',
                'product_url' => $i['product_url']  ?? ($i['url']   ?? null),
                'image_url'   => $i['image_url']    ?? ($i['image'] ?? null),
                'image_url2'  => $i['image_url2']   ?? null,
                'source'      => $i['source']       ?? ($i['store'] ?? 'unknown'),
                'source_id'   => $i['source_id']    ?? null,
                'expires_at'  => $i['expires_at']   ?? date('Y-m-d H:i:s', strtotime('+7 days')),
            ];

            // pula se não tiver um identificador útil
            if (empty($row['product_url']) && empty($row['source_id'])) {
                continue;
            }

            // tenta localizar existente por source_id (mais forte), senão por product_url
            $existing = null;
            if (!empty($row['source_id'])) {
                $existing = $model->where('source_id', $row['source_id'])->first();
            }
            if (!$existing && !empty($row['product_url'])) {
                $existing = $model->where('product_url', $row['product_url'])->first();
            }

            if ($existing) {
                // Atualiza os campos “variáveis” (título, preço, imagens, validade)
                $model->update($existing['id'], [
                    'title'       => $row['title'],
                    'store'       => $row['store'],
                    'price'       => $row['price'],
                    'currency'    => $row['currency'],
                    'product_url' => $row['product_url'],
                    'image_url'   => $row['image_url'],
                    'image_url2'  => $row['image_url2'],
                    'source'      => $row['source'],
                    'source_id'   => $row['source_id'],
                    'expires_at'  => $row['expires_at'],
                ]);
                $updated++;
            } else {
                $model->insert($row);
                $inserted++;
            }
        }

        CLI::write("Promotions: {$inserted} inseridas, {$updated} atualizadas.", 'green');
    }
}
