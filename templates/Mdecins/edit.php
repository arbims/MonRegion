<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mdecin $mdecin
 * @var string[]|\Cake\Collection\CollectionInterface $villes
 */
?>
<div>
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mdecin->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mdecin->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Mdecins'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div>
        <?= $this->Form->create($mdecin) ?>
        <div class="form-group">
            <?= $this->Form->control('name', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group text">
            <?= $this->Form->control('region_id', ['options' => $regions, 'empty' => 'Selectionner votre region', 'value' => $selected_region->id, 'class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <div id="departement_select">
                <?php echo $this->Form->control('departement_id', ['options' => $departements, 'empty' => 'Selectionner votre departement', 'value' => $selected_departement->id, 'class' => 'form-control']); ?>

            </div>
        </div>
        <div class="form-group">

            <div id="ville_select">
                <?php echo $this->Form->control('ville_id', ['options' => $villes, 'empty' => 'Selectionner votre ville', 'class' => 'form-control', 'class' => 'form-control']); ?>
            </div>
        </div>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
