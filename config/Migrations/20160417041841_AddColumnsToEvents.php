<?php
use Migrations\AbstractMigration;

class AddColumnsToEvents extends AbstractMigration
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
        $table = $this->table('events');
        $table->addColumn('is_private', 'boolean', [
            'default' => false,
            'null' => true,
        ]);
        $table->update();
    }
}
