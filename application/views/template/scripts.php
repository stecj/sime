<!-- Core Scripts - Include with every page -->
<?= HTML::script('media/serhas/js/jquery.min.js') ?>
<?= HTML::script('media/serhas/js/prueba.js') ?>
<?= HTML::script('media/tabla_pag/jTPS.js') ?>
<?= HTML::script('media/serhas/js/jquery.js') ?>
<?= HTML::script('media/serhas/js/usuper.js') ?>
<?= HTML::script('media/serhas/js/tabla.js') ?>
<?= HTML::script('media/sbadmin/js/bootstrap.min.js') ?>
<?= HTML::script('media/sbadmin/js/plugins/metisMenu/jquery.metisMenu.js') ?>
<?= HTML::script('/media/menu_nexus/js/classie.js') ?>
<?= HTML::script('/media/menu_nexus/js/gnmenu.js') ?>
<?= HTML::script('/media/menu_nexus/js/modernizr.custom.js') ?>


<?= HTML::script('media/jtable/jquery.jtable.min.js') ?>

<?php foreach ($scripts as $script): ?>
	<?= HTML::script($script) ?>
<?php endforeach ?>

<!-- Page-Level Plugin Scripts - Dashboard -->
<!--?= HTML::script('media/sbadmin/js/plugins/morris/raphael-2.1.0.min.js') ?-->
<!--?= HTML::script('media/sbadmin/js/plugins/morris/morris.js') ?-->

<!-- SB Admin Scripts - Include with every page -->
<!--?= HTML::script('media/sbadmin/js/sb-admin.js') ?-->

<!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
<!--?= HTML::script('media/sbadmin/js/demo/dashboard-demo.js') ?-->

<!-- Include one of jTable styles. 
<link href="/jtable/themes/metro/blue/jtable.min.css" rel="stylesheet" type="text/css" />-->
 
<!-- Include jTable script file. 
<script src="/jtable/jquery.jtable.min.js" type="text/javascript"></script>-->