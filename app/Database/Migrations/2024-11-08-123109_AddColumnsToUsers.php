<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Forge;
use CodeIgniter\Database\Migration;

class AddColumnsToUsers extends Migration
{
     /**
     * @var string[]
     */
    private array $tables;

    public function __construct(?Forge $forge = null)
    {
        parent::__construct($forge);

        /** @var \Config\Auth $authConfig */
        $authConfig   = config('Auth');
        $this->tables = $authConfig->tables;
    }

    public function up()
    {
        $fields = [
            'IDCOMMUNE' => ['type' => 'INT', 'null' => true],
        ];
        $this->forge->addColumn($this->tables['users'], $fields);
        $this->forge->addForeignKey('IDCOMMUNE', 'commune', 'IDCOMMUNE', '', '', 'FK_IDCOMMUNE');
    }

    public function down()
    {
        $fields = [
            'IDCOMMUNE',
        ];
        $this->forge->dropForeignKey($this->tables['users'], 'FK_IDCOMMUNE');
        $this->forge->dropColumn($this->tables['users'], $fields);
    }
}
