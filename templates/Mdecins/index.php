<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Mdecin> $mdecins
 */
?>
<div class="mdecins index content">
    <?= $this->Html->link(__('New Mdecin'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Mdecins') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('ville_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mdecins as $mdecin): ?>
                <tr>
                    <td><?= $this->Number->format($mdecin->id) ?></td>
                    <td><?= h($mdecin->name) ?></td>
                    <td><?= $mdecin->hasValue('ville') ? $mdecin->ville->name : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $mdecin->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mdecin->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mdecin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mdecin->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
