<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\PromotionModel;

class PromotionsPurge extends BaseCommand
{
    protected $group       = 'mazehunt';
    protected $name        = 'promotions:purge';
    protected $description = 'Remove promoções vencidas (mais de 7 dias).';

    public function run(array $params)
    {
        $model = new PromotionModel();

        $deleted = $model->where('expires_at <', date('Y-m-d H:i:s'))
                        ->delete();

        CLI::write("Removidos {$deleted} registros expirados.", 'green');
    }
}
