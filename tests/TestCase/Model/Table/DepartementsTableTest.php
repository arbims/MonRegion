<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepartementsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DepartementsTable Test Case
 */
class DepartementsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DepartementsTable
     */
    protected $Departements;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Departements',
        'app.Regions',
        'app.Villes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Departements') ? [] : ['className' => DepartementsTable::class];
        $this->Departements = $this->getTableLocator()->get('Departements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Departements);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DepartementsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DepartementsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
