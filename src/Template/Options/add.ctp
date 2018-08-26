<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Option $option
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Options'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Profiles'), ['controller' => 'Profiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Profile'), ['controller' => 'Profiles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="options form large-9 medium-8 columns content">
    <?= $this->Form->create($option) ?>
    <fieldset>
        <legend><?= __('Add Option') ?></legend>
        <?php
            echo $this->Form->control('description');
            echo $this->Form->control('url');
            echo $this->Form->control('profiles._ids', ['options' => $profiles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
