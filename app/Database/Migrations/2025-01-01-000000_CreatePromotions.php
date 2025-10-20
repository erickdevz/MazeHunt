<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePromotions extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGSERIAL',
                'null'           => false,
            ],
            'store' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
                'null'           => false,
                'comment'        => 'Ex: Amazon, Shopee, Aliexpress',
            ],
            'title' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => false,
            ],
            'price' => [
                'type'           => 'DECIMAL',
                'constraint'     => '10,2',
                'null'           => true,
            ],
            'currency' => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
                'default'        => 'BRL',
                'null'           => false,
            ],
            'product_url' => [
                'type'           => 'TEXT',
                'null'           => false,
            ],
            'image_url' => [
                'type'           => 'TEXT',
                'null'           => true,
            ],
            'image_url2' => [
                'type'           => 'TEXT',
                'null'           => true,
            ],
            'source_id' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null'           => true,
                'comment'        => 'ID interno ou hash da origem',
            ],
            'expires_at' => [
                'type'           => 'TIMESTAMP',
                'null'           => true,
            ],
            'created_at' => [
                'type'           => 'TIMESTAMP',
                'null'           => true,
                'default'        => null,
            ],
            'updated_at' => [
                'type'           => 'TIMESTAMP',
                'null'           => true,
                'default'        => null,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('promotions');
    }

    public function down()
    {
        $this->forge->dropTable('promotions');
    }
}
