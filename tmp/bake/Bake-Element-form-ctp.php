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
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    });

if (isset($modelObject) && $modelObject->hasBehavior('Tree')) {
    $fields = $fields->reject(function ($field) {
        return $field === 'lft' || $field === 'rght';
    });
}
?>
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Lista de Usuários
            <small>Gerencie <CakePHPBakeOpenTag= __('<?= $pluralHumanName ?>') CakePHPBakeCloseTag> do sistema.</small>
        </h1>
    </div>
    <!-- END PAGE TITLE -->
</div>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <CakePHPBakeOpenTagphp echo  $this->Html->link('Home','/pages/home',['escape' => false]);CakePHPBakeCloseTag>       
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <CakePHPBakeOpenTag= $this->Html->link(__('List <?= $pluralHumanName ?>'), ['action' => 'index']) CakePHPBakeCloseTag>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active"><CakePHPBakeOpenTag= __('Actions') CakePHPBakeCloseTag></span>
    </li>
</ul>
<div class="col-md-12">   
    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-user"></i>Novo <CakePHPBakeOpenTag= __('<?= $singularHumanName ?>') CakePHPBakeCloseTag></div>            
        </div> 
        <div class="portlet-body form">
    <CakePHPBakeOpenTag= $this->Form2->create($<?= $singularVar ?>) CakePHPBakeCloseTag>
            <div class="form-body">
                <fieldset>
                    <h3 class="form-section">Dados <CakePHPBakeOpenTag= __('<?= $singularHumanName ?>') CakePHPBakeCloseTag></h3>       
        <CakePHPBakeOpenTagphp
<?php
        foreach ($fields as $field) {
            if (in_array($field, $primaryKey)) {
                continue;
            }
            if (isset($keyFields[$field])) {
                $fieldData = $schema->column($field);
                if (!empty($fieldData['null'])) {
?>
            echo $this->Form2->control('<?= $field ?>', ['options' => $<?= $keyFields[$field] ?>, 'empty' => true]);
<?php
                } else {
?>
            echo $this->Form2->control('<?= $field ?>', ['options' => $<?= $keyFields[$field] ?>]);
<?php
                }
                continue;
            }
            if (!in_array($field, ['created', 'modified', 'updated'])) {
                $fieldData = $schema->column($field);
                if (in_array($fieldData['type'], ['date', 'datetime', 'time']) && (!empty($fieldData['null']))) {
?>
            echo $this->Form2->control('<?= $field ?>', ['empty' => true]);
<?php
                } else {
?>
            echo $this->Form2->control('<?= $field ?>');
<?php
                }
            }
        }
        if (!empty($associations['BelongsToMany'])) {
            foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
?>
            echo $this->Form2->control('<?= $assocData['property'] ?>._ids', ['options' => $<?= $assocData['variable'] ?>]);
<?php
            }
        }
?>
        CakePHPBakeCloseTag>
            </fieldset>
            </div>
            <div class="form-actions right">  
                <CakePHPBakeOpenTag= $this->Form->button(__('Salvar'), ['class' => 'btn blue']) CakePHPBakeCloseTag>
            </div>    
            <CakePHPBakeOpenTag= $this->Form->end() CakePHPBakeCloseTag>
        </div>
    </div>
</div>    
