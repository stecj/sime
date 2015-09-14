<nav class="nav-navbar show">
	
	<div class="container-fluid row-criterion">
		
		<div class="row">
		<div class="col-sm-9">
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<label><?= __('Dimensiones') ?></label>
					<select class="form-control" multiple disabled>
						<?php foreach ($aDimension as $key => $value): ?>
							<?= HTML::tag('option', $value, array('value' => $key)) ?>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label><?= __('Factores') ?></label>
					<select class="form-control" multiple disabled>
						<?php foreach ($aFactor as $key => $value): ?>
							<?= HTML::tag('option', $value, array('value' => $key)) ?>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label><?= __('Criterios') ?></label>
					<select class="form-control" multiple disabled>
						<?php foreach ($aCriterion as $key => $value): ?>
							<?= HTML::tag('option', $value, array('value' => $key)) ?>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label><?= __('Estándares') ?></label>
					<select class="form-control" multiple id="criterion-standard">
						<?php foreach ($aStandard as $key => $value): ?>
							<?= HTML::tag('option', $value, array('value' => $key, 'data-target' => '#esta-'.$key)) ?>
						<?php endforeach ?>
					</select>
				</div>
			</div>
		</div>
		</div>
		<div class="col-sm-3">
			<div class="form-group">
				<label><?= __('Resultado de la Autoevaluación') ?></label>
				<p class="lead"><span id="result"><?= $response['result'] ?></span></p>
				<a href="">Detalle</a>
			</div>
		</div>
		</div>
		
		<!--?php foreach ($aStandard as $key => $value): ?>
			<?= HTML::anchor('#esta-'.$key, $value) ?>
		<-?php endforeach ? -->
	</div>
	
</nav>
