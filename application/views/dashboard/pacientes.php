<meta charset="utf-8">
    <h3 class="heading" align="center">
      <?= __('PACIENTES') ?>
	   </h3>
	
  <hr>
	
	
  
<br>
<div id="tabs">
  <!-- Nav tabs -->
  <ul id="nav_tab" class="nav nav-tabs" role="tablist">  <!--style="margin: 0 0 0 38%;" MEDIO-->
    
    
    
   
    
    <li><a href="#PACIENTES" role="tab" data-toggle="tab">PACIENTES</a></li>
    
     <?php  if(isset($_POST['editar_paciente'])): ?> 
  		 <li class="active"><a href="#BUSCAR" role="tab" data-toggle="tab">BUSCAR</a></li>
    <?php else: ?>
  		 <li><a href="#BUSCAR" role="tab" data-toggle="tab">BUSCAR</a></li>
    <?php endif ?>
   
  </ul>
  
  <!-- Tab panes -->
  <div  class="tab-content">
		<?php  $contp = 0 ?>
    <?php  foreach ($usTipoPaciente as $usTipoPaciente): ?>
    <?php  $contp = $contp+1  ?>
			  <?php  if(isset($_POST['editP'.$usTipoPaciente->cod_paciente])): ?>
				  <?php if( $usTipoPaciente->cod_paciente == $_POST['editP'.$usTipoPaciente->cod_paciente]): ?>
                      <div class="tab-pane" id="PACIENTES">
                        <?php  reset($usTipoPaciente); ?>
   		 	      <?php endif ?> 
              <?php  elseif(isset($_POST['delP'.$contp])): ?>
             		 <div class="tab-pane" id="PACIENTES">   
                     <?php  reset($usTipoPaciente); ?>
   			  <?php endif ?>  
   	<?php endforeach ?> 
    
    <?php  if(isset($_POST['editar_paciente']) || isset($_POST['crear_paciente'])): ?>
    	<div class="tab-pane" id="PACIENTES">
    <?php else: ?>
    	<div class="tab-pane active" id="PACIENTES">
    <?php endif ?>
  
 
          <form class="form-sign signup" role="form" method="post">
            
                <div class="panel panel-primary">
                <div class="panel-heading">
                  <div align="center">NUEVO PACIENTE</div>
                  </div>
                
                <div class="panel-body">
                    <table >
                  <thead>
                    <tr>
                      <th width="500" >DATOS PERSONALES</th>
                      <th width="500">DATOS SECUNDARIOS</th>
                      <th width="500">FOTO</th>
                
                    </thead>
                  
                  <tbody>
                 
                    <tr  align="left">
                      <td>
                       <div class="form-horizontal">
                            <div class="control-group row-fluid form-inline" >
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">N.C.: </span>    </label>
                                <input align="right" name="num_paciente" type="text" id="input_numpac" placeholder="N.C." class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Numero" required>
                              </div>
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">DNI: </span>    </label>
                                <input align="right" name="dni_paciente" type="text" id="input_dni" placeholder="DNI" class="inputrange"  title="Requiere Contraseña" required>
                             </div>
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">NOMBRES: </span>    </label>
                                <input align="right" name="nom_paciente" type="text" id="input_nom_paciente" placeholder="NOMBRES" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Nombre" required>
                              </div>
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">APELLIDOS: </span>    </label>
                              <input align="right" name="apellido_paciente" type="text" id="input_apellido_paciente" placeholder="APELLIDOS" class="inputrange" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Apellidos" required>
                              </div>
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">LUGAR NAC.: </span>    </label>
                              <input align="middle" name="lugar_nac_paciente" type="text" id="input_date" placeholder="LUGAR NACIMIENTO" class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Fecha" required>
                              </div>
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">DIRECCIÓN: </span>    </label>
                                <input align="right" name="direc_paciente" type="text" id="descripcion" placeholder="DIRECCIÓN" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Direccion" required>
                              </div>
                              
                                <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">FECHA NAC.: </span>    </label>
								<select name="ano" class="form-control control-sign placeholder">
                      		
							<?php
                            for($i=date('o'); $i>=1910; $i--){
                                if ($i == date('o'))
                                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                else
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                            }
									?>
							</select>
							<select name="mes" class="form-control control-sign placeholder">
									<?php
									for ($i=1; $i<=12; $i++) {
										if ($i == date('m'))
											echo '<option value="'.$i.'" selected>'.$i.'</option>';
										else
											echo '<option value="'.$i.'">'.$i.'</option>';
									}
									?>
							</select>
							<select name="dia" class="form-control control-sign placeholder">
								<?php
								for ($i=1; $i<=31; $i++) {
									if ($i == date('j'))
										echo '<option value="'.$i.'" selected>'.$i.'</option>';
									else
										echo '<option value="'.$i.'">'.$i.'</option>';
								}
								?>
							</select>
                                
                              </div>
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">EDAD: </span>    </label>
                              <input align="middle" name="edad_paciente" type="number" min="0" max="150" id="input_date" placeholder="EDAD" class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Edad" >
                              </div>
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">SEXO: </span>    </label>
                                <select style="width:167px" id="select_sexo" name="estado_sexo" class="form-control control-sign placeholder" required>
                                  <?= HTML::default_option('SELECCIONE') ?>
                                  <option value="MASCULINO">MASCULINO</option>
                                  <option value="FEMENIMO">FEMENIMO</option>
                                </select>
                              </div>
                              
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">ESTADO CIVIL: </span>    </label>
                                <select style="width:167px" id="select_estadocivil" name="estado_civil_usuario" class="form-control control-sign placeholder" required>
                                  <?= HTML::default_option('SELECCIONE') ?>
                                  <option value="SOLTERO">SOLTERO(A)</option>
                                  <option value="CASADO">CASADO(A)</option>
                                  <option value="VIUDO">VIUDO(A)</option>
                                </select>
                              </div>
                              
                            
                              
                              
                              
                                
                               
                               <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">DEPARTAMENTO: </span>    </label>
                            <select style="width:166px" name="departamento" id="departamento" class="form-control control-sign placeholder" required>
                              <?= HTML::default_option('DEPARTAMENTO') ?>
                            </select>
                          </div>
                          
                          <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">PROVINCIA: </span>    </label>
                            <select style="width:166px" name="provincia"  id="provincia" class="form-control control-sign placeholder" required>
                              <?= HTML::default_option('PROVINCIA') ?>
                              </select><img id="loadingp" style="display:none" src="/serhas/media/serhas/img/loading.gif" width="25" height="28" ></div>
                          
                          <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">DISTRITO: </span>    </label>
                            <select style="width:166px" name="distrito" id="distrito" class="form-control control-sign placeholder" required>
                              <?= HTML::default_option('DISTRITO') ?>
                            </select><img id="loadingd" style="display:none" src="/serhas/media/serhas/img/loading.gif" width="25" height="28">
                          </div>
                          
                           <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">ESTADO: </span>    </label>
                                <select style="width:167px" id="select_estado" name="estado_paciente" class="form-control control-sign placeholder" required>
                                  <?= HTML::default_option('ESTADO') ?>
                                  <option value="activo">ACTIVO</option>
                                  <option value="inactivo">INACTIVO</option>
                                </select>
                              </div>
                            
                                
          
                              </div>
                          </div>
                      </td>
                      <td>
                       <div class="form-horizontal">
                            <div class="control-group row-fluid form-inline" >
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">TELEFONO: </span>    </label>
                                <input align="right" name="tel_paciente" type="text" id="input_tel" placeholder="TELEFONO" class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Numero" >
                              </div>
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">CELULAR: </span>    </label>
                                <input align="right" name="cel_paciente" type="text" id="input_cel" placeholder="CELULAR" class="inputrange"  title="Requiere Contraseña" >
                             </div>
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">CORREO: </span>    </label>
                                <input align="right" name="email_paciente" type="text" id="input_email_paciente" placeholder="E-MAIL" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Nombre" >
                              </div>
                              
                                                          
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">INSTRUCCIÓN: </span>    </label>
                                <select style="width:167px" id="select_instruccion" name="select_instruccion" class="form-control control-sign placeholder" >
                                  <?= HTML::default_option('SELECCIONE') ?>
                                  <option value="PRIMARIA">PRIMARIA</option>
                                  <option value="SECUNDARIA">SECUNDARIA</option>
                                  <option value="PROFESIONAL TECNICO">PROFESIONAL TECNICO</option>
                                  <option value="PROFESIONAL UNIVERSITARIO">PROFESIONAL UNIVERSITARIO</option>
                                  <option value="NINGUNO">NINGUNO</option>
                                  <option value="OTRO">OTRO</option>
                                </select>
                              </div>
                              
                              
                               <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">RELIGION: </span>    </label>
                                <select style="width:167px" id="select_religion" name="select_religion" class="form-control control-sign placeholder" >
                                  <?= HTML::default_option('SELECCIONE') ?>
                                  <option value="CATOLICO">CATOLICO</option>
                                  <option value="EVANGELICO">EVANGELICO</option>
                                  <option value="NINGUNO">NINGUNO</option>
                                  <option value="OTRO">OTRO</option>
                                </select>
                              </div>
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">FAMILIAR REF.: </span>    </label>
                              <input align="middle" name="familiar_paciente" type="text" id="input_familiar" placeholder="FAMILIAR REF." class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Fecha">
                              </div>
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">TELÉFONO: </span>    </label>
                              <input align="middle" name="tel_familiar" type="text"  id="input_tel_familiar" placeholder="TELÉFONO REF." class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Fecha">
                              </div>
                              
                                <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">URBANIZACION: </span>    </label>
                                <input align="right" name="urb_paciente" type="text" id="descripcion" placeholder="URBANIZACIÓN" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Direccion">
                              </div>
                               
                                 <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">AREA: </span>    </label>
                                <input align="right" name="area_paciente" type="text" id="descripcion" placeholder="AREA" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Direccion">
                              </div>
                               
                                 <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">PUESTO: </span>    </label>
                                <input align="right" name="puesto_paciente" type="text" id="descripcion" placeholder="PUESTO" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Direccion">
                              </div>
                              
                                <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">Nro. HIJOS VIVOS: </span>    </label>
                                <input align="right" name="hijos_paciente" type="number" min="0" max="10" id="descripcion" placeholder="Nro. HIJOS" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Direccion">
                              </div>
                              
                                <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">Nro. DEPENDIENTES: </span>    </label>
                                <input align="right" name="dependientes_paciente" type="number" min="0" max="10" id="descripcion" placeholder="Nro. DEPENDIENTES" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Direccion">
                              </div>
                                         
                              </div>
                          </div>
                      </td>
                      <td align="left">
                      <input type="file" id="files" name="files[]" />
                        <br />
                        <output id="list" style="display:block"></output>
                        
                        <br>
						<br>

                        <button name="crear_paciente" type="submit" class="btn btn-primary" value="">Guardar</button>
                      <button id="cancel_paciente" name="cancel_paciente" type="reset" class="btn btn-primary">Cancelar</button>
                    
                
                                      
                        
                          
                       
                      </td>
					</tr>
  </tbody>
                </table>
             
       
                </div>
            
            </div>
            	   
                          
          </form>  	 <!--PANEL PACIENTES-->
     
           
			  <?php  $contpf = 0 ?>
                <?php  foreach ($usTipoPacienteDiv as $usTipoPacienteDiv): ?>
                <?php  $contpf = $contpf+1  ?>
                      <?php  if (isset($_POST['editP'.$usTipoPacienteDiv->cod_paciente])): ?>
                          <?php if (($usTipoPacienteDiv->cod_paciente == $_POST['editP'.$usTipoPacienteDiv->cod_paciente])): ?>
                            </div>
                            <?php  reset($usTipoPacienteDiv); ?>
                     <?php endif ?>  
                      <?php  elseif(isset($_POST['delP'.$contpf])): ?> 
                      </div>
                       <?php  reset($usTipoPacienteDiv); ?>
                    <?php endif ?>    
            <?php endforeach ?> 
      </div> 	<!--TAB 1 PANEL -->
      
       
   <?php  $cont = 0 ?>
	<?php  foreach ($usTipoPacienteBuscar as $usTipoPacienteBuscar): ?>
    <?php  $cont = $cont+1  ?>
			  <?php  if(isset($_POST['editP'.$usTipoPacienteBuscar->cod_paciente])): ?>
				  <?php if( $usTipoPacienteBuscar->cod_paciente == $_POST['editP'.$usTipoPacienteBuscar->cod_paciente]):?>
                      <div class="tab-pane active" id="BUSCAR">
                      <?php  reset($usTipoPacienteBuscar); ?>
                  <?php endif ?>    
              <?php  elseif(isset($_POST['delP'.$cont])): ?>   
                 	 <div class="tab-pane active" id="BUSCAR">
                       <?php  reset($usTipoPacienteBuscar); ?>
   			  <?php endif ?>  
   	<?php endforeach ?>  
    
    <?php  if(isset($_POST['editar_paciente']) || isset($_POST['crear_paciente'])): ?> 
  		 <div class="tab-pane active" id="BUSCAR">
    <?php else: ?>
  		  <div class="tab-pane" id="BUSCAR">
    <?php endif ?>
      
  
 
          <form class="form-sign signup" role="form" method="post">
            
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <div align="center">BUSQUEDA DE PACIENTE</div>
                    </div>
                  <div class="panel-body">
                    <div class="form-horizontal">
                      <div class="control-group row-fluid form-inline">
                        <fieldset>
                   			 <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">DESCRIPCION: </span>    </label>
                                <input align="right" name="dni_paciente" type="text" id="input_descripcion" placeholder="DESCRIPCION" class="inputrange"  title="Requiere Descripcion" >&nbsp;&nbsp;<button type="button" class="btn btn-primary">Buscar</button>
                             </div>
                              
                           </fieldset>   
                      
                      </div>
                      
                      
                         <div class="table-responsive">
                      
                        <table id="demoTable1">
                          <thead>
                            <tr>
                              <th sort="index" style="text-align: center">N°</th>
                              <th sort="beds"  style="text-align: center">HC</th>
                              <th sort="beds"  style="text-align: center">DNI</th>
                              <th sort="description"  style="text-align: center">PACIENTE</th>
                              <th sort="description"  style="text-align: center">EMPRESA</th>
                              <th sort="description"  style="text-align: center">TELEFONO</th>
                              <th style="text-align: center">ESTADO</th>
                              <th style="text-align: center">EDIT</th>
                              <th style="text-align: center">ELIMINAR</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                            <?php   foreach ($paciente as $paciente): ?>
                            <tr  align="center">
                              <td><?= $paciente->cod_paciente?></td>
                              <td><?= $paciente->num_cod_paciente?></td>
                              <td><?= $paciente->dni_paciente?></td>
                              <td><?= $paciente->apellidos_paciente?></td>
                              <td></td>
                              <td><?= $paciente->telefono_paciente?></td>
                              <td>
                              <?php   if($paciente->estado_paciente == "activo"): ?>
							  <img title="ACTIVO" src="/serhas/media/serhas/img/Status-user-online-icon.png" width="25" height="25" >
                              <?php   else: ?>
                              <img title="INACTIVO" src="/serhas/media/serhas/img/Status-user-busy-icon.png" width="25" height="25" >
                              <?php   endif ?>
                              </td>
                              <td><button name="editP<?= $paciente->cod_paciente?>" type="submit" class="btn btn-default" value="<?= $paciente->cod_paciente?>">
                                <span class="glyphicon glyphicon-edit"></span>
                                </button></td>
                              <td><button name="delP<?= $paciente->cod_paciente?>" type="submit" class="btn btn-default" value="<?= $paciente->cod_paciente?>">
                                <span class="glyphicon glyphicon-remove"></span>
                                </button></td>
                            </tr>
                            <?php endforeach ?>
                          </tbody>
                             <tfoot class="nav">
                                    <tr>
                                            <td colspan=9>
                                                    <div class="pagination"></div>
                                                    <div class="paginationTitle">Página:</div>
                                                    <div class="selectPerPage"></div>
                                                    <div class="status"></div>
                                            </td>
                                    </tr>
                   			 </tfoot>
                        </table>
                     
                      </div>
                        
                      </div>
                      </div>
                      <div align="center">
                      <span> <strong>LEYENDA:&nbsp; </strong><img title="ACTIVO" src="/serhas/media/serhas/img/Status-user-online-icon.png" width="22" height="22" > ACTIVO  <img title="INACTIVO" src="/serhas/media/serhas/img/Status-user-busy-icon.png" width="22" height="22" > INACTIVO  &nbsp; &nbsp;    <strong>EXPORTAR:</strong><span  id="btnExportPaciente" style="cursor:pointer"><img title="EXPORTAR A EXCEL" src="/serhas/media/serhas/img/excel.jpg" width="33" height="33" ></span>
</span></div>
                    </div>
                  
                  
                       
                  
                  
            
                
               <?php  foreach ($editpaciente as $editpaciente): ?>
			  <?php  if (isset($_POST['editP'.$editpaciente->cod_paciente])): ?>
				  <?php if ($editpaciente->cod_paciente == $_POST['editP'.$editpaciente->cod_paciente]): ?>
					  
                      
            <div id="edit_paciente" style="display:block">
             <div class="panel panel-primary" >
            <div class="panel-heading">
              <div align="center">EDITAR PACIENTE</div>
              </div>
              </div>
            
            <div class="panel-body">
              <table >
                  <thead>
                    <tr>
                      <th width="500" >DATOS PERSONALES</th>
                      <th width="500">DATOS SECUNDARIOS</th>
                      <th width="500">FOTO</th>
                
                    </thead>
                  
                  <tbody>
                 
                    <tr  align="left">
                      <td>
                       <div class="form-horizontal">
                            <div class="control-group row-fluid form-inline" >
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">N.C.: </span>    </label>
                                <input align="right" name="num_paciente" type="text" id="input_numpac" placeholder="N.C." class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Numero" value="<?= $editpaciente->num_cod_paciente?>" required>
                              </div>
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">DNI: </span>    </label>
                                <input align="right" name="dni_paciente" type="text" id="input_dni" placeholder="DNI" class="inputrange"  title="Requiere Contraseña" value="<?= $editpaciente->dni_paciente?>" required>
                             </div>
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">NOMBRES: </span>    </label>
                                <input align="right" name="nom_paciente" type="text" id="input_nom_paciente" placeholder="NOMBRES" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Nombre" value="<?= $editpaciente->nombres_paciente?>" required>
                              </div>
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">APELLIDOS: </span>    </label>
                              <input align="right" name="apellido_paciente" type="text" id="input_apellido_paciente" placeholder="APELLIDOS" class="inputrange" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Apellidos" value="<?= $editpaciente->apellidos_paciente?>" required>
                              </div>
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">LUGAR NAC.: </span>    </label>
                              <input align="middle" name="lugar_nac_paciente" type="text" id="input_date" placeholder="LUGAR NACIMIENTO" class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Fecha" value="<?= $editpaciente->lugar_nac_paciente?>" required>
                              </div>
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">DIRECCIÓN: </span>    </label>
                                <input align="right" name="direc_paciente" type="text" id="descripcion" placeholder="DIRECCIÓN" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Direccion" value="<?= $editpaciente->direccion_paciente?>" required>
                              </div>
                              
                                <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">FECHA NAC.: </span>    </label>
                              <input align="middle" name="fecha_nac_usuario" type="date" id="input_date" placeholder="SELECCIONE" class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Fecha" value="<?= $editpaciente->fecha_nac_paciente?>" required>
                              </div>
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">EDAD: </span>    </label>
                              <input align="middle" name="edad_paciente" type="number" id="input_date" placeholder="EDAD" class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?= $editpaciente->edad_paciente?>" title="Requiere Edad" >
                              </div>
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">SEXO: </span>    </label>
                                <select style="width:167px" id="select_sexo" name="estado_sexo" class="form-control control-sign placeholder" required>
                                  <?= HTML::default_option('SELECCIONE') ?>
                                  <option value="MASCULINO" <?php if( "MASCULINO" == $editpaciente->sexo_paciente) echo " selected"?>>MASCULINO</option>
                                  <option value="FEMENIMO" <?php if( "FEMENIMO" == $editpaciente->sexo_paciente) echo " selected"?>>FEMENIMO</option>
                                </select>
                              </div>
                              
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">ESTADO CIVIL: </span>    </label>
                                <select style="width:167px" id="select_estadocivil" name="estado_civil_usuario" class="form-control control-sign placeholder" required>
                                  <?= HTML::default_option('SELECCIONE') ?>
                                  <option value="SOLTERO" <?php if( "SOLTERO" == $editpaciente->estado_civil_paciente) echo " selected"?>>SOLTERO(A)</option>
                                  <option value="CASADO" <?php if( "CASADO" == $editpaciente->estado_civil_paciente) echo " selected"?>>CASADO(A)</option>
                                  <option value="VIUDO" <?php if( "VIUDO" == $editpaciente->estado_civil_paciente) echo " selected"?>>VIUDO(A)</option>
                                </select>
                              </div>
                              
                            
                              
                              
                              
                                
                               
                               <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">DEPARTAMENTO: </span>    </label>
                            <select style="width:166px" name="departamento" id="departamento" class="form-control control-sign placeholder" required>
                              <?= HTML::default_option('DEPARTAMENTO') ?>
                              
                             <?php foreach ($ubigeodepPaciente as $keyPaciente => $valPaciente): ?>
                              <option value="<?= $keyPaciente ?>" <?php if($keyPaciente == $editpaciente->departamento_paciente) echo " selected"?>><?= __(strtoupper($valPaciente)) ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                          
                          <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">PROVINCIA: </span>    </label>
                            <select style="width:166px" name="provincia"  id="provincia" class="form-control control-sign placeholder" required>
                              <?= HTML::default_option('PROVINCIA') ?>
                              <?php foreach ($ubigeoproPaciente as $ubigeoproPaciente): ?>
								 <?php if ($ubigeoproPaciente->cod_departamento == $editpaciente->departamento_paciente): ?>
                                     <option value="<?= $ubigeoproPaciente->cod_provincia ?>" <?php if($ubigeoproPaciente->cod_provincia == $editpaciente->provincia_paciente) echo " selected"?>><?= __(strtoupper($ubigeoproPaciente->nom_provincia)) ?></option>                  
                                    
                                 <?php endif ?>
                          <?php endforeach ?>
                              
                              </select><img id="loadingp" style="display:none" src="/serhas/media/serhas/img/loading.gif" width="25" height="28" ></div>
                          
                          <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">DISTRITO: </span>    </label>
                            <select style="width:166px" name="distrito" id="distrito" class="form-control control-sign placeholder" required>
                              <?= HTML::default_option('DISTRITO') ?>
                              
                              <?php foreach ($ubigeodisPaciente as $ubigeodisPaciente): ?>
						 	 <?php if ($ubigeodisPaciente->cod_departamento == $editpaciente->departamento_paciente): ?>
                            	 <?php if ($ubigeodisPaciente->cod_provincia == $editpaciente->provincia_paciente): ?>
                           		 <option value="<?= $ubigeodisPaciente->cod_distrito ?>" <?php if($ubigeodisPaciente->cod_distrito == $editpaciente->distrito_paciente) echo " selected"?>><?= __(strtoupper($ubigeodisPaciente->nom_distrito)) ?></option>                  
                             
                             	<?php endif ?>
							 <?php endif ?>
                      <?php endforeach ?>
                              
                            </select><img id="loadingd" style="display:none" src="/serhas/media/serhas/img/loading.gif" width="25" height="28">
                          </div>
                          
                           <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">ESTADO: </span>    </label>
                                <select style="width:167px" id="select_estado" name="estado_paciente" class="form-control control-sign placeholder" required>
                                  <?= HTML::default_option('ESTADO') ?>
                                  <option value="activo" <?php if( "activo" == $editpaciente->estado_paciente) echo " selected"?> >ACTIVO</option>
                                  <option value="inactivo" <?php if( "inactivo" == $editpaciente->estado_paciente) echo " selected"?>>INACTIVO</option>
                                </select>
                              </div>
                            
                                
          
                              </div>
                          </div>
                      </td>
                      <td>
                       <div class="form-horizontal">
                            <div class="control-group row-fluid form-inline" >
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">TELEFONO: </span>    </label>
                                <input align="right" name="tel_paciente" type="text" id="input_tel" placeholder="N.C." class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Numero" value="<?= $editpaciente->telefono_paciente?>" >
                              </div>
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">CELULAR: </span>    </label>
                                <input align="right" name="cel_paciente" type="text" id="input_cel" placeholder="CONTRASEÑA" class="inputrange"  title="Requiere Contraseña" value="<?= $editpaciente->celular_paciente?>" >
                             </div>
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">CORREO: </span>    </label>
                                <input align="right" name="email_paciente" type="text" id="input_email_paciente" placeholder="NOMBRES" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Nombre" value="<?= $editpaciente->email_paciente?>" >
                              </div>
                              
                                                          
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">INSTRUCCIÓN: </span>    </label>
                                <select style="width:167px" id="select_instruccion" name="select_instruccion" class="form-control control-sign placeholder" >
                                  <?= HTML::default_option('SELECCIONE') ?>
                                  <option value="PRIMARIA"<?php if( "PRIMARIA" == $editpaciente->instruccion_paciente) echo " selected"?>>PRIMARIA</option>
                                  <option value="SECUNDARIA"<?php if( "SECUNDARIA" == $editpaciente->instruccion_paciente) echo " selected"?>>SECUNDARIA</option>
                                  <option value="PROFESIONAL TECNICO"<?php if( "PROFESIONAL TECNICO" == $editpaciente->instruccion_paciente) echo " selected"?>>PROFESIONAL TECNICO</option>
                                  <option value="PROFESIONAL UNIVERSITARIO"<?php if( "PROFESIONAL UNIVERSITARIO" == $editpaciente->instruccion_paciente) echo " selected"?>>PROFESIONAL UNIVERSITARIO</option>
                                  <option value="NINGUNO"<?php if( "NINGUNO" == $editpaciente->instruccion_paciente) echo " selected"?>>NINGUNO</option>
                                  <option value="OTRO"<?php if( "OTRO" == $editpaciente->instruccion_paciente) echo " selected"?>>OTRO</option>
                                </select>
                              </div>
                              
                              
                               <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">RELIGION: </span>    </label>
                                <select style="width:167px" id="select_religion" name="select_religion" class="form-control control-sign placeholder" >
                                  <?= HTML::default_option('SELECCIONE') ?>
                                  <option value="CATOLICO"<?php if( "CATOLICO" == $editpaciente->religion_paciente) echo " selected"?>>CATOLICO</option>
                                  <option value="EVANGELICO"<?php if( "EVANGELICO" == $editpaciente->religion_paciente) echo " selected"?>>EVANGELICO</option>
                                  <option value="NINGUNO"<?php if( "NINGUNO" == $editpaciente->religion_paciente) echo " selected"?>>NINGUNO</option>
                                  <option value="OTRO"<?php if( "OTRO" == $editpaciente->religion_paciente) echo " selected"?>>OTRO</option>
                                </select>
                              </div>
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">FAMILIAR REF.: </span>    </label>
                              <input align="middle" name="familiar_paciente" type="text" id="input_familiar" placeholder="NOMBRES" class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Fecha" value="<?= $editpaciente->familiar_refe_paciente?>">
                              </div>
                              
                              <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">TELÉFONO: </span>    </label>
                              <input align="middle" name="tel_familiar" type="text" id="input_tel_familiar" placeholder="TELÉFONO" class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Fecha" value="<?= $editpaciente->telefono_refe_paciente?>">
                              </div>
                              
                                <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">URBANIZACION: </span>    </label>
                                <input align="right" name="urb_paciente" type="text" id="descripcion" placeholder="URBANIZACIÓN" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Direccion" value="<?= $editpaciente->urbanizacion_paciente?>">
                              </div>
                               
                                 <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">AREA: </span>    </label>
                                <input align="right" name="area_paciente" type="text" id="descripcion" placeholder="AREA" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Direccion" value="<?= $editpaciente->area_paciente?>">
                              </div>
                               
                                 <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">PUESTO: </span>    </label>
                                <input align="right" name="puesto_paciente" type="text" id="descripcion" placeholder="PUESTO" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Direccion" value="<?= $editpaciente->puesto_paciente?>">
                              </div>
                              
                                <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">Nro. HIJOS VIVOS: </span>    </label>
                                <input align="right" name="hijos_paciente" type="number" id="descripcion" placeholder="Nro. HIJOS" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Direccion" value="<?= $editpaciente->num_hijos_paciente?>">
                              </div>
                              
                                <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">Nro. DEPENDIENTES: </span>    </label>
                                <input align="right" name="dependientes_paciente" type="number" id="descripcion" placeholder="Nro. DEPENDIENTES" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Direccion" value="<?= $editpaciente->num_dependientes_paciente?>">
                              </div>
                                         
                              </div>
                          </div>
                      </td>
                      <td align="left">
                     
                      
                      <input type="file" id="filesE" name="files[]" />
                        <br />
                        <output id="lista" style="display:block"><?= $editpaciente->foto_paciente?></output>
                        <br>
						<br>

                        <button id="editar_paciente" name="editar_paciente" type="submit" class="btn btn-primary" value="<?= $editpaciente->cod_paciente?>">Guardar</button>
                      <button id="canceledit_paciente" name="canceledit_paciente" type="reset" class="btn btn-primary">Cancelar</button>
                    
                
                                      
                        
                          
                       
                      </td>
					</tr>
  </tbody>
                </table>
              </div>
          </div>
            <?php endif ?>  
          
          <?php endif ?>    
          
          <?php endforeach ?>
          </form>  	 <!--PANEL PERMISOS-->
      
		  <?php  $contf = 0 ?>
          <?php  foreach ($usTipoPacienteBuscarDiv as $usTipoPacienteBuscarDiv): ?>
          <?php  $contf = $contf+1  ?>
                  <?php  if (isset($_POST['editP'.$usTipoPacienteBuscarDiv->cod_paciente])): ?>
                      <?php if (($usTipoPacienteBuscarDiv->cod_paciente == $_POST['editP'.$usTipoPacienteBuscarDiv->cod_paciente])): ?>
                        </div>
                        <?php  reset($usTipoPacienteBuscarDiv); ?>
                     <?php endif ?>  
                  <?php  elseif(isset($_POST['delP'.$contf])): ?> 
                      </div>
                      <?php  reset($usTipoPacienteBuscarDiv); ?>
                <?php endif ?>    
        <?php endforeach ?> 
      </div> 	<!--TAB 2 PANEL -->
      
	
        
    
   
</div>
<br>
<br>
<br>
<form  id="footer"name="footer_form" class="form-sign signup" role="form" method="post">
<div class="form-group actions text-center">
		<a class="btn btn-link" href="panel_bienvenida">
        <span  style="cursor:pointer"><img title="MENU PRINCIPAL" src="/serhas/media/serhas/img/home.png" width="70" height="70" ></span>
		</a> 
</div>
</form>


<div class="footer-sign"> 
	Av. Universitaria 407 Lima, San Miguel Lima 32 Perú   &nbsp	&nbsp Teléfono: 013705138
<br>
	<a href="http://www.serhasperu.com/">SOLUCIONES EMPRESARIALES ENDAFE S.A.C.</a><br>
	Copyright © 2014 - Development by SerHas Perú
</div> <!--footer(pie de pagina)-->


<div id="dvDataPaciente" style="display:none">
                        <table border="2px solid #000000">
                     		<caption>
                     		<strong>LISTA PACIENTES</strong>
                     		</caption>
                           	 <tr>
                              <th bgcolor="#8EBFF0" >N°</th>
                              <th bgcolor="#8EBFF0" >HC</th>
                              <th bgcolor="#8EBFF0" >DNI</th>
                              <th bgcolor="#8EBFF0" >NOMBRES</th>
                              <th bgcolor="#8EBFF0" >APELLIDOS</th>
                              <th bgcolor="#8EBFF0" >SEXO</th>
                              <th bgcolor="#8EBFF0" >FECHA NACIMIENTO</th>
                              <th bgcolor="#8EBFF0" >EDAD</th>
                              <th bgcolor="#8EBFF0" >LUGAR NACIMIENTO</th>
                              <th bgcolor="#8EBFF0" >DIRECCION</th>
                              <th bgcolor="#8EBFF0" >DEPARTAMENTO</th>
                              <th bgcolor="#8EBFF0" >PROVINCIA</th>
                              <th bgcolor="#8EBFF0" >DISTRITO</th>
                              <th bgcolor="#8EBFF0" >TELEFONO</th>
                              <th bgcolor="#8EBFF0" >CELULAR</th>
                              <th bgcolor="#8EBFF0" >EMAIL</th>
                              <th bgcolor="#8EBFF0" >INSTRUCCION</th>
                              <th bgcolor="#8EBFF0" >ESTADO CIVIL</th>
                              <th bgcolor="#8EBFF0" >RELIGION</th>
                              <th bgcolor="#8EBFF0" >FAMILIAR</th>
                              <th bgcolor="#8EBFF0" >TELEFONO FAMILIAR</th>
                              <th bgcolor="#8EBFF0" >URBANIZACION</th>
                              <th bgcolor="#8EBFF0" >AREA</th>
                              <th bgcolor="#8EBFF0" >PUESTO</th>
                              <th bgcolor="#8EBFF0" >HIJOS</th>
                              <th bgcolor="#8EBFF0" >DEPENDIENTES</th>
                              <th bgcolor="#8EBFF0" >ESTADO</th>
                              
                              </tr>
                  
                          <tbody>
                            
                            <?php  foreach ($ListaPacientesExcel as $ListaPacientesExcel): ?>
                            <tr  align="center">
                              <td><?= strtoupper($ListaPacientesExcel->cod_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->num_cod_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->dni_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->nombres_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->apellidos_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->sexo_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->fecha_nac_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->edad_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->lugar_nac_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->direccion_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->departamento_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->provincia_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->distrito_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->telefono_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->celular_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->email_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->instruccion_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->estado_civil_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->religion_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->familiar_refe_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->telefono_refe_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->urbanizacion_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->area_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->puesto_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->num_hijos_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->num_dependientes_paciente)?></td>
                              <td><?= strtoupper($ListaPacientesExcel->estado_paciente)?></td>
                              </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
</div> <!--EXPORT EXCEL-->
