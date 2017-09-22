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
?>
<CakePHPBakeOpenTagphp
/**
  * @var \<?= $namespace ?>\View\AppView $this
  * @var \<?= $entityClass ?> $<?= $singularVar ?>

  */
CakePHPBakeCloseTag>
<?php
use Cake\Utility\Inflector;

$associations += ['BelongsTo' => [], 'HasOne' => [], 'HasMany' => [], 'BelongsToMany' => []];
$immediateAssociations = $associations['BelongsTo'];
$associationFields = collection($fields)
    ->map(function($field) use ($immediateAssociations) {
        foreach ($immediateAssociations as $alias => $details) {
            if ($field === $details['foreignKey']) {
                return [$field => $details];
            }
        }
    })
    ->filter()
    ->reduce(function($fields, $value) {
        return $fields + $value;
    }, []);

$groupedFields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    })
    ->groupBy(function($field) use ($schema, $associationFields) {
        $type = $schema->columnType($field);
        if (isset($associationFields[$field])) {
            return 'string';
        }
        if (in_array($type, ['decimal', 'biginteger', 'integer', 'float', 'smallinteger', 'tinyinteger'])) {
            return 'number';
        }
        if (in_array($type, ['date', 'time', 'datetime', 'timestamp'])) {
            return 'date';
        }
        return in_array($type, ['text', 'boolean']) ? $type : 'string';
    })
    ->toArray();

$groupedFields += ['number' => [], 'string' => [], 'boolean' => [], 'date' => [], 'text' => []];
$pk = "\$$singularVar->{$primaryKey[0]}";
?>
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Lista de <CakePHPBakeOpenTag= __('<?= $pluralHumanName ?>') CakePHPBakeCloseTag>
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
        <CakePHPBakeOpenTag= $this->Html->link(__('<?= $pluralHumanName ?>'), ['action' => 'index']) CakePHPBakeCloseTag>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Visualizar</span>
    </li>
</ul>
<div class="col-md-12">   
    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-user"></i>Visualizar Usuário</div>            
        </div>
        <div class="portlet-body form">
            <CakePHPBakeOpenTag= $this->Form2->create($<?= $singularVar ?>) CakePHPBakeCloseTag>
            <div class="form-body">
                <fieldset>
                    <h3 class="form-section">Dados do <CakePHPBakeOpenTag= __('<?= $pluralHumanName ?>') CakePHPBakeCloseTag></h3>
                </fieldset> 
<?php $cont = 0; ?>                
<?php if ($groupedFields['string']) : ?>
<?php foreach ($groupedFields['string'] as $field) : ?>
<?php if ($cont ==2 ): ?>    
    <?php $cont = 0; ?>
    </div>
<?php endif; ?>    
<?php if ($cont == 0 ): ?>    
    <div class="row">
<?php endif; ?>    
<?php if (isset($associationFields[$field])) :
            $details = $associationFields[$field];
?>  
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3"><CakePHPBakeOpenTag= __('<?= Inflector::humanize($details['property']) ?>') CakePHPBakeCloseTag> :</label>
                <div class="col-md-9">
                    <p class="form-control-static"><CakePHPBakeOpenTag= $<?= $singularVar ?>->has('<?= $details['property'] ?>') ? $this->Html->link($<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['displayField'] ?>, ['controller' => '<?= $details['controller'] ?>', 'action' => 'view', $<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['primaryKey'][0] ?>]) : '' CakePHPBakeCloseTag></p>
                </div>
            </div>
        </div>
<?php else : ?>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3"><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag>:</label>
                <div class="col-md-9">
                    <p class="form-control-static"><CakePHPBakeOpenTag= h($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></p>
                </div>
            </div>
        </div>
<?php endif; ?>
<?php $cont++ ?>
<?php endforeach; ?>               
<?php endif; ?>
<?php if ($groupedFields['number']) : ?>
<?php foreach ($groupedFields['number'] as $field) : ?>
<?php if ($cont ==2 ): ?>    
    <?php $cont = 0; ?>
    </div>
<?php endif; ?>    
<?php if ($cont == 0 ): ?>    
    <div class="row">
<?php endif; ?>       
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3"><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag>:</label>
                <div class="col-md-9">
                    <p class="form-control-static"><CakePHPBakeOpenTag= $this->Number->format($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></p>
                </div>
            </div> 
        </div>
<?php $cont++ ?>        
<?php endforeach; ?>
<?php endif; ?>
<?php if ($groupedFields['date']) : ?>
<?php foreach ($groupedFields['date'] as $field) : ?>
<?php if ($cont ==2 ): ?>    
    <?php $cont = 0; ?>
    </div>
<?php endif; ?>    
<?php if ($cont == 0 ): ?>    
    <div class="row">
<?php endif; ?>  
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3"><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag>:</label>
                <div class="col-md-9">
                    <p class="form-control-static"><CakePHPBakeOpenTag= h($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></p>
                </div>
            </div>
        </div>
<?php $cont++ ?>           
<?php endforeach; ?>
<?php endif; ?>
<?php if ($groupedFields['boolean']) : ?>
<?php foreach ($groupedFields['boolean'] as $field) : ?>
<?php if ($cont ==2 ): ?>    
    <?php $cont = 0; ?>
    </div>
<?php endif; ?>    
<?php if ($cont == 0 ): ?>    
    <div class="row">
<?php endif; ?>  
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3"><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag>:</label>
                <div class="col-md-9">
                    <p class="form-control-static"><CakePHPBakeOpenTag= $<?= $singularVar ?>-><?= $field ?> ? __('Yes') : __('No'); CakePHPBakeCloseTag></p>
                </div>
            </div>
        </div>
<?php endforeach; ?>
<?php endif; ?>
<?php if ($cont !=2 ): ?>        
    </div>
<?php endif; ?>  
            </div>    
        </div>
    </div>
</div>  

