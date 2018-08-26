<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OptionsProfilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OptionsProfilesTable Test Case
 */
class OptionsProfilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OptionsProfilesTable
     */
    public $OptionsProfiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.options_profiles',
        'app.options',
        'app.profiles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OptionsProfiles') ? [] : ['className' => OptionsProfilesTable::class];
        $this->OptionsProfiles = TableRegistry::getTableLocator()->get('OptionsProfiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OptionsProfiles);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
