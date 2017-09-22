<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.html">
                <?php echo  $this->Html->link($this->Html->image('logo-light.png',[ 'alt' => 'logo' , 'class' => 'logo-default' ]),'/users/',['escape' => false]);?></a>
        </div>
        <!-- END LOGO -->                
        <div class="page-top">        
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="separator hide"> </li>                                                                               
                    <!-- BEGIN USER LOGIN DROPDOWN -->                    
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile"> <?= $_SESSION['Auth']['User']['username'] ?> </span>                            
                            <?php
                                if(file_exists($this->Html->image('usuarios/'.$_SESSION['Auth']['User']['id'].'.jpg'))){
                                   echo $this->Html->image('usuarios/'.$_SESSION['Auth']['User']['id'].'.jpg',  ['class' => 'img-circle']);
                                }else{                                            
                                   echo $this->Html->image('avatar.png',['class' => 'img-circle']); 
                                }                                                                                      
                            ?>    
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <?php echo $this->Html->link($this->Html->tag('i','',['class' => 'icon-user']).' Meu Perfil','/users/view/'.$_SESSION['Auth']['User']['id'], ['escape' => false]); ?>                                
                            </li>
                            <li>
                                <?php echo $this->Html->link($this->Html->tag('i','',['class' => 'icon-key']).' Log Out','/users/logout', ['escape' => false]); ?>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
        </div>                                                                                                                                
    </div>
</div>