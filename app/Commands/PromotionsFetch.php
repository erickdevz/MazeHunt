<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\PromotionModel;

class PromotionsFetch extends BaseCommand
{
    protected $group       = 'mazehunt';
    protected $name        = 'promotions:fetch';
    protected $description = 'Busca promoções (mock ou APIs reais) e salva no banco.';
    protected $usage       = 'promotions:fetch [count]';
    protected $arguments   = ['count' => 'Quantidade de itens (padrão 10)'];

    public function run(array $params)
    {
        $count   = (int)($params[0] ?? 10);
        if ($count < 1) $count = 10;

        $useMock = (bool) env('USE_MOCK', true);
        $items   = [];

        // ---------- Providers reais (Amazon/Shopee) ----------
        $providers = [];
        if (!$useMock) {
            if (env('AMAZON_ENABLED')) {
                $providers[] = new \App\Services\Deals\AmazonDeals(
                    env('AMAZON_ACCESS_KEY'),
                    env('AMAZON_SECRET_KEY'),
                    env('AMAZON_PARTNER_TAG'),
                    env('AMAZON_REGION', 'us-east-1')
                );
            }
            if (env('SHOPEE_ENABLED')) {
                $providers[] = new \App\Services\Deals\ShopeeDeals(
                    env('SHOPEE_PARTNER_ID'),
                    env('SHOPEE_PARTNER_KEY'),
                    env('SHOPEE_SHOP_ID') ? (int)env('SHOPEE_SHOP_ID') : null
                );
            }

            if (!empty($providers)) {
                $fetcher = new \App\Services\Deals\DealsFetcher($providers);
                $items   = $fetcher->fetchAll((int)ceil($count / max(1, count($providers))));
            }
        }

        // ---------- Fallback: MOCK ----------
        if (empty($items)) {
            $paths = [
                WRITEPATH . 'mocks/amazon.json',
                WRITEPATH . 'mocks/shopee.json',
            ];
            $mock = [];
            foreach ($paths as $p) {
                if (is_file($p)) {
                    $data = json_decode(file_get_contents($p), true) ?: [];
                    $mock = array_merge($mock, $data);
                }
            }
            shuffle($mock);
            $items = array_slice($mock, 0, $count);
            if (empty($items)) {
                CLI::write('Nenhum item encontrado (verifique USE_MOCK e os arquivos em writable/mocks).', 'yellow');
                return;
            }
        }

        // ---------- Inserção no banco ----------
        $model    = new PromotionModel();
        $inserted = 0;

        foreach ($items as $i) {
            $row = [
                'source'     => $i['source'] ?? 'mock',
                'title'      => $i['title']  ?? '',
                'price'      => isset($i['price']) ? (float)$i['price'] : null,
                'url'        => $i['url']    ?? '',
                'image'      => $i['image']  ?? null,
                'expires_at' => date('Y-m-d H:i:s', strtotime('+7 days')),
            ];

            try {
                // evita URLs vazias
                if (trim($row['url']) === '') continue;
                $model->insert($row, true);
                $inserted++;
            } catch (\Throwable $e) {
                // Se quiser logar: log_message('error', $e->getMessage());
            }
        }

        CLI::write("Inseridos {$inserted} registros.", $inserted ? 'green' : 'yellow');
    }
}
