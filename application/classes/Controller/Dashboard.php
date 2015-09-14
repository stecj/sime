<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Dashboard extends Controller_Serhas {

	
	
	protected function _add_styles()
	{
		$default = $this->template->styles->styles;
		$before = array(
			'/media/sbadmin/css/plugins/morris/morris-0.4.3.min.css',
			'/media/sbadmin/css/plugins/timeline/timeline.css',
		);
		
		$this->template->styles->styles = array_merge($before, $default);
	}		/*ESTILOS CSS*/
	
	protected function _add_scripts()
	{
		$default = $this->template->scripts->scripts;
		$before = array(
			'media/sbadmin/js/plugins/morris/raphael-2.1.0.min.js',
			'media/sbadmin/js/plugins/morris/morris.js',
		
		);
		$after = array(
			'media/sbadmin/js/demo/dashboard-demo.js',
			
		);
		
		$this->template->scripts->scripts = array_merge($before, $default, $after);
	}		/*SCRIPS JS*/
	
	public function before()
	{
		$this->_check_ajax();
		
		parent::before();
		
		$this->_set_controller_globals();
		$this->_set_view_globals();
		$this->_set_template_blocks();
	}
	
	public function action_dash()
	{
		$this->_add_styles();
		$this->_add_scripts();
		
		$this->template->content = View::factory('dashboard');
	}		/* CONTROLADOR JS CSS*/
	
	public function action_index()
	{
		$this->action_start();
	}
	
	public function action_panel_bienvenida()
	{
	$view = View::factory('dashboard/panel_bienvenida');
		
		
		$this->template->content = $view;
	}		/* FUNCION BIENVENIDA*/
	
	public function action_empresas()
	{
		if(isset($_POST['crear_empresa'])){
			$this->create_empresa();}
			
		if(isset($_POST['editar_empresa'])){
			$this->editar_empresa();}
			
		for ($i = 1; $i <= 100; $i++) {
		if(isset($_POST['deleteE'.$i])){
			$this->delete_empresa();}
		}
			
		$ubigeodep = ORM::factory('Ubigeo')		/*MODEL SEDE*/
			->find_all()
			->as_array('cod_departamento', 'nom_departamento');
	
		
		$ubigeopro = ORM::factory('Ubigeo')		/*MODEL SEDE provincia*/
		->find_all();
		
		$subcatalogo = ORM::factory('SubCatalogo')
			->where('estado_Subcatalogo','=',"activo")
			->find_all()
			->as_array('cod_subcatalogo', 'nom_subcatalogo');

		
		$ubigeodis = ORM::factory('Ubigeo')		/*MODEL SEDE*/
			->find_all();
		
		$EmpTab = ORM::factory('Empresa')		/*MODEL PERFIL*/
			->where('estado_empresa', '=', 'activo')
			->find_all();
			
		$contEmp = ORM::factory('Empresa')		/*MODEL PERFIL*/
			->where('estado_empresa', '=', 'activo')
			->find_all()
			->as_array('cod_empresa', 'nom_empresa');;
		
		$EmpEdit = ORM::factory('Empresa')		/*MODEL PERFIL*/
			->where('estado_empresa', '=', 'activo')
			->find_all();
		
		$EmpExcel = ORM::factory('Empresa')		/*MODEL PERFIL*/
			->find_all();
		
		
	$view = View::factory('dashboard/empresas')
	->set(compact('subcatalogo','contEmp','EmpExcel','ubigeodis','ubigeopro','ubigeodep','EmpEdit','EmpTab'));

		
		$this->template->content = $view;
	}		/* FUNCION EMPRESAS*/
	
	public function action_papel()
	{ 	
		$docCod = ORM::factory('Usuario')		/*MODEL USUARIOS ESTADO*/
			->where('isDoctor', '=', 1)
			->find_all();
		
		$view = View::factory('dashboard/papel')
		->set(compact('docCod'));

		
		$this->template->content = $view;
	}		/* FUNCION papel*/
	
	public function action_protocolo()
	{ 	
		$docCod = ORM::factory('Usuario')		/*MODEL USUARIOS ESTADO*/
			->where('isDoctor', '=', 1)
			->find_all();
		
		$view = View::factory('dashboard/protocolo')
		->set(compact('docCod'));

		
		$this->template->content = $view;
	}		/* FUNCION PROTOCOLO*/
	
	public function action_especialidades()
	{
		if(isset($_POST['editar_especialidad'])){
			$this->editar_especialidad();}
		
		if(isset($_POST['crear_especialidad'])){
			$this->create_especialidades();}
			
		for ($i = 1; $i <= 100; $i++) {
		if(isset($_POST['delE'.$i])){
			$this->delete_especialidades();}
		}		/*REDIRECT DELETE ESPECIALIDADES*/
		
		$EspTipo = ORM::factory('Especialidad')		/*MODEL ESPECIALIDADES*/
			->where('estado_especialidad', '=', 1)
			->find_all()
			->as_array('id_especialidad', 'nom_especialidad');
		
	$view = View::factory('dashboard/especialidades')
	->set(compact('EspTipo'));

		
		$this->template->content = $view;
	}		/* FUNCION ESPECIALIDADES*/
	
	public function action_Examenes_ocupacionales()
	{
		if(isset($_POST['editar_examen'])){
			$this->editar_examenes();}
		
		if(isset($_POST['crear_examen'])){
			$this->create_examenes();}
			
		for ($i = 1; $i <= 100; $i++) {
		if(isset($_POST['delExa'.$i])){
			$this->delete_examenes();}
		}		/*REDIRECT DELETE EXAMEN*/
		
		$ExamTipo = ORM::factory('ExamenOcupacional')		/*MODEL EXAMEN*/
			->where('estado_examen', '=', "activo")
			->find_all()
			->as_array('cod_examen', 'nom_examen');
		
	$view = View::factory('dashboard/Examenes_ocupacionales')
	->set(compact('ExamTipo'));

		
		$this->template->content = $view;
	}		/* FUNCION EXAMEN OCUPACIONAL*/
	
	public function action_doctores()
	{ 
		for ($i = 1; $i <= 100; $i++) {
		if(isset($_POST['deleteU'.$i])){
			$this->delete_usuario();}
		}		/*REDIRECT DELETE USUARIO*/
		
		if(isset($_POST['crear_usuario'])){
			$this->create_doctor();}		/*REDIRECT CREAR USUARIO*/
		
		
		if(isset($_POST['editar_usuario'])){
			$this->editar_doctor();}		/*REDIRECT EDITAR USUARIO*/		
		
		$docCod = ORM::factory('Usuario')		/*MODEL USUARIOS ESTADO*/
			->where('isDoctor', '=', 1)
			->find_all();
		
		$EspTipo = ORM::factory('Especialidad')		/*MODEL PERFIL*/
			->where('estado_especialidad', '=', 1)
			->find_all()
			->as_array('id_especialidad', 'nom_especialidad');
		
		$uTipo = ORM::factory('Usuario')		/*MODEL USUARIOS ALL*/
			->find_all();
		
		$sede = ORM::factory('Sede')		/*MODEL SEDE*/
			->where('est_sede', '=', 1)
			->find_all()
			->as_array('id_sede', 'ubi_sede');
		
		$pTipo = ORM::factory('Perfil')		/*MODEL PERFIL*/
			->where('estado_perfil', '=', 1)
			->find_all()
			->as_array('id_perfil', 'nom_perfil');
		
		$usperTipo = ORM::factory('UsuarioPerfil')		/*MODEL USUARIOS EDIT RECOR*/
			->where('estado_usu_per', '=', 1)
			->find_all();
		
		$usTipoE = ORM::factory('Usuario')		/*MODEL USUARIOS ESTADO*/
			->where('estado_usuario', '=', 'activo')
			->find_all();
		
		$usDoctor = ORM::factory('Usuario')
			->where('estado_usuario','=','activo')
			->where('isDoctor','=', 1 )
			->find_all();
		$usDoctorExcel = ORM::factory('Usuario')
			->where('estado_usuario','=','activo')
			->where('isDoctor','=', 1 )
			->find_all();
			
	$view = View::factory('dashboard/doctores')
			->set(compact('docCod','usDoctorExcel','EspTipo','uTipo','sede','pTipo','usperTipo','usTipoE','usDoctor'));
		
		$this->template->content = $view;
	}		/* FUNCION DOCTORES */
	
	public function action_tipo_denominacion()
	{ 
		for ($i = 1; $i <= 100; $i++) {
		if(isset($_POST['delDeno'.$i])){
			$this->delete_denominacion();}
		}		/*REDIRECT DELETE DENOMINACION*/
		
		if(isset($_POST['crear_denominacion'])){
			$this->create_denominacion();}		/*REDIRECT CREAR DENOMINACION*/
		
		
		if(isset($_POST['editar_denominacion'])){
			$this->editar_denominacion();}		/*REDIRECT EDITAR DENOMINACION*/		
		
		
		
	$DenoTipo = ORM::factory('TipoDenominacion')		/*MODEL DENOMINACION*/
		->where('estado_denominacion', '=', "activo")
		->find_all();
		
	$DenoTipoE = ORM::factory('TipoDenominacion')		/*MODEL DENOMINACION*/
		->where('estado_denominacion', '=', "activo")
		->find_all();	
			
	$view = View::factory('dashboard/tipo_denominacion')
			->set(compact('DenoTipoE','DenoTipo'));
		
		$this->template->content = $view;
		
	}		/* FUNCION TIPO DE DENOMINACION */

	public function action_usuario_permisos()
	{
		if(isset($_POST['creare_sede'])){
			$this->CreateSede();}
		
		if(isset($_POST['crear_usuario'])){
			$this->create_usuario();}		/*REDIRECT CREAR USUARIO*/
		
		if(isset($_POST['crear_perfil'])){
			$this->create_perfil();}		/*REDIRECT CREAR PERFIL*/
	
	 	for ($i = 1; $i <= 1000; $i++) {
		if(isset($_POST['del'.$i])){
			$this->delete_perfil();}
		}		/*REDIRECT DELETE PERFIL*/
				
		for ($i = 1; $i <= 1000; $i++) {
		if(isset($_POST['deleteU'.$i])){
			$this->delete_usuario();}
		}		/*REDIRECT DELETE USUARIO*/
	
		if(isset($_POST['editarPerfil'])){
			$this->editar_perfil();}		/*REDIRECT EDITAR PERFIL*/
		
		if(isset($_POST['editar_usuario'])){
			$this->editar_usuario();}		/*REDIRECT EDITAR USUARIO*/		
		
		if(isset($_POST['editar_permisos'])){
			$this->editar_permisos();}		/*REDIRECT*/
		
		$usCod = ORM::factory('Usuario')		/*MODEL USUARIOS ESTADO*/
			->where('isDoctor', '=', 0)
			->find_all();	
			
		
	
		$estado_civil = ORM::factory('Usuario')		/*MODEL USUARIOS ESTADO*/
			->where('estado_usuario', '=', 'activo')
			->find_all();
	
		$pTipo = ORM::factory('Perfil')		/*MODEL PERFIL*/
			->where('estado_perfil', '=', 1)
			->find_all()
			->as_array('id_perfil', 'nom_perfil');
			
		$sede = ORM::factory('Sede')		/*MODEL SEDE*/
			->where('est_sede', '=', 1)
			->find_all()
			->as_array('id_sede', 'ubi_sede');
		
		$sedeall = ORM::factory('Sede')		/*MODEL SEDE all*/
			->where('est_sede', '=', 1)
			->find_all();
			
		$usTipoP = ORM::factory('Usuario')		/*MODEL USUARIOS ESTADO*/
			->where('estado_usuario', '=', 'activo')
			->find_all();
			
		$usTipoE = ORM::factory('Usuario')		/*MODEL USUARIOS ESTADO*/
			->where('estado_usuario', '=', 'activo')
			->find_all();
			
		$usTipoPanel = ORM::factory('Usuario')		/*MODEL USUARIOS ESTADO*/
			->where('estado_usuario', '=', 'activo')
			->find_all();
			
		$usTipoPanele = ORM::factory('Usuario')		/*MODEL USUARIOS ESTADO*/
			->where('estado_usuario', '=', 'activo')
			->find_all();
		
		$usTipoPerfil= ORM::factory('Usuario')		/*MODEL USUARIOS ESTADO*/
			->where('estado_usuario', '=', 'activo')
			->find_all();
		
		$usdelete= ORM::factory('Usuario')		/*MODEL USUARIOS ESTADO*/
			->where('estado_usuario', '=', 'activo')
			->find_all();
			
		$usTipoPerfildiv= ORM::factory('Usuario')		/*MODEL USUARIOS ESTADO*/
			->where('estado_usuario', '=', 'activo')
			->find_all();
		
		$usperTipo = ORM::factory('UsuarioPerfil')		/*MODEL USUARIOS EDIT RECOR*/
			->where('estado_usu_per', '=', 1)
			->find_all();
				
		$uTipo = ORM::factory('Usuario')		/*MODEL USUARIOS ALL*/
			->find_all();
			
		$usTipo = ORM::factory('Usuario')		/*MODEL USUARIOS */
			->where('estado_usuario','=','activo')
			->where('isDoctor','=', 0)
			->find_all();
	
			
		$mTipo = ORM::factory('Menu')		/*MODEL MENU*/
			->find_all()
			->as_array('id_menu', 'nom_menu');
			
		$submTipo = ORM::factory('SubMenus')		/*MODEL SUBMENU*/
			->find_all()
			->as_array('id_submenu', 'nom_submenu');
		
		
		
		if(isset($_POST['load_permisos'])){	
	
		$psmTipo1 = ORM::factory('PerfilSubmenu')
			->where('id_perfil_PER','=',$_POST['perfiles_permisos'])
			->where('id_menu_PER','=',1)
			->find_all();
		
		$psmTipo2 = ORM::factory('PerfilSubmenu')
			->where('id_usur_per_PER','=',$_POST['perfiles_permisos'])
			->where('id_menu_PER','=',2)
			->find_all();
		
		$psmTipo3 = ORM::factory('PerfilSubmenu')
			->where('id_usur_per_PER','=',$_POST['perfiles_permisos'])
			->where('id_menu_PER','=',3)
			->find_all();
			
		$psmTipo4 = ORM::factory('PerfilSubmenu')
			->where('id_usur_per_PER','=',$_POST['perfiles_permisos'])
			->where('id_menu_PER','=',4)
			->find_all();
		
		$psmTipo5 = ORM::factory('PerfilSubmenu')
			->where('id_usur_per_PER','=',$_POST['perfiles_permisos'])
			->where('id_menu_PER','=',5)
			->find_all();
		
		$psmTipo6 = ORM::factory('PerfilSubmenu')
			->where('id_usur_per_PER','=',$_POST['perfiles_permisos'])
			->where('id_menu_PER','=',6)
			->find_all();		
			
		}else{
			
			
		$psmTipo1 = ORM::factory('PerfilSubmenu')
			->where('id_perfil_PER','=',10)
			->where('id_menu_PER','=',1)
			->find_all();
		
		$psmTipo2 = ORM::factory('PerfilSubmenu')
			->where('id_usur_per_PER','=',1)
			->where('id_menu_PER','=',2)
			->find_all();
		
		$psmTipo3 = ORM::factory('PerfilSubmenu')
			->where('id_usur_per_PER','=',1)
			->where('id_menu_PER','=',3)
			->find_all();
			
		$psmTipo4 = ORM::factory('PerfilSubmenu')
			->where('id_usur_per_PER','=',1)
			->where('id_menu_PER','=',4)
			->find_all();
		
		$psmTipo5 = ORM::factory('PerfilSubmenu')
			->where('id_usur_per_PER','=',1)
			->where('id_menu_PER','=',5)
			->find_all();
		
		$psmTipo6 = ORM::factory('PerfilSubmenu')
			->where('id_usur_per_PER','=',1)
			->where('id_menu_PER','=',6)
			->find_all();			/*DATA PERMISOS ADMINISTRADOR MENUs*/
			
			}
		
	
		
		$view = View::factory('dashboard/usuario_permisos')
			->set(compact('usCod','estado_civil','usdelete','usTipoPerfildiv','usTipoPerfil','usTipoPanele','usTipoPanel','usTipoP','sedeall','usperTipo','sede','submTipo','psmTipo6','psmTipo5','psmTipo4','psmTipo3','psmTipo2','psmTipo1','usTipoE','uTipo','usTipo','pTipo','mTipo'));

		$this->template->content = $view;
		
	
	}		/* FUNCION USUARIO_PERMISOS*/
	
	public function action_catalogo()
	{
		if(isset($_POST['crear_catalogo'])){
			$this->create_catalogo();}
			
		if(isset($_POST['crear_subcatalogo'])){
			$this->create_subcatalogo();}
			
		if(isset($_POST['editar_subcatalogo'])){
			$this->editar_subcatalogo();}
		
		$EmpTab = ORM::factory('Empresa')		/*MODEL PERFIL*/
			->where('estado_empresa', '=', 'activo')
			->find_all();
		
		$empresa = ORM::factory('Empresa')
			->where('estado_Empresa','=',"activo")
			->find_all()
			->as_array('cod_empresa', 'nom_empresa');	
		
		$catalogo = ORM::factory('Catalogo')
			->where('estado_catalogo','=',"activo")
			->find_all()
			->as_array('cod_catalogo', 'nom_catalogo');	
		
		$subcatalogo = ORM::factory('SubCatalogo')
			->where('estado_Subcatalogo','=',"activo")
			->find_all()
			->as_array('cod_subcatalogo', 'nom_subcatalogo');
		
		$empCatalogo = ORM::factory('EmpresaCatalogo')
			->find_all()
			->as_array('id_subcatalogo_FK', 'inscribir');
			
		$recorrido = ORM::factory('SubCatalogo')
			->where('estado_Subcatalogo','=',"activo")
			->find_all()
			->as_array('cod_subcatalogo', 'cod_catalogo_FK');	
	
		
		$view = View::factory('dashboard/catalogo')
			->set(compact('empCatalogo','EmpTab','empresa','recorrido','subcatalogo','catalogo'));

		$this->template->content = $view;
		
		
	
	}		/* FUNCION CATALOGO*/
	
	public function action_pacientes()
	{
		if(isset($_POST['crear_paciente'])){
			$this->create_paciente();}

		if(isset($_POST['editar_paciente'])){
			$this->editar_paciente();}
		
		for ($i = 1; $i <= 1000; $i++) {
		if(isset($_POST['delP'.$i])){
			$this->delete_paciente();}
		}		/*REDIRECT DELETE PACIENTE*/
		
		$usTipoPaciente= ORM::factory('Paciente')
			->find_all();
			
		$usTipoPacienteDiv= ORM::factory('Paciente')
			->find_all();
			
		$usTipoPacienteBuscar= ORM::factory('Paciente')
			->find_all();
			
		$usTipoPacienteBuscarDiv= ORM::factory('Paciente')
			->find_all();
			
		$ListaPacientesExcel= ORM::factory('Paciente')
			->find_all();
		
		$paciente = ORM::factory('Paciente')
			->find_all();	
		
		$editpaciente = ORM::factory('Paciente')
			->find_all();	
			
		$ubigeodepPaciente = ORM::factory('Ubigeo')		/*MODEL SEDE*/
			->find_all()
			->as_array('cod_departamento', 'nom_departamento');
	
		$ubigeodisPaciente = ORM::factory('Ubigeo')		/*MODEL SEDE*/
			->find_all();
			
		$ubigeoproPaciente = ORM::factory('Ubigeo')		/*MODEL SEDE provincia*/
		->find_all();
	
		$view = View::factory('dashboard/pacientes')
			->set(compact('ListaPacientesExcel','usTipoPacienteBuscarDiv','usTipoPacienteBuscar','usTipoPacienteDiv','usTipoPaciente','ubigeoproPaciente','ubigeodisPaciente','ubigeodepPaciente','editpaciente','paciente'));

		$this->template->content = $view;
		
		
	
	}		/* FUNCION PACIENTES*/
	
	public function delete_paciente()
	{
		for ($i = 1; $i <= 100; $i++) {
				if(isset($_POST['delP'.$i]))
					$id = $_POST['delP'.$i];
			}
			
		if ($this->request->method() == 'POST')
		{
			extract($this->request->post());
			
			
			//$id = $_POST['del'.$i];
			$oPacienteDel = ORM::factory('Paciente',$id);
			$oPacienteDel->estado_paciente = 'inactivo';
			$oPacienteDel->save();
		}
	}		/* DELETE USUARIO Y DOCTORES*/
	
	public function editar_paciente()
	{
		
		$ide = $_POST["editar_paciente"];	
				
		if ($this->request->method() == 'POST')
		{
			extract($this->request->post());
			$oPaciente = ORM::factory('Paciente',$ide);
			$oPaciente->num_cod_paciente = $num_paciente;
			$oPaciente->dni_paciente = $dni_paciente;
			$oPaciente->apellidos_paciente = strtoupper($apellido_paciente);
			$oPaciente->nombres_paciente = strtoupper($nom_paciente);
			$oPaciente->sexo_paciente = $_POST["estado_sexo"];
			$oPaciente->lugar_nac_paciente = $lugar_nac_paciente;
			$oPaciente->fecha_nac_paciente = $fecha_nac_usuario;
			$oPaciente->edad_paciente = $edad_paciente;
			$oPaciente->direccion_paciente = strtoupper($direc_paciente);
			$oPaciente->departamento_paciente = $_POST["departamento"];	

			if(isset($_POST['provincia'])){
				$oPaciente->provincia_paciente = $_POST["provincia"];
					if(isset($_POST['distrito']))
					{$oPaciente->distrito_paciente = $_POST["distrito"];}
			}
			
		//	$oPaciente->provincia_paciente = $_POST["provincia"];
		//	$oPaciente->distrito_paciente = $_POST["distrito"];
			$oPaciente->telefono_paciente = $tel_paciente;
			$oPaciente->celular_paciente = $cel_paciente;
			$oPaciente->email_paciente = strtoupper($email_paciente);
			$oPaciente->instruccion_paciente = $_POST["select_instruccion"];
			$oPaciente->estado_civil_paciente = $_POST["estado_civil_usuario"];
			$oPaciente->religion_paciente = $_POST["select_religion"];
			$oPaciente->familiar_refe_paciente = $familiar_paciente;
			$oPaciente->telefono_refe_paciente = $tel_familiar;
			$oPaciente->urbanizacion_paciente = $urb_paciente;
			$oPaciente->area_paciente = $area_paciente;
			$oPaciente->puesto_paciente = $puesto_paciente;
			$oPaciente->num_hijos_paciente = $hijos_paciente;
			$oPaciente->num_dependientes_paciente = $dependientes_paciente;
			
	        if(empty($files)){
			}
			else{
			$oPaciente->foto_paciente = $files;	}
			$oPaciente->estado_paciente = $_POST["estado_paciente"];
			$oPaciente->fecha_mod_paciente = date('Y-m-d G:i:s');
			$oPaciente->nom_mod_paciente = $this->_oUser->nom_usuario;
			$oPaciente->save();
		}
	}		/* EDITAR PACIENTE*/
	
	public function create_paciente()
	{
					
		if ($this->request->method() == 'POST')
		{
			extract($this->request->post());
			$oPaciente = ORM::factory('Paciente');
			$oPaciente->cod_paciente = "";
			$oPaciente->num_cod_paciente = $num_paciente;
			$oPaciente->dni_paciente = $dni_paciente;
			$oPaciente->apellidos_paciente = strtoupper($apellido_paciente);
			$oPaciente->nombres_paciente = strtoupper($nom_paciente);
			$oPaciente->sexo_paciente = $_POST["estado_sexo"];
			$oPaciente->lugar_nac_paciente = $lugar_nac_paciente;
			$oPaciente->fecha_nac_paciente = $ano."-".$mes."-".$dia;
			$oPaciente->edad_paciente = $edad_paciente;
			$oPaciente->direccion_paciente = strtoupper($direc_paciente);
			$oPaciente->distrito_paciente = $_POST["distrito"];
			$oPaciente->provincia_paciente = $_POST["provincia"];
			$oPaciente->departamento_paciente = $_POST["departamento"];
			$oPaciente->telefono_paciente = $tel_paciente;
			$oPaciente->celular_paciente = $cel_paciente;
			$oPaciente->email_paciente = strtoupper($email_paciente);
			$oPaciente->instruccion_paciente = $_POST["select_instruccion"];
			$oPaciente->estado_civil_paciente = $_POST["estado_civil_usuario"];
			$oPaciente->religion_paciente = $_POST["select_religion"];
			$oPaciente->familiar_refe_paciente = $familiar_paciente;
			$oPaciente->telefono_refe_paciente = $tel_familiar;
			$oPaciente->urbanizacion_paciente = $urb_paciente;
			$oPaciente->area_paciente = $area_paciente;
			$oPaciente->puesto_paciente = $puesto_paciente;
			$oPaciente->num_hijos_paciente = $hijos_paciente;
			$oPaciente->num_dependientes_paciente = $dependientes_paciente;
			$oPaciente->foto_paciente = $files;
			$oPaciente->estado_paciente = $_POST["estado_paciente"];
			$oPaciente->fecha_crea_paciente = date('Y-m-d G:i:s');
			$oPaciente->fecha_mod_paciente = date('Y-m-d G:i:s');
			$oPaciente->nom_crea_paciente = $this->_oUser->nom_usuario;
			$oPaciente->nom_mod_paciente = $this->_oUser->nom_usuario;
			$oPaciente->save();
		}
	}		/* CREAR PACIENTE*/
	
	public function create_catalogo()
	{
					
		if ($this->request->method() == 'POST')
		{
			extract($this->request->post());
			$oCatalogo = ORM::factory('Catalogo');
			$oCatalogo->cod_catalogo = "";
			$oCatalogo->nom_catalogo = strtoupper($nom_catalogo);
			$oCatalogo->fecha_reg_catalogo = date('Y-m-d G:i:s');
			$oCatalogo->fecha_mod_catalogo = date('Y-m-d G:i:s');
			$oCatalogo->estado_catalogo = "activo";
			$oCatalogo->nom_crea_catalogo = $this->_oUser->nom_usuario;
			$oCatalogo->nom_mod_catalogo = $this->_oUser->nom_usuario;
			$oCatalogo->save();
		}
	}		/* CREAR CATALOGO*/
	
	public function editar_subcatalogo()
	{

		if ($this->request->method() == 'POST')
				{
				//	if($_POST['perfiles_permisos'] == 1){
		
				extract($this->request->post());
				
				$numEmpresa = $_POST["select_empresa"];
		
					$InsCatalogo = ORM::factory('EmpresaCatalogo')
					->where('id_empresa_FK','=', $numEmpresa)
					->find_all()
					->as_array('id_subcatalogo_FK', 'id_subcatalogo_FK');
			
	
					foreach ($InsCatalogo as $keyIns => $valEm) {
						
						$oPermisoSub = ORM::factory('EmpresaCatalogo',$keyIns);
				
							if(isset($checkview[$keyIns])){	
								$oPermisoSub->inscribir = 1;
							}
							else{
								$oPermisoSub->inscribir = 0;
								}
							
							$oPermisoSub->save();
						}		/*MENU 1*/
				
				}
	}		/* EDITAR CATALOGO*/
	
	public function create_subcatalogo()
	{
				
					
		if ($this->request->method() == 'POST')
		{
			extract($this->request->post());
			$oSubCatalogo = ORM::factory('SubCatalogo');
			$oSubCatalogo->cod_subcatalogo = "";
			$oSubCatalogo->nom_subcatalogo = strtoupper($nom_subcatalogo);
			$oSubCatalogo->fecha_reg_subcatalogo = date('Y-m-d G:i:s');
			$oSubCatalogo->fecha_mod_subcatalogo = date('Y-m-d G:i:s');
			$oSubCatalogo->estado_subcatalogo = "activo";
			$oSubCatalogo->nom_crea_subcatalogo = $this->_oUser->nom_usuario;
			$oSubCatalogo->nom_mod_subcatalogo	 = $this->_oUser->nom_usuario;
			$oSubCatalogo->cod_catalogo_FK = $_POST["select_catalogo"];
			$oSubCatalogo->val_subcatalogo = 0;
			
			if($_POST["select_empresa"]){
			$oSubCatalogo->id_empresa_FK = $_POST["select_empresa"];}
			else{
				$oSubCatalogo->id_empresa_FK = 1;}
			$oSubCatalogo->save();
		}
	}		/* CREAR SUBCATALOGO*/
	
	public function create_denominacion()
	{
		
		if ($this->request->method() == 'POST')
		{
			extract($this->request->post());
			$oTipoDenominacion = ORM::factory('TipoDenominacion');
			$oTipoDenominacion->cod_denominacion = "";
			$oTipoDenominacion->nom_denominacion = strtoupper($nom_deno);
			$oTipoDenominacion->pasaje_denominacion = strtoupper($pasaje_deno);
			$oTipoDenominacion->alimento_denominacion = strtoupper($alimento_deno);
			$oTipoDenominacion->sueldo_denominacion = strtoupper($sueldo_deno);
			$oTipoDenominacion->fecha_mod_denominacion = date('Y-m-d G:i:s');
			$oTipoDenominacion->fecha_reg_denominacion = date('Y-m-d G:i:s');
			$oTipoDenominacion->estado_denominacion = "activo";
			$oTipoDenominacion->nom_crea_denominacion = $this->_oUser->nom_usuario;
			$oTipoDenominacion->nom_mod_denominacion = $this->_oUser->nom_usuario;
			$oTipoDenominacion->save();
		
		
			}
	}		/* CREAR TIPO DE DENOMINACION*/
	
	public function editar_denominacion()
	{
			$ide = $_POST["editar_denominacion"];
				
				if ($this->request->method() == 'POST')
				{
					extract($this->request->post());
					$oTipoDenominacion = ORM::factory('TipoDenominacion',$ide);
					$oTipoDenominacion->nom_denominacion = strtoupper($nom_deno);
					$oTipoDenominacion->pasaje_denominacion = strtoupper($pasaje_deno);
					$oTipoDenominacion->alimento_denominacion = strtoupper($alimento_deno);
					$oTipoDenominacion->sueldo_denominacion = strtoupper($sueldo_deno);
					$oTipoDenominacion->fecha_mod_denominacion = date('Y-m-d G:i:s');
					$oTipoDenominacion->estado_denominacion = "activo";
					$oTipoDenominacion->nom_mod_denominacion = $this->_oUser->nom_usuario;
					$oTipoDenominacion->save();
				
				}
	}		/* EDITAR TIPO DE DENOMINACION*/
	
	public function delete_denominacion()
	{
		
		if ($this->request->method() == 'POST')
		{
			extract($this->request->post());
			
			for ($i = 1; $i <= 1000; $i++) {
				if(isset($_POST['delDeno'.$i]))
					$id = $_POST['delDeno'.$i];
			}
			//$id = $_POST['del'.$i];
			$oTipoDenominacion = ORM::factory('TipoDenominacion',$id);
			$oTipoDenominacion->estado_denominacion = "inactivo";
			$oTipoDenominacion->save();

			
		}
	}		/* DELETE TIPO DE DENOMINACION*/
	
	public function create_examenes()
	{
		
		if ($this->request->method() == 'POST')
		{
			extract($this->request->post());
			$oExamenesO = ORM::factory('ExamenOcupacional');
			$oExamenesO->cod_examen = "";
			$oExamenesO->nom_examen = strtoupper($nom_examen);
			$oExamenesO->fecha_mod_examen = date('Y-m-d G:i:s');
			$oExamenesO->fecha_reg_examen = date('Y-m-d G:i:s');
			$oExamenesO->estado_examen = "activo";
			$oExamenesO->nom_crea_examen = $this->_oUser->nom_usuario;
			$oExamenesO->nom_mod_examen = $this->_oUser->nom_usuario;
			$oExamenesO->save();
		
		
			}
	}		/* CREAR EXAMENES OCUPACIONALES*/
	
	public function editar_examenes()
	{
			$ide = $_POST["editar_examen"];
				
				if ($this->request->method() == 'POST')
				{
					extract($this->request->post());
					$oExamenes = ORM::factory('ExamenOcupacional',$ide);
					$oExamenes->nom_examen= strtoupper($nom_editar_examen);
					$oExamenes->fecha_mod_examen = date('Y-m-d G:i:s');
					$oExamenes->estado_examen = "activo";
					$oExamenes->nom_mod_examen = $this->_oUser->nom_usuario;
					$oExamenes->save();
				
				}
	}		/* EDITAR EXAMENES OCUPACIONALES*/
	
	public function delete_examenes()
	{
		
		if ($this->request->method() == 'POST')
		{
			extract($this->request->post());
			
			for ($i = 1; $i <= 1000; $i++) {
				if(isset($_POST['delExa'.$i]))
					$id = $_POST['delExa'.$i];
			}
			//$id = $_POST['del'.$i];
			$oPerfil = ORM::factory('ExamenOcupacional',$id);
			$oPerfil->estado_examen = "inactivo";
			$oPerfil->save();

			
		}
	}		/* DELETE EXAMENES OCUPACIONALES*/

	public function create_empresa()
	{
				
		if ($this->request->method() == 'POST')
		{
			extract($this->request->post());
			$oEmpresa = ORM::factory('Empresa');
			$oEmpresa->cod_empresa = "";
			$oEmpresa->nom_empresa = strtoupper($nom_emp);
			$oEmpresa->razon_social_empresa = strtoupper($razon_social);
			$oEmpresa->actividad_economica_empresa = strtoupper($act_economica);
			$oEmpresa->departamento_empresa = $_POST["departamento"];
			$oEmpresa->provincia_empresa = $_POST["provincia"];
			$oEmpresa->distrito_empresa = $_POST["distrito"];
			$oEmpresa->direccion_empresa = strtoupper($direc_empresa);
			$oEmpresa->telefono_empresa = strtoupper($telf_empresa);
			$oEmpresa->telefono2_empresa = strtoupper($telf_empresa2);
			$oEmpresa->contacto_empresa = strtoupper($contacto_empresa);
			$oEmpresa->fecha_crea_empresa = date('Y-m-d G:i:s');
			$oEmpresa->fecha_mod_empresa = date('Y-m-d G:i:s');
			$oEmpresa->nom_crea_empresa = $this->_oUser->nom_usuario;
			$oEmpresa->nom_mod_empresa = $this->_oUser->nom_usuario;
			$oEmpresa->estado_empresa = "activo";
			
			$oEmpresa->save();
			
		for($i=1;$i<=$_POST["contsub"];$i++){
			$oEmpresaCatalogo = ORM::factory('EmpresaCatalogo');
			$oEmpresaCatalogo->id_empresa_catalogo = "";
			$oEmpresaCatalogo->id_subcatalogo_FK = $i;
			$oEmpresaCatalogo->id_empresa_FK = $_POST["crear_empresa"];
			$oEmpresaCatalogo->inscribir = 0;
			$oEmpresaCatalogo->save();
		}
		
			}
	}		/* CREAR EMPRESAS */
	

	
	
	
	public function editar_empresa()
	{
		
		
		
			$ide = $_POST["editar_empresa"];
				
				if ($this->request->method() == 'POST')
				{
					extract($this->request->post());
					$oEmpresa = ORM::factory('Empresa',$ide);
					$oEmpresa->nom_empresa = strtoupper($nom_emp);
					$oEmpresa->razon_social_empresa = strtoupper($razon_social);
					$oEmpresa->actividad_economica_empresa = strtoupper($act_economica);
					$oEmpresa->departamento_empresa = $_POST["departamento"];
					
					
							
					if(isset($_POST['provincia'])){
						$oEmpresa->provincia_empresa = $_POST["provincia"];
							if(isset($_POST['distrito']))
							{$oEmpresa->distrito_empresa = $_POST["distrito"];}
					}
					
					$oEmpresa->direccion_empresa = strtoupper($direc_empresa);
					$oEmpresa->telefono_empresa = strtoupper($telf_empresa);
					$oEmpresa->telefono2_empresa = strtoupper($telf_empresa2);
					$oEmpresa->contacto_empresa = strtoupper($contacto_empresa);
					$oEmpresa->fecha_mod_empresa = date('Y-m-d G:i:s');
					$oEmpresa->nom_mod_empresa = $this->_oUser->nom_usuario;
					$oEmpresa->estado_empresa = "activo";
					$oEmpresa->save();
				
				}
	}		/* EDITAR EMPRESAS */
	
	public function delete_empresa()
	{
		
		if ($this->request->method() == 'POST')
		{
			extract($this->request->post());
			
			for ($i = 1; $i <= 100; $i++) {
				if(isset($_POST['deleteE'.$i]))
					$id = $_POST['deleteE'.$i];
			}
			//$id = $_POST['del'.$i];
			$oEmpresa = ORM::factory('Empresa',$id);
			$oEmpresa->estado_empresa = "inactivo";
			$oEmpresa->save();

			
		}
	}		/* DELETE EMPRESA*/
	
	public function create_especialidades()
	{
		
		if ($this->request->method() == 'POST')
		{
			extract($this->request->post());
			$oEspecialidades = ORM::factory('Especialidad');
			$oEspecialidades->id_especialidad = "";
			$oEspecialidades->nom_especialidad = strtoupper($nom_especialidad);
			$oEspecialidades->fecha_mod_especialidad = date('Y-m-d G:i:s');
			$oEspecialidades->fecha_reg_especialidad = date('Y-m-d G:i:s');
			$oEspecialidades->estado_especialidad = 1;
			$oEspecialidades->nom_crea_especialidad = $this->_oUser->nom_usuario;
			$oEspecialidades->nom_mod_especialidad = $this->_oUser->nom_usuario;
			$oEspecialidades->save();
		
		
			}
	}		/* CREAR ESPECIALIDADES*/
	
	public function editar_especialidad()
	{
			$ide = $_POST["editar_especialidad"];
				
				if ($this->request->method() == 'POST')
				{
					extract($this->request->post());
					$oPerfil = ORM::factory('Especialidad',$ide);
					$oPerfil->nom_especialidad= strtoupper($nom_editar_especialidad);
					$oPerfil->fecha_mod_especialidad = date('Y-m-d G:i:s');
					$oPerfil->estado_especialidad = 1;
					$oPerfil->nom_mod_especialidad = $this->_oUser->nom_usuario;
					$oPerfil->save();
				
				}
	}		/* EDITAR ESPECIALIDAD*/
	
	public function delete_especialidades()
	{
		
		if ($this->request->method() == 'POST')
		{
			extract($this->request->post());
			
			for ($i = 1; $i <= 100; $i++) {
				if(isset($_POST['delE'.$i]))
					$id = $_POST['delE'.$i];
			}
			//$id = $_POST['del'.$i];
			$oPerfil = ORM::factory('Especialidad',$id);
			$oPerfil->estado_especialidad = 0;
			$oPerfil->save();

			
		}
	}		/* DELETE ESPECIALIDADES*/
	
	public function create_perfil()
	{
		$oUser = ORM::factory('Usuario')
			->find_all()
			->as_array('id_usuario','nom_usuario');
		
		
				
		if ($this->request->method() == 'POST')
		{
			extract($this->request->post());
			$oPerfil = ORM::factory('Perfil');
			$oPerfil->id_perfil = "";
			$oPerfil->nom_perfil = strtoupper($nom_perfil);
			$oPerfil->fecha_mod_perfil = date('Y-m-d G:i:s');
			$oPerfil->fecha_crea_perfil = date('Y-m-d G:i:s');
			$oPerfil->estado_perfil = 1;
			$oPerfil->id_crea_usuario = $this->_oUser->pk();
			$oPerfil->nom_crea_perfil = $this->_oUser->nom_usuario;
			$oPerfil->save();
		
		for($i=1;$i<=9;$i++){
			
			$oPerfilSub = ORM::factory('PerfilSubmenu');
			$oPerfilSub->id_PerfilMenu = "";
			$oPerfilSub->visualizar = 0;
			$oPerfilSub->agregar = 0;
			$oPerfilSub->editar = 0;
			$oPerfilSub->eliminar = 0;
			$oPerfilSub->id_submenu_PER = $i;
			$oPerfilSub->id_menu_PER = 1;
			$oPerfilSub->id_usur_per_PER = $this->_oUser->pk(); 
			$oPerfilSub->id_perfil_PER = $_POST['crear_perfil'];
			$oPerfilSub->save();
		}
		}
	}		/* CREAR PERFIL*/
	
	public function editar_perfil()
	{
			$ide = $_POST["editarPerfil"];
				
				if ($this->request->method() == 'POST')
				{
					extract($this->request->post());
					$oPerfil = ORM::factory('Perfil',$ide);
					$oPerfil->nom_perfil = strtoupper($nom_editar);
					$oPerfil->fecha_mod_perfil = date('Y-m-d G:i:s');
					$oPerfil->estado_perfil = 1;
					$oPerfil->id_crea_usuario = $this->_oUser->pk();
					$oPerfil->nom_crea_perfil = $this->_oUser->nom_usuario;
					$oPerfil->save();
				
				}
	}		/* EDITAR PERFIL*/
	
	public function delete_perfil()
	{
		
		if ($this->request->method() == 'POST')
		{
			extract($this->request->post());
			
			for ($i = 1; $i <= 100; $i++) {
				if(isset($_POST['del'.$i]))
					$id = $_POST['del'.$i];
			}
			//$id = $_POST['del'.$i];
			$oPerfil = ORM::factory('Perfil',$id);
			$oPerfil->estado_perfil = 0;
			$oPerfil->save();

			
		}
	}		/* DELETE PERFIL*/
	
	public function CreateSede()
	{
		
		$cod_depa = $_POST["departamento"];
		$cod_prov = $_POST["provincia"];
		$cod_dist = $_POST["distrito"];
		

		if ($this->request->method() == 'POST')
		{
			extract($this->request->post());
			$oSede = ORM::factory('Sede');
			$oSede->id_sede = "";
			$oSede->ubi_sede = $ubi_sede;
			$oSede->dir_sede = $dir_sede;
			$oSede->cod_ubigeo_FK= $cod_depa.$cod_prov.$cod_dist;
			$oSede->tel_sede = $telf_sede;
			$oSede->est_sede = 1;
			$oSede->fec_crea_sede = date('Y-m-d G:i:s');
			$oSede->fec_mod_sede = date('Y-m-d G:i:s');
			$oSede->usu_crea_sede = $this->_oUser->pk();
			$oSede->nom_crea_sede = $this->_oUser->nom_usuario;
			$oSede->usu_mod_sede = $this->_oUser->pk();
			$oSede->nom_mod_sede = $this->_oUser->nom_usuario;
			$oSede->save();
		}
	
	}		/* CREAR SEDE*/
	
	public function create_usuario()
	{
	
				
		if ($this->request->method() == 'POST')
		{
			extract($this->request->post());
			$oUsuario = ORM::factory('Usuario');
			$oUsuario->id_usuario = "";
			$oUsuario->nom_usuario = $nom_usuario;
			$oUsuario->apellido_usuario = $apellido_usuario;
			$oUsuario->pass_usuario = $pass_usuario;
			$oUsuario->direc_usuario = $direc_usuario;
			$oUsuario->telf_usuario = $telf_usuario;
			$oUsuario->fecha_nac_usuario = $ano."-".$mes."-".$dia;
			$oUsuario->dni_usuario = $dni_usuario;
			$oUsuario->nick_usuario = $nick_usuario;
			$oUsuario->estado_civil_usuario = $_POST['estado_civil_usuario'];
			$oUsuario->email_usuario = $email_usuario;
			$oUsuario->fecha_mod_usuario = date('Y-m-d G:i:s');
			$oUsuario->fecha_crea_usuario = date('Y-m-d G:i:s');
			$oUsuario->id_sede_PK = $_POST['sede_usuario'];
			$oUsuario->estado_usuario = "activo";
			$oUsuario->id_mod_usuario = $this->_oUser->pk(); 
			$oUsuario->nom_mod_usuario = $this->_oUser->nom_usuario;
			$oUsuario->isDoctor = 0;
			$oUsuario->cod_usuario = "U".str_pad($_POST['cod_usu'], 5, "0", STR_PAD_LEFT);
			$oUsuario->save();
			
			$oUsuarioPerfil = ORM::factory('UsuarioPerfil');
			$oUsuarioPerfil->id_usu_per = "";
			$oUsuarioPerfil->id_usuario_FK = $crear_usuario;
			$oUsuarioPerfil->id_perfiles_FK = $_POST['perfiles'];
			$oUsuarioPerfil->estado_usu_per = 1;
			$oUsuarioPerfil->save();
	
		}
	}		/* CREAR USUARIO Y PERFIL*/
	
	public function editar_usuario()
	{
			$ide = $_POST["editar_usuario"];
			$idus = $_POST["idUsuPerf"];
				if ($this->request->method() == 'POST')
				{
					extract($this->request->post());
					$oUsuario = ORM::factory('Usuario',$ide);
					$oUsuario->nom_usuario = $nom_usuario;
					$oUsuario->apellido_usuario = $apellido_usuario;
					$oUsuario->pass_usuario = $pass_usuario;
					$oUsuario->direc_usuario = $direc_usuario;
					$oUsuario->telf_usuario = $telf_usuario;
					$oUsuario->fecha_nac_usuario = $fecha_nac_usuario;
					$oUsuario->estado_civil_usuario = $_POST['estado_civil_usuario'];
					$oUsuario->dni_usuario = $dni_usuario;
					$oUsuario->nick_usuario = $nick_usuario;
					$oUsuario->email_usuario = $email_usuario;
					$oUsuario->fecha_mod_usuario = date('Y-m-d G:i:s');
					$oUsuario->id_sede_PK = $_POST['sede_usuario'];
					$oUsuario->estado_usuario = "activo";
					$oUsuario->id_mod_usuario = $this->_oUser->pk();
					$oUsuario->nom_mod_usuario = $this->_oUser->nom_usuario;
					$oUsuario->save();
					
					$oUsuarioPerfil = ORM::factory('UsuarioPerfil',$idus);
					$oUsuarioPerfil->id_usuario_FK = $ide;
					$oUsuarioPerfil->id_perfiles_FK = $_POST['perfil_editUsu'];
					$oUsuarioPerfil->estado_usu_per = 1;
					$oUsuarioPerfil->save();
					
		
				}
	}		/* EDITAR USUARIO Y PERFIL*/
	
	public function delete_usuario()
	{
		for ($i = 1; $i <= 100; $i++) {
				if(isset($_POST['deleteU'.$i]))
					$id = $_POST['deleteU'.$i];
			}
			
		if ($this->request->method() == 'POST')
		{
			extract($this->request->post());
			
			
			//$id = $_POST['del'.$i];
			$oPerfil = ORM::factory('Usuario',$id);
			$oPerfil->estado_usuario = 'inactivo';
			$oPerfil->save();
		}
	}		/* DELETE USUARIO Y DOCTORES*/
	
	public function create_doctor()
	{
	
				
		if ($this->request->method() == 'POST')
		{
			extract($this->request->post());
			$oUsuario = ORM::factory('Usuario');
			$oUsuario->id_usuario = "";
			$oUsuario->nom_usuario = $nom_usuario;
			$oUsuario->apellido_usuario = $apellido_usuario;
			$oUsuario->pass_usuario = $pass_usuario;
			$oUsuario->direc_usuario = $direc_usuario;
			$oUsuario->telf_usuario = $telf_usuario;
			$oUsuario->fecha_nac_usuario = $fecha_nac_usuario;
			$oUsuario->dni_usuario = $dni_usuario;
			$oUsuario->nick_usuario = $nick_usuario;
			$oUsuario->estado_civil_usuario = $_POST['estado_civil_usuario'];
			$oUsuario->email_usuario = $email_usuario;
			$oUsuario->fecha_mod_usuario = date('Y-m-d G:i:s');
			$oUsuario->fecha_crea_usuario = date('Y-m-d G:i:s');
			$oUsuario->id_sede_PK = $_POST['sede_usuario'];
			$oUsuario->estado_usuario = "activo";
			$oUsuario->id_mod_usuario = $this->_oUser->pk(); 
			$oUsuario->nom_mod_usuario = $this->_oUser->nom_usuario;
			$oUsuario->universidad_usuario = $universidad_usuario;
			$oUsuario->email_emp_usuario = $email_emp;
			$oUsuario->isDoctor = 1;
			$oUsuario->cod_cmp = $codigo_cmp;
			$oUsuario->id_especialidad_doctor = $_POST['especialidad_usuario'];
			$oUsuario->observacion_usuario = $observacion_usuario;
			$oUsuario->cod_usuario = "D".str_pad($_POST['cod_doc'], 5, "0", STR_PAD_LEFT);
			$oUsuario->save();
			
			$oUsuarioPerfil = ORM::factory('UsuarioPerfil');
			$oUsuarioPerfil->id_usu_per = "";
			$oUsuarioPerfil->id_usuario_FK = $crear_usuario;
			$oUsuarioPerfil->id_perfiles_FK = $_POST['perfiles'];
			$oUsuarioPerfil->estado_usu_per = 1;
			$oUsuarioPerfil->save();
	
		}
	}		/* CREAR DOCTOR Y PERFIL*/
	
	public function editar_doctor()
	{
			$ide = $_POST["editar_usuario"];
			$idus = $_POST["idUsuPerf"];
				if ($this->request->method() == 'POST')
				{
					extract($this->request->post());
					$oUsuario = ORM::factory('Usuario',$ide);
					$oUsuario->nom_usuario = $nom_usuario;
					$oUsuario->apellido_usuario = $apellido_usuario;
					$oUsuario->pass_usuario = $pass_usuario;
					$oUsuario->direc_usuario = $direc_usuario;
					$oUsuario->telf_usuario = $telf_usuario;
					$oUsuario->fecha_nac_usuario = $fecha_nac_usuario;
					$oUsuario->estado_civil_usuario = $_POST['estado_civil_usuario'];
					$oUsuario->dni_usuario = $dni_usuario;
					$oUsuario->nick_usuario = $nick_usuario;
					$oUsuario->email_usuario = $email_usuario;
					$oUsuario->fecha_mod_usuario = date('Y-m-d G:i:s');
					$oUsuario->id_sede_PK = $_POST['sede_usuario'];
					$oUsuario->estado_usuario = "activo";
					$oUsuario->universidad_usuario = $universidad_usuario;
					$oUsuario->cod_cmp = $codigo_cmp;
					$oUsuario->id_especialidad_doctor = $_POST['especialidad_usuario'];
					$oUsuario->observacion_usuario = $observacion_usuario;
					$oUsuario->email_emp_usuario = $email_emp;
					$oUsuario->id_mod_usuario = $this->_oUser->pk();
					$oUsuario->nom_mod_usuario = $this->_oUser->nom_usuario;
					$oUsuario->save();
					
					$oUsuarioPerfil = ORM::factory('UsuarioPerfil',$idus);
					$oUsuarioPerfil->id_usuario_FK = $ide;
					$oUsuarioPerfil->id_perfiles_FK = $_POST['perfil_editUsu'];
					$oUsuarioPerfil->estado_usu_per = 1;
					$oUsuarioPerfil->save();
					
		
				}
	}		/* EDITAR DOCTOR Y PERFIL*/
	
	public function editar_permisos()
	{
			if ($this->request->method() == 'POST')
				{
				//	if($_POST['perfiles_permisos'] == 1){
		
				
					for ($i = 1; $i <= $_POST["valm1"]; $i++) {
						extract($this->request->post());
						$oPermiso = ORM::factory('PerfilSubmenu',$i);
							if(isset($checkview1[$i])){	
								$oPermiso->visualizar = 1;
							}
							else{
								$oPermiso->visualizar = 0;
								}
								
							if(isset($checkadd1[$i])){	
								$oPermiso->agregar = 1;
							}
							else{
								$oPermiso->agregar = 0;
								}	
								
							if(isset($checkedit1[$i])){	
								$oPermiso->editar = 1;
							}
							else{
								$oPermiso->editar = 0;
								}	
							if(isset($checkdel1[$i])){	
								$oPermiso->eliminar = 1;
							}
							else{
								$oPermiso->eliminar = 0;
								}
							$oPermiso->save();
						}		/*MENU 1*/
					//	
//					for ($j = $i; $j <= $_POST["valm2"]; $j++) {
//						extract($this->request->post());
//						$oPermiso = ORM::factory('PerfilSubmenu',$j);
//							if(isset($checkview2[$j])){	
//								$oPermiso->visualizar = 1;
//							}
//							else{
//								$oPermiso->visualizar = 0;
//								}
//								
//							if(isset($checkadd2[$j])){	
//								$oPermiso->agregar = 1;
//							}
//							else{
//								$oPermiso->agregar = 0;
//								}	
//								
//							if(isset($checkedit2[$j])){	
//								$oPermiso->editar = 1;
//							}
//							else{
//								$oPermiso->editar = 0;
//								}	
//							if(isset($checkdel2[$j])){	
//								$oPermiso->eliminar = 1;
//							}
//							else{
//								$oPermiso->eliminar = 0;
//								}
//							$oPermiso->save();
//						}		/*MENU 2*/
//						
//					for ($k = $j; $k <= $_POST["valm3"]; $k++) {
//						extract($this->request->post());
//						$oPermiso = ORM::factory('PerfilSubmenu',$k);
//							if(isset($checkview3[$k])){	
//								$oPermiso->visualizar = 1;
//							}
//							else{
//								$oPermiso->visualizar = 0;
//								}
//								
//							if(isset($checkadd3[$k])){	
//								$oPermiso->agregar = 1;
//							}
//							else{
//								$oPermiso->agregar = 0;
//								}	
//								
//							if(isset($checkedit3[$k])){	
//								$oPermiso->editar = 1;
//							}
//							else{
//								$oPermiso->editar = 0;
//								}	
//							if(isset($checkdel3[$k])){	
//								$oPermiso->eliminar = 1;
//							}
//							else{
//								$oPermiso->eliminar = 0;
//								}
//							$oPermiso->save();
//						}		/*MENU 3*/
	
				//	}
					
				//	if($_POST['perfiles_permisos'] == 2){
//		
//						$id1= 19;
//					for ($i = 1; $i <= $_POST["valm1"]; $i++) {
//						extract($this->request->post());
//						$oPermiso = ORM::factory('PerfilesSubmenu',$id1);
//							if(isset($checkview1[$i])){	
//								$oPermiso->visualizar = 1;
//							}
//							else{
//								$oPermiso->visualizar = 0;
//								}
//								
//							if(isset($checkadd1[$i])){	
//								$oPermiso->agregar = 1;
//							}
//							else{
//								$oPermiso->agregar = 0;
//								}	
//								
//							if(isset($checkedit1[$i])){	
//								$oPermiso->editar = 1;
//							}
//							else{
//								$oPermiso->editar = 0;
//								}	
//							if(isset($checkdel1[$i])){	
//								$oPermiso->eliminar = 1;
//							}
//							else{
//								$oPermiso->eliminar = 0;
//								}
//							$oPermiso->save();
//							$id++;
//						}		/*MENU 1*/
//						$id2= 28;
//					for ($j = $i; $j <= $_POST["valm2"]; $j++) {
//						extract($this->request->post());
//						$oPermiso = ORM::factory('PerfilesSubmenu',$id2);
//							if(isset($checkview2[$j])){	
//								$oPermiso->visualizar = 1;
//							}
//							else{
//								$oPermiso->visualizar = 0;
//								}
//								
//							if(isset($checkadd2[$j])){	
//								$oPermiso->agregar = 1;
//							}
//							else{
//								$oPermiso->agregar = 0;
//								}	
//								
//							if(isset($checkedit2[$j])){	
//								$oPermiso->editar = 1;
//							}
//							else{
//								$oPermiso->editar = 0;
//								}	
//							if(isset($checkdel2[$j])){	
//								$oPermiso->eliminar = 1;
//							}
//							else{
//								$oPermiso->eliminar = 0;
//								}
//							$oPermiso->save();
//							$id2++;
//						}		/*MENU 2*/
//						$id3= 29;
//					for ($k = $j; $k <= $_POST["valm3"]; $k++) {
//						extract($this->request->post());
//						$oPermiso = ORM::factory('PerfilesSubmenu',$id3);
//							if(isset($checkview3[$k])){	
//								$oPermiso->visualizar = 1;
//							}
//							else{
//								$oPermiso->visualizar = 0;
//								}
//								
//							if(isset($checkadd3[$k])){	
//								$oPermiso->agregar = 1;
//							}
//							else{
//								$oPermiso->agregar = 0;
//								}	
//								
//							if(isset($checkedit3[$k])){	
//								$oPermiso->editar = 1;
//							}
//							else{
//								$oPermiso->editar = 0;
//								}	
//							if(isset($checkdel3[$k])){	
//								$oPermiso->eliminar = 1;
//							}
//							else{
//								$oPermiso->eliminar = 0;
//								}
//							$oPermiso->save();
//							$id3++;
//						}		/*MENU 3*/
//	
//					}
			
				}
	}		/* EDITAR PERMISOS*/
	
	
	

	
	public function action_loadDepa()
	{
		
		$ubigeo = ORM::factory('Ubigeo')		/*MODEL SEDE*/
			->find_all()
			->as_array('cod_departamento', 'nom_departamento');
			
		foreach($ubigeo as $keyubidepa => $valubidepa ) {

			echo "<option value=\"$keyubidepa\">$valubidepa</option>";
		}
	}		/* LOAD DEPARTAMENTO*/

	public function action_loadProv()
	{
		sleep(1);
		
		$codDepa = $_GET["codeDepa"];
		
		$ubigeo = ORM::factory('Ubigeo')		/*MODEL SEDE*/
			->where('cod_departamento','=',$codDepa)
			->find_all()
			->as_array('cod_provincia', 'nom_provincia');
			

			
		foreach($ubigeo as $keyubiprov => $valubiprov ) {

			echo "<option value=\"$keyubiprov\">$valubiprov</option>";
		}
	
	}		/* LOAD PROVINCIA*/
	
	public function action_loadDist()
	{
		sleep(1);
		
		$cod_prov = $_GET["codeProv"];
		$cod_depa = $_GET["codeDepa"];
		
		$ubigeo = ORM::factory('Ubigeo')		/*MODEL SEDE*/
			->where('cod_departamento','=',$cod_depa)
			->where('cod_provincia','=',$cod_prov)
			->find_all()
			->as_array('cod_distrito', 'nom_distrito');
			

			
		foreach($ubigeo as $keyubidist => $valubidist ) {

			echo "<option value=\"$keyubidist\">$valubidist</option>";
		}
	}		/* LOAD DISTRITO*/
	
	
	
	public function action_start()
	{
			$this->redirect('dashboard/panel_bienvenida');
		
	}
	
}