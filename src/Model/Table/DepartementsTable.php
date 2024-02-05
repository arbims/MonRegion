<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Departements Model
 *
 * @property \App\Model\Table\RegionsTable&\Cake\ORM\Association\BelongsTo $Regions
 * @property \App\Model\Table\VillesTable&\Cake\ORM\Association\HasMany $Villes
 *
 * @method \App\Model\Entity\Departement newEmptyEntity()
 * @method \App\Model\Entity\Departement newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Departement> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Departement get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Departement findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Departement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Departement> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Departement|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Departement saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Departement>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Departement>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Departement>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Departement> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Departement>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Departement>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Departement>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Departement> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DepartementsTable extends Table
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

        $this->setTable('departements');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Regions', [
            'foreignKey' => 'region_id',
        ]);
        $this->hasMany('Villes', [
            'foreignKey' => 'departement_id',
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
            ->integer('region_id')
            ->allowEmptyString('region_id');

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
        $rules->add($rules->existsIn(['region_id'], 'Regions'), ['errorField' => 'region_id']);

        return $rules;
    }
}
