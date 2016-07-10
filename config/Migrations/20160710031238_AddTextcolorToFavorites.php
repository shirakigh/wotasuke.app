<?php
use Migrations\AbstractMigration;

class AddTextcolorToFavorites extends AbstractMigration
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
        $table = $this->table('favorites');
        $table->addColumn('textcolor', 'string', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ]);
        $table->update();
    }
}
