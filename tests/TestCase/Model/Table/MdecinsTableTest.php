<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MdecinsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MdecinsTable Test Case
 */
class MdecinsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MdecinsTable
     */
    protected $Mdecins;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Mdecins',
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
        $config = $this->getTableLocator()->exists('Mdecins') ? [] : ['className' => MdecinsTable::class];
        $this->Mdecins = $this->getTableLocator()->get('Mdecins', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Mdecins);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MdecinsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MdecinsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
