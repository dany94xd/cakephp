<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>
     <?= $this->Html->css('menu.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
    
</head>
<body class="home">

<header class="row">
    <div class="header-image"><?= $this->Html->image('cake.logo.svg') ?></div>
    <div class="header-title">
        <h1>MENU CLIENTE</h1>
        <div class="top-bar-section">
            <ul class="right">
               <li><?= $this->Html->link('Logout', ['controller' => 'users', 'action' => 'logout']); ?></li>
            </ul>
        </div>
    </div>
</header>
 
<div class="row">
<div class="columns large-12">
<?php

    
    
$articles = TableRegistry::get('options_profiles');
$op = TableRegistry::get('options');
$opciones=array('conditions' => array('options_profiles.profile_id' => "3"));
 
    
$query = $articles->find('all',$opciones);
foreach ($query as $row) {
    $opciones2=array('conditions' => array('options.id' => $row->option_id));
 
    
    $query2 = $op->find('all',$opciones2);
    foreach ($query2 as $row2) {
    ?>
   
<ul class=”mn”>
<li><?= h($row2->description)?$this->HTML->link($row2->description,$row2->url):''?></li>
</ul>
<?php }} ?>
</div>
</div>
</body>
</html>