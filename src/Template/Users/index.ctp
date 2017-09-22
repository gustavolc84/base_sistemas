<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Lista de Usuários
            <small>Gerencie usuários do sistema.</small>
        </h1>
    </div>
    <!-- END PAGE TITLE -->
</div>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <?php echo  $this->Html->link('Home','/pages/home',['escape' => false]);?></a>        
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="#">Usuários</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Index</span>
    </li>
</ul>
<div class="col-md-12">        
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-user"></i>Lista de Usuários</div>            
        </div>
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <?= $this->Html->link($this->Html->tag('button','Adicionar '.$this->Html->tag('i','',['class' => 'fa fa-plus']),['class' => 'btn red' ]), ['action' => 'add'], ['escape' => false]); ?>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th>GROUP</th>
                        <th>CREATED</th>
                        <th>MODIFIED</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td><?= h($user->username) ?></td>
                        <td><?= h($user->password) ?></td>
                        <td>
                            <?= $user->has('group') ? $this->Html->link($user->group->name, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?>
                        </td>
                    <td><?= h($user->created) ?></td>
                        <td><?= h($user->modified) ?></td>
                            <td class="actions">  

                            <?= $this->Html->link($this->Html->tag('i','',['class' => 'fa fa-search']).' Visualizar', ['action' => 'view', $user->id], ['escape' => false, 'class' => 'btn btn-outline btn-circle btn-sm green']); ?>
                            <?= $this->Html->link($this->Html->tag('i','',['class' => 'fa fa-edit']).' Editar', ['action' => 'edit', $user->id], ['escape' => false, 'class' => 'btn btn-outline btn-circle btn-sm yellow']); ?>
                            <?= $this->Html->link($this->Html->tag('i','',['class' => 'fa fa-remove']).' Deletar', '#', ['escape' => false, 'class' => 'btn btn-outline btn-circle btn-sm red', 'onClick' => 'deleta_registro('.$user->id.');']); ?>                                                             

                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
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
                    url: '<?= $this->Url->build(["action" => "delete"]) ?>',
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
