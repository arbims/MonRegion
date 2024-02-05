<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Regions Model
 *
 * @property \App\Model\Table\DepartementsTable&\Cake\ORM\Association\HasMany $Departements
 *
 * @method \App\Model\Entity\Region newEmptyEntity()
 * @method \App\Model\Entity\Region newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Region> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Region get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Region findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Region patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Region> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Region|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Region saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Region>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Region>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Region>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Region> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Region>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Region>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Region>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Region> deleteManyOrFail(iterable $entities, array $options = [])
 */
class RegionsTable extends Table
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

        $this->setTable('regions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Departements', [
            'foreignKey' => 'region_id',
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

        return $validator;
    }
}
