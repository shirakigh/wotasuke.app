<?php
namespace App\Model\Table;

use App\Model\Entity\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Events Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsToMany $Favorites
 */
class EventsTable extends Table
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

        $this->table('events');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Favorites', [
            'foreignKey' => 'event_id',
            'targetForeignKey' => 'favorite_id',
            'joinTable' => 'events_favorites'
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->allowEmpty('place');

        $validator
            ->allowEmpty('detail');

        $validator
            ->dateTime('start')
            ->allowEmpty('start');

        $validator
            ->dateTime('end')
            ->allowEmpty('end');

        $validator
            ->boolean('is_allday')
            ->allowEmpty('is_allday');

        $validator
            ->boolean('is_private')
            ->allowEmpty('is_private');

        $validator
            ->allowEmpty('url');

        $validator
            ->allowEmpty('feeling');

        $validator
            ->boolean('is_join');

        $validator
            ->allowEmpty('ticket');

        $validator
            ->allowEmpty('ticket_info');

        return $validator;
    }

    public function findAllAssociation(\Cake\ORM\Query $query, array $options)
    {
        $query
            ->contain([
                'Favorites',
                'Images' => function (\Cake\ORM\Query $contain) {
                    return $contain->where(['Images.type' => EVENT]);
                }

            ]);
        return $query;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
