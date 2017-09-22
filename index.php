<?php

	require("include/ini.php");
	
	if(isset($_GET['mod'])){$mod= $_GET['mod'];}else{$mod= "inicio";}
	if(isset($_GET['col'])){$col= $_GET['col'];$col_id= coligada($_GET['col'],"id");}
	$mods= $db->getAssoc("SELECT id,modulo FROM usr_mod WHERE idusuario = ".$_SESSION['rh']['usuario']['id']);

?>
<!DOCTYPE HTML>
<html>
    
<head>
            <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <title>
		Recursos Humanos
		<?php
			if ( isset($_GET['col']) )
			{
				echo " - ".$_GET['col'];
			}
		?>
	</title>
        
	<link rel="shortcut icon" type="image/x-icon" href="favicon_1.ico">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/select2.css" media="screen" />
	<link href="css/jquery.dataTables.css" rel="stylesheet">
	<link href="css/DT_bootstrap.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.1.8.2.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript" src="js/select2.js"></script>
	<script src="js/jquery.dataTables.js"></script>
	<script src="js/DT_bootstrap.js"></script>

</head>
<body>
	<div id="blank-bg" class="hide"></div>
	<div class="navbar">
		<div class="navbar-inner" style="padding:0;">
			<a class="brand" href="index.php">Recursos Humanos</a>
			<ul class="nav" id="menu-cols">
			<?php if( in_array( 1, $_SESSION['rh']['coligadas'] ) ){ ?>
				<li class="menu-col-HSL" rel="tooltip" title="Hospital Santa Lúcia"><a href="?col=HSL">HSL</a></li>
			<?php } ?>
			<?php if( in_array( 2, $_SESSION['rh']['coligadas'] ) ){ ?>
				<li class="menu-col-HSH" rel="tooltip" title="Hospital Santa Helena"><a href="?col=HSH">HSH</a></li>
			<?php } ?>
			<?php if( in_array( 4, $_SESSION['rh']['coligadas'] ) ){ ?>
				<li class="menu-col-HPN" rel="tooltip" title="Hospital Prontonorte"><a href="?col=HPN">HPN</a></li>
			<?php } ?>
			<?php if( in_array( 5, $_SESSION['rh']['coligadas'] ) ){ ?>
				<li class="menu-col-HMA" rel="tooltip" title="Hospital Maria Auxiliadora"><a href="?col=HMA">HMA</a></li>
			<?php } ?>
			<?php if( in_array( 7, $_SESSION['rh']['coligadas'] ) ){ ?>
				<li class="menu-col-CRB" rel="tooltip" title="Centro Radiológico de Brasília"><a href="?col=CRB">CRB</a></li>
			<?php } ?>
			<?php if( in_array( 8, $_SESSION['rh']['coligadas'] ) ){ ?>
				<li class="menu-col-CRG" rel="tooltip" title="Centro Radiológico do Gama"><a href="?col=CRG">CRG</a></li>
			<?php } ?>
			<?php if( in_array( 9, $_SESSION['rh']['coligadas'] ) ){ ?>
				<li class="menu-col-MED" rel="tooltip" title="Medgrupo"><a href="?col=MED">MED</a></li>
			<?php } ?>
			</ul>
			<ul style="margin:10px 0 0;" class="nav pull-right">
                            
			<?php if ( $_SESSION['rh']['usuario']['idnivel'] == 1){ ?>
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle nobg" href="#">
						<i class="icon-cog"></i> Configurações <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li class="menu-mod-usuarios"><a href="?mod=usuarios">Usuários</a></li>
					</ul>
				</li>
			<?php } ?>
				<li class="divider-vertical" style="height:39px;border-left-color:#DEDEDE;"></li>
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle nobg" href="#">
						<i class="icon-user"></i> <?= nome($_SESSION['rh']['usuario']['nome']) ?> <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="?mod=meu_perfil">Meu perfil</a></li>
						<li class="divider"></li>
						<li><a class="nobg" href="#" onclick="logout();"><i class="icon-off"></i> Sair</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- container -->
        <div class="container-fluid">
		
		<?php if( isset($_GET['col']) ){restricao_col($col_id); } ?>
		<?php if( isset($_GET['col']) ){ ?>
			<div class="span3 div-logo-col" style="margin-left:0px;text-align:center;">
				<img src="" class="" id="img-logo-col" width="" height="" alt="Hospital Santa Lúcia" />
			</div>
			<div class="cleaner" style="height:20px;"></div>
			<script type="text/javascript">
				$(function(){
					var menulatW = $('#menu_lateral').css('width').replace('px','');
					menulatW = menulatW - 10;
					$('#img-logo-col').parent().css({width: menulatW+'px'});
					$('#colapses ul li.disabled').attr('title','Você não tem permissão para acessar este módulo').children('a').addClass('nobg').click(function(e){
						e.preventDefault();
					});
				});
                               
			</script>
		<?php } ?>
		<div class="row-fluid" id="menucollapse">
                    
					<?php if( isset($_GET['col']) && in_array($col_id,$_SESSION['rh']['coligadas']) ){?>
                                        <div class="span3" id="menu_lateral" >
                                            <div class="well" style="max-width: 340px; padding: 8px 0;">
                                                    <ul class="nav nav-list">
                                                            <li class="nav-header">Recursos Humanos</li>
                                                            <?php if( in_array( "ouvid", $mods) ){ ?>
                                                            <li><a href="?col=<?=$col?>&mod=ouvidoria_interna"><i class="icon-comment"></i> Ouvidoria Interna</a></li>
                                                            <?php } ?>
                                                    </ul>
                                            </div>
                                        </div>
					<?php }else{ ?>
                                        <div class="span3" id="menu_lateral" style="height: 30px;" >
                                            <div class="span12 well well-small" style="margin-bottom:0;">
						<div class="alert alert-info" style="text-align:center;padding:10px 0px;margin-bottom:0;">Selecione uma coligada <i class="icon-hand-up"></i></div>
                                            </div>
                                            <script type="text/javascript">
                                                    $(function(){
                                                            $('.breadcrumb').parent().height('62').css('padding-top','5px').after('<div class="cleaner" style="height:20px;"></div><div class="span3" style="margin-left:0;">&nbsp;</div>');
                                                    });
                                            </script>
                                        </div>
					<?php } ?>
			

                            <?php

                                    if(isset($_GET['mod'])){
                                            $mod= $_GET['mod'];
                                    }else{
                                            $mod= "inicio";
                                    }
                                    if( file_exists("modulos/$mod.php") ){
                                            include("modulos/$mod.php");
                                    }else{
                                            include("modulos/404.php");
                                    }
                            ?>
		</div>
	</div>
        
        <div class="navbar navbar-bottom navbar-fixed-bottom hide">
            <div class="navbar-inner">
                <span class="label pull-left">Medgrupo</span>
                <img src="img/grupo_2.jpg" width="700" height="" alt="" />
                <span class="label pull-right label-info">Tecnologia da informação</span>
            </div>
	</div>
	
	<div id="modalLoading" class="modal hide fade">
            <div class="modal-body">
                <div class="progress progress-striped active">
                    <div style="width: 100%;" class="bar"></div>
                </div>
                <h5></h5>
            </div>
	</div>
        
	<div id="modalConfirm" class="modal hide fade">
            <div class="modal-header">
                <h4></h4>
            </div>
            <div class="modal-footer">
                <span data-dismiss="modal" class="btn btn-primary bt-primary pull-right" onclick="">s</span>
                <span data-dismiss="modal" class="btn pull-right" style="margin-right:8px;">n</span>
            </div>
	</div>
        
	<div id="modalPass" class="modal hide fade">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3>Confirme sua senha</h3>
                </div>
		<div class="modal-body">
                    <input type="password" name="conf_senha" value="" style="float:left;" />
                    <input class="btn btn-primary" type="button" value="OK" style="margin:1px 0 0 8px;" />
		</div>
	</div>
        
	<div id="modalMVError" class="modal hide fade" data-backdrop="false">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#modalMVError').modal('hide')">&times;</button>
                <span style="font-size:12px;font-weight:bold;"><i class="icon-warning-sign" style="margin-right:8px;"></i> NÃO FOI POSSÍVEL CONECTAR AO SISTEMA MV</span>
            </div>
	</div>
<script>
            !function ($) {
                $(function(){
                  // Fix for dropdowns on mobile devices
                  $('body').on('touchstart.dropdown', '.dropdown-menu', function (e) { 
                      e.stopPropagation(); 
                  });
                  $(document).on('click','.dropdown-menu a',function(){
                      document.location = $(this).attr('href');
                  });
                })
              }(window.jQuery)
        </script>
        
</body>
</html>

<style>
.dropdown-backdrop {
    position: static;
}
</style>