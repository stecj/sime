<nav class="clearfix nav-header">
	<div class="container-fluid">
		<div class="navbar-header">
	
    <script src="js/classie.js"></script>
		<script src="js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
		<div class="container">
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
					
								<li>
									<a href="usuario_permisos" class="gn-icon gn-icon-download">ADMINISTRACIÓN</a>
									<ul class="gn-submenu">
										<li><a href="usuario_permisos" class="gn-icon gn-icon-illustrator">Usuarios y Permisos</a></li>
                                        <li><a href="especialidades" class="gn-icon gn-icon-illustrator">Especialidades</a></li>
                                        <li><a href="doctores" class="gn-icon gn-icon-illustrator">Doctores</a></li>
                                        <li><a href="empresas" class="gn-icon gn-icon-illustrator">Empresas</a></li>
                                        <li><a href="Examenes_ocupacionales" class="gn-icon gn-icon-illustrator">Examenes Ocupacionales</a></li>
                                        <li><a href="tipo_denominacion" class="gn-icon gn-icon-illustrator">Tipo de denominación</a></li>
                                        <li><a href="catalogo" class="gn-icon gn-icon-illustrator">Catálogo</a></li>
                                        <li><a href="protocolo" class="gn-icon gn-icon-illustrator">Protocolo</a></li>
									</ul>
								</li>
                                
								<li><a href="pacientes" class="gn-icon gn-icon-download">ADMISIÓN</a></li>
                                	<ul class="gn-submenu">
                                  	  <li><a href="pacientes" class="gn-icon gn-icon-illustrator">filiación</a></li>
                                    </ul>
								<li><a href="#" class="gn-icon gn-icon-download">FACTURACIÒN</a></li>
                                <li><a href="#" class="gn-icon gn-icon-download">ATENCIÒN</a></li>
                                <li><a href="#" class="gn-icon gn-icon-download">REPORTES</a></li>
                                <li><a href="../welcome/salir" class="gn-icon gn-icon-help">CERRAR SESIÓN</a></li>
							
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
              <li><a class="navbar-brand brand-saes" href="panel_bienvenida">
        		<img src="/serhas/media/serhas/img/serhas.png" class="logo img-responsive" alt="<?= __($site_title) ?>">
			</a></li>

				<li>
             
      
			<a class="navbar-brand brand-saes" href="panel_bienvenida">
        		<img src="/serhas/media/serhas/img/serhas.png" class="logo img-responsive" alt="<?= __($site_title) ?>">
			</a>
		

		<ul class="nav navbar-top-links navbar-right">

			
			<!-- /.dropdown -->
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
				</a>
				<ul class="dropdown-menu dropdown-user">
					<li><a href="#"><i class="fa fa-user fa-fw"></i> <?= strtoupper($oUser->nom_usuario) ?></a></li>
					<li><a href="usuario_permisos"><i class="fa fa-gear fa-fw"></i> <?= __('Perfil') ?></a></li>
					<li class="divider"></li>
					<li><a href="../welcome/salir"><i class="fa fa-sign-out fa-fw"></i> <?= __('Salir') ?></a>
					</li>
				</ul>
				<!-- /.dropdown-user -->
		  </li>
			<!-- /.dropdown -->
		</ul>
                
                </li>
			</ul>
		</div><!-- /container -->
		
	
              
		</div>

		<!-- /.navbar-header -->

		<div class="navbar-text header-title">
			
		</div>

		<div align="left" class="navbar-text welcome-title">
			BIENVENIDO...<strong>"<?= strtoupper($oUser->nom_usuario) , strtoupper($oUser->apellido_usuario) ?>"</strong>
		</div>

		
		<!-- /.navbar-top-links -->

		<button type="button" class="nav-navbar-toggle <?= $buttonClass ?>">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
        
     <br>
	 <br>

      <hr size="5" NOSHADE>
		<!--MENU PRINCIPAL-->

	
	</div>
</nav>
