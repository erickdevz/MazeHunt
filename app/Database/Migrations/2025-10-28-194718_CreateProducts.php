<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProducts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'price' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'default'    => 0,
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => 512,
                'null'       => true,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'scheduled_day' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
            'is_featured' => [
                'type'       => 'BOOLEAN',
                'default'    => false,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
                'default' => 'NOW()',
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('products', true);
    }

    public function down()
    {
        $this->forge->dropTable('products', true);
    }
}
