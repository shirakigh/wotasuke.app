<?php
use Migrations\AbstractMigration;

class CreateEventsImages extends AbstractMigration
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
        $table = $this->table('events_images', ['id' => false, 'primary_key' => ['event_id', 'image_id']]);
        $table->addColumn('event_id', 'integer', [
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('image_id', 'integer', [
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
            'image_id',
        ], [
            'name' => 'BY_IMAGE_ID',
            'unique' => false,
        ]);
        $table->addForeignKey('event_id', 'events', 'id');
        $table->addForeignKey('image_id', 'images', 'id');
        $table->create();
    }
}
