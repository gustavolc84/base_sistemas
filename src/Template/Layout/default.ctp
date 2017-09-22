<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */


?>
<!DOCTYPE html>
<html>
<head>    
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= 'Sistema Grupo Santa' ?>        
    </title>
    <?= $this->Html->meta('icon') ?>
    
    <!-- MANDATORY -->
    <?= $this->Html->css('../assets/global/plugins/font-awesome/css/font-awesome.css') ?>
    <?= $this->Html->css('../assets/global/plugins/simple-line-icons/simple-line-icons.css') ?>
    <?= $this->Html->css('../assets/global/plugins/bootstrap/css/bootstrap.css') ?>
    <?= $this->Html->css('../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.css') ?>
    <!-- GLOBAL -->
    <?= $this->Html->css('../assets/global/plugins/select2/css/select2.css') ?>
    <?= $this->Html->css('../assets/global/plugins/select2/css/select2-bootstrap.min.css') ?>    
    <?= $this->Html->css('../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css') ?>    
    <?= $this->Html->css('../assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') ?>    
    <?= $this->Html->css('../assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css') ?>    
    <?= $this->Html->css('../assets/global/plugins/datatables/datatables.min.css') ?>
    <?= $this->Html->css('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') ?>
    <?= $this->Html->css('../assets/global/css/components.css') ?>
    <?= $this->Html->css('../assets/global/css/plugins.css') ?>
    <?= $this->Html->css('../assets/global/plugins/bootstrap-sweetalert/sweetalert.css') ?>   
    <!-- THEMA -->
    <?= $this->Html->css('../assets/layouts/layout4/css/layout.css') ?>
    <?= $this->Html->css('../assets/layouts/layout4/css/themes/default.css') ?>
    <?= $this->Html->css('../assets/layouts/layout4/css/custom.css') ?>    
</head>



<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo ">
    <?= $this->element('header') ?>    
    
    <div class="page-container">
        <?= $this->element('menu') ?>
        <div class="page-content-wrapper">
            <div class="page-content">
            <?= $this->Flash->render() ?>        
            <?= $this->fetch('content') ?>   
            </div>    
        </div>        
    </div>
        
    <div class="page-footer">               
            <div style="margin: 0 auto; width: 50%;"><?php echo  $this->Html->link($this->Html->image('footer.png',[ 'alt' => 'logo' , 'class' => 'logo-default' ]),'/users/',['escape' => false]);?></div>                        
    </div>
    
<!-- BEGIN CORE PLUGINS -->    
<?= $this->Html->script('../assets/global/plugins/jquery.min.js') ?>    
<?= $this->Html->script('../assets/global/plugins/bootstrap/js/bootstrap.js') ?>
<?= $this->Html->script('../assets/global/plugins/js.cookie.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/jquery.blockui.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.js') ?>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<?= $this->Html->script('../assets/global/scripts/datatable.js') ?>
<?= $this->Html->script('../assets/global/plugins/datatables/datatables.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') ?>
<?= $this->Html->script('../assets/global/scripts/app.js') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js') ?>
<?= $this->Html->script('../assets/pages/scripts/table-datatables-responsive.js') ?>
<?= $this->Html->script('../assets/global/plugins/select2/js/select2.full.js') ?>
<?= $this->Html->script('../assets/global/plugins/jquery-validation/js/jquery.validate.js') ?>
<?= $this->Html->script('../assets/global/plugins/jquery-validation/js/additional-methods.js') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') ?>
<?= $this->Html->script('../assets/global/plugins/ckeditor/ckeditor.js') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-markdown/lib/markdown.js') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js') ?>

<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<?= $this->Html->script('../assets/pages/scripts/ui-sweetalert.js') ?>
<?= $this->Html->script('../assets/layouts/layout4/scripts/layout.js') ?>
<?= $this->Html->script('../assets/layouts/layout4/scripts/demo.js') ?>
<?= $this->Html->script('../assets/layouts/global/scripts/quick-sidebar.min.js') ?>
<?= $this->Html->script('../assets/layouts/global/scripts/quick-nav.min.js') ?>
<!-- END THEME LAYOUT SCRIPTS -->
</body>
</html>
