<form class="form-sign signin" role="form" method="post">
	
	<h3 class="heading">
		<?= __('PANEL DE CONTROL DE ACCESO') ?>
		<a href="#">SERHAS</a>
	</h3>
	
	<img src="/serhas/media/serhas/img/serhas.png" class="logo img-responsive" alt="<?= __($site_title) ?>">
	
	<?php if ($error): ?>
  <div class="alert alert-danger"><?= $error ?></div>
	<?php endif ?>
	<hr>
	
    <div class="form-group">
    <p align="left"  class="text-info">LOCALIDAD: &nbsp;<i class="icon-star"></i>
     <select name="sede_local" class="form-control control-sign placeholder">
     <?= HTML::default_option('Tipo localidad') ?>
         <?php foreach ($sede as $keyS => $valS): ?>
                <option  value="<?= $keyS ?>"><?= __(strtoupper($valS)) ?></option>
         <?php endforeach ?>
      </select></p>

    </div>
    
  <div class="form-group">
		<input name="username" type="text" class="form-control control-sign" placeholder="<?= __('Usuario') ?>" required autofocus>
	</div>
	
	<div class="form-group">
		<input name="password" type="password" class="form-control control-sign" placeholder="<?= __('Contraseña') ?>" required>
	</div>
	
	<div class="form-group checkbox">
		<label>
			<input type="checkbox" value="remember-me"> <?= __('Recordarme') ?>
		</label>
	</div>
    
	<!--<a href="welcome/panel" class="btn btn-info btn-lg btn-block" role="button">Ingresar</a><br> -->
	
    <button class="btn btn-lg btn-info btn-block" type="submit"><?= __('Ingresar') ?></button><br>

</form>

<div class="footer-sign"> 
	Jr. Rosseau N° 465 - San Borja. Central (01) Teléfono: 013705138
<br>
	<a href="informes@serhasperu.com">SOLUCIONES EMPRESARIALES ENDAFE S.A.C.</a><br>
	ProCalidad © Copyright 2014
</div>

