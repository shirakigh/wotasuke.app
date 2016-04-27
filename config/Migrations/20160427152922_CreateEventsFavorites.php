<?php
use Migrations\AbstractMigration;

class CreateEventsFavorites extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('events_favorites', ['id' => false, 'primary_key' => ['event_id', 'favorite_id']]);
        $table->addColumn('event_id', 'integer', [
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('favorite_id', 'integer', [
            'limit' => 11,
            'null' => false,
        ]);
        $table->addIndex([
            'event_id',
        ], [
            'name' => 'BY_EVENT_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'favorite_id',
        ], [
            'name' => 'BY_FAVORITE_ID',
            'unique' => false,
        ]);
        $table->addForeignKey('event_id', 'events', 'id');
        $table->addForeignKey('favorite_id', 'favorites', 'id');
        $table->create();
    }
}
