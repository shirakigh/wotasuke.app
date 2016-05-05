<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Favorite Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $nickname
 * @property \Cake\I18n\Time $birthday
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $user_id
 * @property string $bgcolor
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Event[] $events
 */
class Favorite extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
