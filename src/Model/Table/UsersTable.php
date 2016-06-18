<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Events
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Events', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasMany('Favorites', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasMany('Images', [
            'foreignKey' => 'user_id'
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
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('login_account', 'create')
            ->notEmpty('login_account')
            ->add('login_account', 'unique', [
                'rule' => 'validateUnique',
                'provider' => 'table',
                'message' => __('already_exist'),
            ]);

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password')
            ->add('password', 'comWith', [
                // 確認用と同じかどうか
                'rule' => ['compareWith', 'password_confirm'],
                'message' => __('not_confirm'),
            ]);

        $validator
            ->allowEmpty('password_new', 'update')
            ->add('password_new', 'comWith', [
                // 確認用と同じかどうか
                'rule' => ['compareWith', 'password_confirm'],
                'message' => __('not_confirm'),
            ]);

        return $validator;
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
        $rules->add($rules->isUnique(['id']));
        $rules->add($rules->isUnique(['login_account']));
        return $rules;
    }

    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
        $query
            ->contain([
                'Images' => function (\Cake\ORM\Query $contain) {
                    return $contain->select(['name', 'user_id'])
                    ->where(['Images.type' => IMAGE_USER_ICON]);
                }
            ]);
        return $query;
    }

    public function findIncludeIcon(\Cake\ORM\Query $query, array $options)
    {
        $query
            ->contain([
                'Images' => function (\Cake\ORM\Query $contain) {
                    return $contain->where(['Images.type' => IMAGE_USER_ICON]);
                }
            ]);
        return $query;
    }
}
