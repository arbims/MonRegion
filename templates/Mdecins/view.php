<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mdecin $mdecin
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Mdecin'), ['action' => 'edit', $mdecin->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Mdecin'), ['action' => 'delete', $mdecin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mdecin->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Mdecins'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Mdecin'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="mdecins view content">
            <h3><?= h($mdecin->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($mdecin->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ville') ?></th>
                    <td><?= $mdecin->hasValue('ville') ? $this->Html->link($mdecin->ville->name, ['controller' => 'Villes', 'action' => 'view', $mdecin->ville->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($mdecin->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
