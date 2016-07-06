<?php
use Migrations\AbstractMigration;

class AddUrlFeelingToEvents extends AbstractMigration
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
        $table->addColumn('url', 'string', [
            'default' => null,
            'limit' => 2048,
            'null' => true,
        ]);
        $table->addColumn('feeling', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->update();
    }
}
