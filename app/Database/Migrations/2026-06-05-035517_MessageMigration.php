<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MessageMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'auto_increment' => true,
                'unsigned'       => true,
                'type'           => 'bigint',
            ],
            'users_id' => [
                'constraint' => 11,
                'type'       => 'int',
                'unsigned'   => true,
            ],
            'uid' => [
                'constraint' => 16,
                'type'       => 'varchar',
                'unique'     => true,
            ],
            'secret' => [
                'type' => 'longtext',
            ],
            'status' => [
                'constraint' => ['unseen', 'seen'],
                'default'    => 'unseen',
                'type'       => 'enum',
            ],
            'created_at' => [
                'null' => true,
                'type' => 'datetime',
            ],
            'updated_at' => [
                'null' => true,
                'type' => 'datetime',
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('users_id');
        $this->forge->addKey('created_at');
        $this->forge->addKey(['users_id', 'status']);
        $this->forge->addKey(['users_id', 'id']);
        $this->forge->addForeignKey('users_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('messages', true);
    }

    public function down()
    {
        $this->forge->dropTable('messages', true);
    }
}
