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
  * @var \<?= $entityClass ?>[]|\Cake\Collection\CollectionInterface $<?= $pluralVar ?>

  */
CakePHPBakeCloseTag>
<?php
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return !in_array($schema->columnType($field), ['binary', 'text']);
    });

if (isset($modelObject) && $modelObject->behaviors()->has('Tree')) {
    $fields = $fields->reject(function ($field) {
        return $field === 'lft' || $field === 'rght';
    });
}

if (!empty($indexColumns)) {
    $fields = $fields->take($indexColumns);
}

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
        <span class="active"><CakePHPBakeOpenTag= __('Actions') CakePHPBakeCloseTag></span>
    </li>
</ul>
<div class="col-md-12">   
    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-user"></i>Lista de <CakePHPBakeOpenTag= __('<?= $pluralHumanName ?>') CakePHPBakeCloseTag>
            </div>            
        </div> 
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <CakePHPBakeOpenTag= $this->Html->link($this->Html->tag('button','Adicionar '.$this->Html->tag('i','',['class' => 'fa fa-plus']),['class' => 'btn red' ]), ['action' => 'add'], ['escape' => false]); CakePHPBakeCloseTag>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1" cellspacing="0" width="100%">
                <thead>
                    <?php foreach ($fields as $field): ?>
                        <th><CakePHPBakeOpenTag= '<?= $field ?>' CakePHPBakeCloseTag></th>
                    <?php endforeach; ?>                    
                        <th> Ações </th>
                </thead>
                <tbody>          
                    
                      <CakePHPBakeOpenTagphp foreach ($<?= $pluralVar ?> as $<?= $singularVar ?>): CakePHPBakeCloseTag>
                        <tr>
            <?php        foreach ($fields as $field) {
                        $isKey = false;
                        if (!empty($associations['BelongsTo'])) {
                            foreach ($associations['BelongsTo'] as $alias => $details) {
                                if ($field === $details['foreignKey']) {
                                    $isKey = true;
            ?>
                            <td><CakePHPBakeOpenTag= $<?= $singularVar ?>->has('<?= $details['property'] ?>') ? $this->Html->link($<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['displayField'] ?>, ['controller' => '<?= $details['controller'] ?>', 'action' => 'view', $<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['primaryKey'][0] ?>]) : '' CakePHPBakeCloseTag></td>
            <?php
                                    break;
                                }
                            }
                        }
                        if ($isKey !== true) {
                            if (!in_array($schema->columnType($field), ['integer', 'float', 'decimal', 'biginteger', 'smallinteger', 'tinyinteger'])) {
            ?>
                            <td><CakePHPBakeOpenTag= h($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></td>
            <?php
                            } else {
            ?>
                            <td><CakePHPBakeOpenTag= $this->Number->format($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></td>
            <?php
                            }
                        }
                    }

                    $pk = '$' . $singularVar . '->' . $primaryKey[0];
            ?>
                            <td>
                                <CakePHPBakeOpenTag= $this->Html->link($this->Html->tag('i','',['class' => 'fa fa-search']).' Visualizar', ['action' => 'view', <?= $pk ?>], ['escape' => false, 'class' => 'btn btn-outline btn-circle btn-sm green']); CakePHPBakeCloseTag>
                                <CakePHPBakeOpenTag= $this->Html->link($this->Html->tag('i','',['class' => 'fa fa-edit']).' Editar', ['action' => 'edit', <?= $pk ?>], ['escape' => false, 'class' => 'btn btn-outline btn-circle btn-sm yellow']); CakePHPBakeCloseTag>
                                <CakePHPBakeOpenTag= $this->Html->link($this->Html->tag('i','',['class' => 'fa fa-remove']).' Deletar', '#', ['escape' => false, 'class' => 'btn btn-outline btn-circle btn-sm red', 'onClick' => 'deleta_registro('.<?= $pk ?>.');']); CakePHPBakeCloseTag>                                                             

                            </td>
                        </tr>
            <CakePHPBakeOpenTagphp endforeach; CakePHPBakeCloseTag>
                </tbody>
            </table>
        </div>
    </div>
</div>             
<script type="text/javascript">
function deleta_registro(id) {
    swal
    (
        {
            title: "ATENÇÂO:", 
            text: "Tem certeza em deletar este registro?", 
            type: "warning",
            inputType: "submit",
            showCancelButton: true,
            closeOnConfirm: true
        },
            function(isConfirm){
              if (isConfirm == true) {
                $.ajax({
                    url: '<CakePHPBakeOpenTag= $this->Url->build(["action" => "delete"]) CakePHPBakeCloseTag>',
                    type: 'POST',
                    data: { id : id },
                    success: function(){
                      location.reload();
                    },
                    error: function(){
                      location.reload();
                    }
                });                                 
              }  
            }                       
    )
};
</script> 