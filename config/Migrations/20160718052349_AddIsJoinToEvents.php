<?php
use Migrations\AbstractMigration;

class AddIsJoinToEvents extends AbstractMigration
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
        $table->addColumn('is_join', 'boolean', [
            'default' => false,
            'null' => false,
        ]);
        $table->addColumn('ticket', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('ticket_info', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->update();
    }
}
