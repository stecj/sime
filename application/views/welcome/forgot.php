<form class="form-sign signin" role="form" method="post">
	
	<h3 class="heading">
		<?= __('Sistema de Autoevaluación') ?>
		<a href="#">SAES</a>
	</h3>
	
	<img src="/serhas/media/serhas/img/serhas.png" class="logo img-responsive" alt="<?= __($site_title) ?>">
	
	<?php if ($error): ?>
  <div class="alert alert-danger"><?= $error ?></div>
	<?php endif ?>
	<hr>
	
	<p class="help-block"><?= __($message) ?></p>
	<div class="form-group">
		<input name="email" type="text" class="form-control control-sign" placeholder="<?= __('Ingrese su correo') ?>" required autofocus>
	</div>
	
	<button class="btn btn-lg btn-primary btn-block" type="submit"><?= __('Enviar') ?></button><br>
	
	<div class="form-group actions text-center">
		<a class="btn btn-link" href="../welcome"><?= __('Ingresar') ?></a> |
		<a class="btn btn-link" href="../welcome/panel"><?= __('Registrarse') ?></a>
	</div>
</form>

<div class="footer-sign"> 
	Jr. Rosseau N° 465 - San Borja. Central (01) 605-8960<br>
	<a href="mailto:procalidad@procalidad.gob.pe">procalidad@procalidad.gob.pe</a><br>
	ProCalidad © Copyright 2014
</div>

