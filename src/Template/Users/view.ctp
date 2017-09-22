<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Visualizar Usuário
            <small>Visualize usuário no sistema.</small>
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
            <?= $this->Form2->create($user,['class' => 'form-horizontal']); ?>
            <div class="form-body">
                <fieldset>
                    <h3 class="form-section">Dados do Usúario</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">Username: </label>
                                <div class="col-md-9">
                                    <p class="form-control-static"> <?= h($user->username) ?> </p>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">Password: </label>
                                <div class="col-md-9">
                                    <p class="form-control-static"> <?= h($user->password) ?> </p>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">Grupo: </label>
                                <div class="col-md-9">
                                    <p class="form-control-static"> <?= $user->has('group') ? $this->Html->link($user->group->name, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?> </p>
                                </div>
                            </div>
                        </div>                              
                    </div>
                </fieldset>
            </div>               
            <?= $this->Form2->end() ?>            
        </div>
    </div>
</div>

