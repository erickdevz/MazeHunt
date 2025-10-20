<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterPromotionsAddUniqAndColumns extends Migration
{
    public function up()
    {
        $db  = \Config\Database::connect();
        $fg  = \Config\Database::forge();

        $fields = $db->getFieldNames('promotions');

        if (!in_array('image_url2', $fields)) {
            $fg->addColumn('promotions', ['image_url2' => ['type' => 'TEXT', 'null' => true]]);
        }
        if (!in_array('currency', $fields)) {
            $fg->addColumn('promotions', ['currency' => ['type' => 'VARCHAR', 'constraint' => 10, 'default' => 'BRL']]);
        }
        if (!in_array('store', $fields)) {
            $fg->addColumn('promotions', ['store' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true]]);
        }
        if (!in_array('source_id', $fields)) {
            $fg->addColumn('promotions', ['source_id' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true]]);
        }
        if (!in_array('expires_at', $fields)) {
            $fg->addColumn('promotions', ['expires_at' => ['type' => 'TIMESTAMP', 'null' => true]]);
        }

        // índice único por product_url (evita duplicar mesma oferta)
        $db->query('CREATE UNIQUE INDEX IF NOT EXISTS uniq_promotions_product_url ON promotions (product_url)');
    }

    public function down()
    {
        // não derruba nada crítico
    }
}
