<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OptionsProfile $optionsProfile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Options Profile'), ['action' => 'edit', $optionsProfile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Options Profile'), ['action' => 'delete', $optionsProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $optionsProfile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Options Profiles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Options Profile'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Options'), ['controller' => 'Options', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Option'), ['controller' => 'Options', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Profiles'), ['controller' => 'Profiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Profile'), ['controller' => 'Profiles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="optionsProfiles view large-9 medium-8 columns content">
    <h3><?= h($optionsProfile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Option') ?></th>
            <td><?= $optionsProfile->has('option') ? $this->Html->link($optionsProfile->option->id, ['controller' => 'Options', 'action' => 'view', $optionsProfile->option->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Profile') ?></th>
            <td><?= $optionsProfile->has('profile') ? $this->Html->link($optionsProfile->profile->id, ['controller' => 'Profiles', 'action' => 'view', $optionsProfile->profile->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($optionsProfile->id) ?></td>
        </tr>
    </table>
</div>
