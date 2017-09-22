<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->    
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="heading">
                <h3 class="uppercase">Menu do Sistema</h3>
            </li>
            <li class="nav-item start ">                
                <?php echo 
                    $this->Html->link(
                        $this->Html->tag(
                                'i',
                                '',
                                ['class' => 'icon-home']
                        ).'<span class="title"> Aréa de Trabalho </span>',
                        '/pages/home', 
                        ['escape' => false]
                    ); 
                ?>                                                
            </li>
            <li class="nav-item start <?php if($this->request->params['controller'] == 'Users') { echo 'active'; } ?> ">                
                <?php echo 
                    $this->Html->link(
                        $this->Html->tag(
                                'i',
                                '',
                                ['class' => 'icon-user']
                        ).'<span class="title"> Usuários </span>',
                        '/users/', 
                        ['escape' => false]
                    ); 
                ?>                                                
            </li>
            <li class="nav-item start <?php if($this->request->params['controller'] == 'Groups') { echo 'active'; } ?> ">                
                <?php echo 
                    $this->Html->link(
                        $this->Html->tag(
                                'i',
                                '',
                                ['class' => 'icon-users']
                        ).'<span class="title"> Grupo </span>',
                        '/groups/', 
                        ['escape' => false]
                    ); 
                ?>                                                
            </li>              
        </ul>        
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>