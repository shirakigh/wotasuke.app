<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity.
 *
 * @property int $id
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property string $title
 * @property string $place
 * @property string $detail
 * @property \Cake\I18n\Time $start
 * @property \Cake\I18n\Time $end
 * @property bool $is_allday
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $is_private
 */
class Event extends Entity
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

    protected function _getStartDate()
    {
        if (!empty($this->_properties)) {
            return date("Y-m-d", strtotime($this->_properties['start']));
        } else {
            return null;
        }
    }

    protected function _getEndDate()
    {
        if (!empty($this->_properties)) {
            return date("Y-m-d", strtotime($this->_properties['end']));
        } else {
            return null;
        }
    }

    protected function _getStartTime()
    {
        if (!empty($this->_properties)) {
            return date("H:i:s", strtotime($this->_properties['start']));
        } else {
            return null;
        }
    }

    protected function _getEndTime()
    {
        if (!empty($this->_properties)) {
            return date("H:i:s", strtotime($this->_properties['end']));
        } else {
            return null;
        }
    }

    protected function _getStart()
    {
        if (!empty($this->_properties)) {
            return date("Y-m-d H:i", strtotime($this->_properties['start']));
        } else {
            return null;
        }
    }

    protected function _getEnd()
    {
        if (!empty($this->_properties)) {
            return date("Y-m-d H:i", strtotime($this->_properties['end']));
        } else {
            return null;
        }
    }

    protected function _getEventRange()
    {
        if (!empty($this->_properties)) {
            return $this->_properties['start'] . ' ～ ' . $this->_properties['end'];
        } else {
            return null;
        }
    }
}
