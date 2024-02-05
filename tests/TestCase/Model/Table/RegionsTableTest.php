<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RegionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RegionsTable Test Case
 */
class RegionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RegionsTable
     */
    protected $Regions;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Regions',
        'app.Departements',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Regions') ? [] : ['className' => RegionsTable::class];
        $this->Regions = $this->getTableLocator()->get('Regions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Regions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RegionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
