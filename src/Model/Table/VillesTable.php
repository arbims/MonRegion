<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Villes Model
 *
 * @property \App\Model\Table\DepartementsTable&\Cake\ORM\Association\BelongsTo $Departements
 * @property \App\Model\Table\MdecinsTable&\Cake\ORM\Association\HasMany $Mdecins
 *
 * @method \App\Model\Entity\Ville newEmptyEntity()
 * @method \App\Model\Entity\Ville newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Ville> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ville get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Ville findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Ville patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Ville> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ville|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Ville saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Ville>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ville>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ville>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ville> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ville>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ville>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ville>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ville> deleteManyOrFail(iterable $entities, array $options = [])
 */
class VillesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('villes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Departements', [
            'foreignKey' => 'departement_id',
        ]);
        $this->hasMany('Mdecins', [
            'foreignKey' => 'ville_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('code')
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->integer('departement_id')
            ->allowEmptyString('departement_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['departement_id'], 'Departements'), ['errorField' => 'departement_id']);

        return $rules;
    }
}
