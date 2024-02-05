<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ville Entity
 *
 * @property int $id
 * @property string $name
 * @property int $code
 * @property int|null $departement_id
 *
 * @property \App\Model\Entity\Departement $departement
 * @property \App\Model\Entity\Mdecin[] $mdecins
 */
class Ville extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'name' => true,
        'code' => true,
        'departement_id' => true,
        'departement' => true,
        'mdecins' => true,
    ];
}
