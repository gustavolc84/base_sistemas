<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Editar Usuário
            <small>Edite o usuário do sistema.</small>
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
        <span class="active">Editar</span>
    </li>
</ul>
<div class="col-md-12">   
    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-user"></i>Editar Usuário</div>            
        </div> 
        <div class="portlet-body form">
            <?= $this->Form2->create($user); ?>
            <div class="form-body">
                <fieldset>
                    <h3 class="form-section">Dados do Usúario</h3>
                    <div class="row">
                        <div class="col-md-6">                                   
                            <?= $this->Form2->input('username'); ?>                              
                        </div>
                        <div class="col-md-6">   
                            <?= $this->Form2->input('password'); ?>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-md-6">   
                            <?= $this->Form2->input('group_id', ['options' => $groups]); ?>
                        </div>                                
                    </div>
                </fieldset>
            </div>
            <div class="form-actions right">                    
                <?= $this->Form2->button(__('Salvar'), ['class' => 'btn blue']) ?>                 
            </div>                
            <?= $this->Form2->end() ?>            
        </div>
    </div>
</div>
