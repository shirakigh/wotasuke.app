<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FavoritesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FavoritesTable Test Case
 */
class FavoritesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FavoritesTable
     */
    public $Favorites;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.favorites',
        'app.events',
        'app.users',
        'app.events_favorites',
        'app.favorites_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Favorites') ? [] : ['className' => 'App\Model\Table\FavoritesTable'];
        $this->Favorites = TableRegistry::get('Favorites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Favorites);

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
