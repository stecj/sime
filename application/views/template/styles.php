<!-- Core CSS - Include with every page -->
<?= HTML::style('/media/sbadmin/css/bootstrap.min.css') ?>
<?= HTML::style('/media/serhas/css/overrides.css') ?>
<?= HTML::style('/media/sbadmin/font-awesome/css/font-awesome.css') ?>
<?= HTML::style('/media/menu_blue/menu.css') ?>
<?= HTML::style('/media/menu_nexus/css/component.css') ?>
<?= HTML::style('/media/menu_nexus/css/demo.css') ?>
<?= HTML::style('/media/menu_nexus/css/normalize.css') ?>

<?= HTML::script('media/serhas/js/usuper.js') ?>
<?= HTML::script('media/serhas/js/tabla.js') ?>
<?= HTML::style('/media/jtable/themes/metro/blue/jtable.min.css') ?>
<?= HTML::style('/media/tabla_pag/jTPS.css') ?>
					

<?php foreach ($styles as $style): ?>
	<?= HTML::style($style) ?>
<?php endforeach ?>

<!-- Page-Level Plugin CSS - Dashboard -->
<!--?= HTML::style('/media/sbadmin/css/plugins/morris/morris-0.4.3.min.css') ?-->
<!--?= HTML::style('/media/sbadmin/css/plugins/timeline/timeline.css') ?-->

<!-- SB Admin CSS - Include with every page -->
<!--?= HTML::style('/media/sbadmin/css/sb-admin.css') ?-->

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<?= HTML::script('/media/old/js/html5shiv.js') ?>
	<?= HTML::script('/media/old/js/respond.min.js') ?>
    <?= HTML::script('media/serhas/js/serhas.js') ?>
     <?= HTML::script('/media/tabla_pag/jTPS.js') ?>
     <?= HTML::script('/media/menu_nexus/js/classie.js') ?>
<?= HTML::script('/media/menu_nexus/js/gnmenu.js') ?>
<?= HTML::script('/media/menu_nexus/js/modernizr.custom.js') ?>
    
    
<![endif]-->
 