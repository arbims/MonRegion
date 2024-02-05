<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateVille extends AbstractMigration
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
        $table = $this->table('villes');
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

        $table->addColumn('departement_id','integer')->addIndex('departement_id')->addForeignKey('departement_id', 'departements', 'id');
        $table->create();
    }
}
