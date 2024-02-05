<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mdecin $mdecin
 * @var \Cake\Collection\CollectionInterface|string[] $villes
 */
?>
<div>
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Mdecins'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div>
        <?= $this->Form->create($mdecin) ?>
        <div class="form-group">
            <?= $this->Form->control('name', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group text">
            <?= $this->Form->control('region_id', ['options' => $regions, 'empty' => 'Selectionner votre region', 'class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <div id="departement_select">
                <?php echo $this->Form->control('departement_id', ['options' => [], 'empty' => 'Selectionner votre departement', 'class' => 'form-control']); ?>

            </div>
        </div>
        <div class="form-group">
            <div id="ville_select">
                <?php echo $this->Form->control('ville_id', ['options' => [], 'empty' => 'Selectionner votre ville', 'class' => 'form-control']); ?>
            </div>
        </div>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
