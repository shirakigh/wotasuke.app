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
 * @property string $textcolor
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

    protected function _getBgcolor()
    {
        if (!empty($this->_properties)) {
            if (empty($this->_properties['bgcolor'])) {
                return '#3a87ad';
            } else {
                return $this->_properties['bgcolor'];
            }
        }
    }

    protected function _getNickname()
    {
        if (!empty($this->_properties)) {
            if (empty($this->_properties['nickname'])) {
                return $this->_properties['name'];
            } else {
                return $this->_properties['nickname'];
            }
        }
    }

}
