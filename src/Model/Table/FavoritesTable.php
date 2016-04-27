<?php
namespace App\Model\Table;

use App\Model\Entity\Favorite;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Favorites Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Events
 * @property \Cake\ORM\Association\BelongsToMany $Users
 */
class FavoritesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('favorites');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Events', [
            'foreignKey' => 'favorite_id',
            'targetForeignKey' => 'event_id',
            'joinTable' => 'events_favorites'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'favorite_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'favorites_users'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('nickname');

        $validator
            ->date('birthday')
            ->allowEmpty('birthday');

        return $validator;
    }
}
