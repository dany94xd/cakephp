<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Profiles Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 * @property \App\Model\Table\OptionsTable|\Cake\ORM\Association\BelongsToMany $Options
 *
 * @method \App\Model\Entity\Profile get($primaryKey, $options = [])
 * @method \App\Model\Entity\Profile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Profile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Profile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Profile|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Profile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Profile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Profile findOrCreate($search, callable $callback = null, $options = [])
 */
class ProfilesTable extends Table
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

        $this->setTable('profiles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Users', [
            'foreignKey' => 'profile_id'
        ]);
        $this->belongsToMany('Options', [
            'foreignKey' => 'profile_id',
            'targetForeignKey' => 'option_id',
            'joinTable' => 'options_profiles'
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
            ->scalar('profile')
            ->maxLength('profile', 30)
            ->requirePresence('profile', 'create')
            ->notEmpty('profile');

        $validator
            ->scalar('description')
            ->maxLength('description', 50)
            ->allowEmpty('description');

        return $validator;
    }
}
