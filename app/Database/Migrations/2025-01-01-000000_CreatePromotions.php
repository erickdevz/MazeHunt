<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePromotions extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type'=>'BIGSERIAL','null'=>false],
            'source'     => ['type'=>'VARCHAR','constraint'=>50,'null'=>false],
            'title'      => ['type'=>'VARCHAR','constraint'=>255,'null'=>false],
            'price'      => ['type'=>'DECIMAL','constraint'=>'10,2','null'=>true],
            'url'        => ['type'=>'TEXT','null'=>false],
            'image'      => ['type'=>'TEXT','null'=>true],
            'expires_at' => ['type'=>'TIMESTAMP','null'=>true],
            'created_at' => ['type'=>'TIMESTAMP','null'=>true,'default'=>null],
            'updated_at' => ['type'=>'TIMESTAMP','null'=>true,'default'=>null],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('promotions');
    }

    public function down()
    {
        $this->forge->dropTable('promotions');
    }
}
