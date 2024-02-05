<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateDepartement extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('departements');
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('code', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('region_id','integer')->addIndex('region_id')->addForeignKey('region_id', 'regions', 'id');
        $table->create();
    }
}
