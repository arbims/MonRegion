<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateMdecin extends AbstractMigration
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
        $table = $this->table('mdecins');
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('ville_id','integer')->addIndex('ville_id')->addForeignKey('ville_id', 'villes', 'id');
        $table->create();
    }
}
