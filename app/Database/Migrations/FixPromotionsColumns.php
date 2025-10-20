<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FixPromotionsColumns extends Migration
{
    public function up()
    {
        // Renomeia colunas antigas se existirem
        $fields = $this->db->getFieldNames('promotions');

        if (in_array('image', $fields) && !in_array('image_url', $fields)) {
            $this->db->query('ALTER TABLE promotions RENAME COLUMN image TO image_url;');
        }
        if (in_array('url', $fields) && !in_array('product_url', $fields)) {
            $this->db->query('ALTER TABLE promotions RENAME COLUMN url TO product_url;');
        }

        // Garante colunas novas
        $forge = \Config\Database::forge();
        if (!in_array('image_url2', $fields)) {
            $forge->addColumn('promotions', [
                'image_url2' => ['type' => 'TEXT', 'null' => true],
            ]);
        }
        if (!in_array('currency', $fields)) {
            $forge->addColumn('promotions', [
                'currency' => ['type' => 'VARCHAR', 'constraint' => 10, 'default' => 'BRL', 'null' => false],
            ]);
        }
    }

    public function down()
    {
        // opcional: reverter
    }
}
