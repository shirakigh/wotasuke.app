<?php
use Migrations\AbstractMigration;

class CreateFavoritesUsers extends AbstractMigration
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
        $table = $this->table('favorites_users', ['id' => false, 'primary_key' => ['favorite_id', 'user_id']]);
        $table->addColumn('favorite_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('user_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addIndex([
            'favorite_id',
        ], [
            'name' => 'BY_FAVORITE_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'user_id',
        ], [
            'name' => 'BY_USER_ID',
            'unique' => false,
        ]);
        $table->addForeignKey('favorite_id', 'favorites', 'id');
        $table->addForeignKey('user_id', 'users', 'id');
        $table->create();
    }
}
