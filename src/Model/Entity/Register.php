<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Register Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $date_register
 * @property bool $state
 * @property int $calification
 * @property int $course_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Course $course
 * @property \App\Model\Entity\User $user
 */
class Register extends Entity
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
        'date_register' => true,
        'state' => true,
        'calification' => true,
        'course_id' => true,
        'user_id' => true,
        'course' => true,
        'user' => true
    ];
}
