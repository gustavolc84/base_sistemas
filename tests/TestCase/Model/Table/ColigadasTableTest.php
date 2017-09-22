<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ColigadasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ColigadasTable Test Case
 */
class ColigadasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ColigadasTable
     */
    public $Coligadas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.coligadas',
        'app.notas_fiscais'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Coligadas') ? [] : ['className' => ColigadasTable::class];
        $this->Coligadas = TableRegistry::get('Coligadas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Coligadas);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
