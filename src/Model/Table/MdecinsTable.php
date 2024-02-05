<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\TestSuite\Constraint\Response\BodyNotEmpty;
use Cake\Validation\Validator;

/**
 * Mdecins Model
 *
 * @property \App\Model\Table\VillesTable&\Cake\ORM\Association\BelongsTo $Villes
 *
 * @method \App\Model\Entity\Mdecin newEmptyEntity()
 * @method \App\Model\Entity\Mdecin newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Mdecin> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mdecin get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Mdecin findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Mdecin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Mdecin> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mdecin|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Mdecin saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Mdecin>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Mdecin>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Mdecin>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Mdecin> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Mdecin>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Mdecin>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Mdecin>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Mdecin> deleteManyOrFail(iterable $entities, array $options = [])
 */
class MdecinsTable extends Table
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

        $this->setTable('mdecins');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Villes', [
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
            ->integer('region_id')
            ->notBlank('region_id')
            ->notEmptyString('region_id');

        $validator
            ->integer('departement_id')
            ->notBlank('departement_id')
            ->notEmptyString('departement_id');

        $validator
            ->integer('ville_id')
            ->notBlank('ville_id')
            ->notEmptyString('ville_id');

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
        $rules->add($rules->existsIn(['ville_id'], 'Villes'), ['errorField' => 'ville_id']);

        return $rules;
    }
}
