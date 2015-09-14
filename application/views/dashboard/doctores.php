<meta charset="utf-8">
      <h3 class="heading" align="center">
      <?= __('DOCTORES') ?>
	   </h3>
	
  <hr>
	


<br>
<div class="panel panel-primary" >
            
                 	 <div class="panel-heading" >
                   		 <div align="center">LISTA DE DOCTORES</div>
                     </div>
                    <div class="panel-body">
                    <form  id="usuariospanel" name="usuarios_panel" class="form-sign signup" role="form" method="post">

                        <div class="form-horizontal">
                          <div class="control-group row-fluid form-inline">
                            <label for="name" class="control-label">
                            <p class="text-info">DESCRIPCIÓN&nbsp;<i class="icon-star"></i>
                              <input type="text" id="descripcion" placeholder="Descripción" class="span3" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                              <button type="button" class="btn btn-primary">Buscar</button></p>
                                 
                 
                          </div>
                          </div> 
                          
                        <div class="table-responsive">
                      
                        <table id="demoTable1">
                          <thead>
                            <tr>
                              <th sort="index" style="text-align: center">CODIGO</th>
                              <th sort="index" style="text-align: center">CODIGO CMP</th>
                              <th sort="description"  style="text-align: center">USUARIO</th>
                              <th sort="description"  style="text-align: center">NOMBRE</th>
                              <th sort="description"  style="text-align: center">APELLIDOS</th>
                              <th sort="description"  style="text-align: center">ESPECIALIDAD</th>
                              <th sort="description"  style="text-align: center">EMAIL-EMP</th>
                              <th sort="beds" style="text-align: center">TELÉFONO</th>
                              <th sort="description" style="text-align: center">DIRECCIÓN</th>
                              <th sort="beds" style="text-align: center">DNI</th>
                              <th sort="date" style="text-align: center">OBSERVACIÓN</th>
                              <th style="text-align: center">EDIT</th>
                              <th style="text-align: center">ELIMINAR</th>
                              </tr>
                            </thead>
                          <tbody>
                            
                            <?php  foreach ($usDoctor as $usDoctor): ?>
                            <tr  align="center">
                              <td><?= strtoupper($usDoctor->cod_usuario)?></td>
                              <td><?= strtoupper($usDoctor->cod_cmp)?></td>
                              <td><?= strtoupper($usDoctor->nick_usuario)?></td>
                              <td><?= strtoupper($usDoctor->nom_usuario)?></td>
                              <td><?= strtoupper($usDoctor->apellido_usuario)?></td>
                              <td><?= $usDoctor->id_especialidad_doctor?></td>
                              <td><?= strtoupper($usDoctor->email_emp_usuario)?></td>
                              <td><?= $usDoctor->telf_usuario?></td>
                              <td><?= strtoupper($usDoctor->direc_usuario)?></td>
                              <td><?= $usDoctor->dni_usuario?></td>
                              <td><?= $usDoctor->observacion_usuario?></td>
                              <td><button id="btneditar_usuario<?= $usDoctor->id_usuario?>" name="editU<?= $usDoctor->id_usuario?>" type="submit" class="btn btn-default" value="<?= $usDoctor->id_usuario?>" >
                                <span class="glyphicon glyphicon-edit"></span>
                                </button></td>
                                
                                
                              <td><button id="btncancelar_usuario<?= $usDoctor->id_usuario?>" name="deleteU<?= $usDoctor->id_usuario?>" type="submit" class="btn btn-default" value="<?= $usDoctor->id_usuario?>">
                                <span class="glyphicon glyphicon-remove"></span>
                                </button></td>
                              
                              </tr>
                            <?php endforeach ?>
                            </tbody>
                             <tfoot class="nav">
                                    <tr>
                                            <td colspan=13>
                                                    <div class="pagination"></div>
                                                    <div class="paginationTitle">Página:</div>
                                                    <div class="selectPerPage"></div>
                                                    <div class="status"></div>
                                            </td>
                                    </tr>
                   			 </tfoot>
                        </table>
                        
                      </div>	<!--TABLA USUARIO--> 
                       <button id="createusuario" name="create_usuario" type="button" class="btn btn-primary" >CREAR DOCTOR
                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>                        
                          <span  id="btnExport" style="cursor:pointer"><img title="EXPORTAR A EXCEL" src="/serhas/media/serhas/img/excel.jpg" width="38" height="39" ></span>
                      </form>
                </div> 

          
 <form  id="edity_usuario" name="edity_usuario" class="form-sign signup" role="form" method="post">
          <?php  foreach ($usTipoE as $usTipoE): ?>
			  <?php  if (isset($_POST['editU'.$usTipoE->id_usuario])): ?>
				  <?php if ($usTipoE->id_usuario == $_POST['editU'.$usTipoE->id_usuario]): ?>
					  <?php foreach ($usperTipo as $usperTipo): ?>
                     	 <?php if ($usperTipo->id_usuario_FK == $usTipoE->id_usuario): ?>
                     			 <?php $perfilval = $usperTipo->id_perfiles_FK?> 
                 				 <?php $idUsuPerf = $usperTipo->id_usu_per?>
                                 <?php $idUsu = $usTipoE->id_usuario?>
                                 <?php $est_civil = $usTipoE->estado_civil_usuario?>
                                 <?php $esp_doc = $usTipoE->id_especialidad_doctor?>
             			 <?php endif ?>   
        			  <?php endforeach ?>
                      
          
          
          <div id="edit_user" style="display:block">
             <div class="panel panel-primary" >
            <div class="panel-heading">
              <div align="center">EDITAR DOCTOR</div>
              </div>
              </div>
            
            <div class="panel-body">
              <div class="form-horizontal">
                <div class="control-group row-fluid form-inline" >
                  
                  <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">SEDE: </span>    </label>
                    <select style="width:166px" name="sede_usuario" class="form-control control-sign placeholder" required>
                      <?= HTML::default_option('TIPO SEDE') ?>
                      <?php foreach ($sede as $keyS => $valS): ?>
                      <option value="<?= $keyS ?>" <?php if($keyS == $usTipoE->id_sede_PK) echo " selected"?>><?= __(strtoupper($valS)) ?></option>
                      
                      <?php endforeach ?>
                  </select>	<!--SELECT SEDE-->
                  </div>
                  
                  <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">PERFIL: </span>    </label>
                    <select style="width:166px" name="perfil_editUsu" class="form-control control-sign placeholder" required>
                      <?= HTML::default_option('TIPO PERFIL') ?>
                      
                      <?php foreach ($pTipo as $keyP => $valP): ?>
                      <option value="<?= $keyP ?>" <?php if($keyP == $perfilval) echo " selected"?>><?= __(strtoupper($valP)) ?></option>
                      <?php endforeach ?>
                         
                  </select><!--SELECT PERFIL-->
                  </div>
                  
                  
                   <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">ESPECIALIDAD: </span>    </label>
                        <select style="width:166px" id="select_sedeus" name="especialidad_usuario" class="form-control control-sign placeholder" required>
                          <?= HTML::default_option('ESPECIALIDAD') ?>
                          <?php foreach ($EspTipo as $keyS => $valS): ?>
                          <option  value="<?= $keyS ?>" <?php if($keyS == $esp_doc) echo " selected"?>><?= __(strtoupper($valS)) ?></option>
                          <?php endforeach ?>
                    </select>		<!--SELECT SEDE-->
                      
                  </div>
                  
                     <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">CODIGO CMP: </span>    </label>
                        <input name="codigo_cmp" type="text" id="cod_doc" placeholder="CODIGO CMP" class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Codigo" value="<?= $usTipoE->cod_cmp?>"required>
                      </div>
                      
                  
                  <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">USUARIO: </span>    </label>
                  <input align="right" name="nick_usuario" type="text" id="descripcion" placeholder="USUARIO" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?= $usTipoE->nick_usuario?>" required>
                  </div>
                  
                  <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">CONTRASEÑA: </span>    </label>
                  <input align="right" name="pass_usuario" type="password" id="descripcion" placeholder="CONTRASEÑA" class="inputrange" value="<?= $usTipoE->pass_usuario?>" required>
                 </div>
                  
                  <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">NOMBRE: </span>    </label>
                  <input align="right" name="nom_usuario" type="text" id="descripcion" placeholder="NOMBRES" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?= $usTipoE->nom_usuario?>" required>
                  </div>
                  
                  <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">APELLIDOS: </span>    </label>
                  <input align="right" name="apellido_usuario" type="text" id="descripcion" placeholder="APELLIDOS" class="inputrange" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?= $usTipoE->apellido_usuario?>" required>
                 </div>
                 
                 <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">DNI: </span>    </label>
                  <input align="right" name="dni_usuario" type="text" id="descripcion" placeholder="DNI" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?= $usTipoE->dni_usuario?>" required>
                 </div>
                 
                <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">UNIVERSIDAD: </span>    </label>
                        <input align="right" name="universidad_usuario" type="text" id="descripcion" placeholder="UNIVERSIDAD" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Universidad" value="<?= $usTipoE->universidad_usuario?>">
                  </div>  
                    
                  <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">ESTADO CIVIL: </span>    </label>
                        <select style="width:167px" id="select_estadocivil" name="estado_civil_usuario" class="form-control control-sign placeholder" required>
                          <?= HTML::default_option('ESTADO CIVIL') ?>
                         
                        	  <option value="SOLTERO(A)"<?php if("SOLTERO(A)" == $est_civil) echo " selected"?>>SOLTERO(A)</option>
                     	     <option value="CASADO(A)"<?php if("CASADO(A)" == $est_civil) echo " selected"?>>CASADO(A)</option>
                     	     <option value="VIUDO(A)"<?php if("VIUDO(A)" == $est_civil) echo " selected"?>>VIUDO(A)</option>
                  
                        </select>
                  </div>
                  
                  <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">FECHA NAC.: </span>    </label>
                      <input align="middle" name="fecha_nac_usuario" type="date" id="input_date" placeholder="NOMBRES" class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Fecha" value=<?= $usTipoE->fecha_nac_usuario?>>
               </div>
    
    			
               
                     
                  
                  <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">E-MAIL USUARIO: </span>    </label>
                  <input align="right" name="email_usuario" type="email" id="descripcion" placeholder="E-MAIL" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?= $usTipoE->email_usuario?>" >
                  </div>
                  
                <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">E-MAIL EMPRESA: </span>    </label>
                 <input align="right" name="email_emp" type="email" id="descripcion" placeholder="E-MAIL EMP" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere E-Mail EMP" value="<?= $usTipoE->email_emp_usuario?>">
                   </div>   
                  
                  <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">TELÉFONO: </span>    </label>
                  <input align="right" name="telf_usuario" type="text" id="descripcion" placeholder="TELÉFONO" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?= $usTipoE->telf_usuario?>" >
                  </div>
                  
                  
                  <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">DIRECCIÓN: </span>    </label>
                  <input align="right" name="direc_usuario" type="text" id="descripcion" placeholder="DIRECCIÓN" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?= $usTipoE->direc_usuario?>" >
                  </div>
                  <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">OBSERVACIÓN: </span>    </label>
                     <input align="right" name="observacion_usuario" type="text"  id="descripcion" placeholder="" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Observación" value="<?= $usTipoE->observacion_usuario?>" >
                    </div>  
                    
                  
                  
                   <br>
       			
                  <button id="cancel_editU" name="cancel_editU" type="submit" class="btn btn-primary" >Cancelar</button>
                  <button name="editar_usuario" type="submit" class="btn btn-primary" value="<?= $usTipoE->id_usuario?>">Guardar</button>
                  <input type="text" name="idUsuPerf" value="<?= $idUsuPerf ?>" hidden>
             
                  
                 
                  </div>
                </div>
              </div>
          </div>
          
          <?php endif ?>  
          
          <?php endif ?>    
          
          <?php endforeach ?>
          </form>	<!--EDITAR USUARIO-->
          
          
           
              <div id="new_user" class="panel panel-primary" style="display:none">
                <div class="panel-heading">
                  <div align="center">NUEVO DOCTOR</div>
                  </div>
                
                <div class="panel-body">
                <form name="form_usuario" class="form-sign signup" role="form" method="post">
                  <div class="form-horizontal">
                    <div class="control-group row-fluid form-inline" >
                      
                            
                       <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">SEDE: </span>    </label>
                        <select style="width:225px" id="select_sedeus" name="sede_usuario" class="form-control control-sign placeholder" required>
                          <?= HTML::default_option('TIPO SEDE') ?>
                          <?php foreach ($sede as $keyS => $valS): ?>
                          <option  value="<?= $keyS ?>"><?= __(strtoupper($valS)) ?></option>
                          <?php endforeach ?>
                        </select>		<!--SELECT SEDE-->
                      </div>
                      
                       <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">PERFIL: </span>    </label>
                        <select style="width:225px" id="select_perfilus" name="perfiles" class="form-control control-sign placeholder" required>
                          <?= HTML::default_option('TIPO PERFIL') ?>
                          <?php foreach ($pTipo as $keyP => $valP): ?>
                          <option  value="<?= $keyP ?>"><?= __(strtoupper($valP)) ?></option>
                          <?php endforeach ?>
                      </select>		<!--SELECT PERFIL-->
                      </div>
                       
                       
                        <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">ESPECIALIDAD: </span>    </label>
                        <select style="width:225px" id="select_sedeus" name="especialidad_usuario" class="form-control control-sign placeholder" required>
                          <?= HTML::default_option('ESPECIALIDAD') ?>
                          <?php foreach ($EspTipo as $keyS => $valS): ?>
                          <option  value="<?= $keyS ?>"><?= __(strtoupper($valS)) ?></option>
                          <?php endforeach ?>
                        </select>		<!--SELECT SEDE-->
                      </div>
                     <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">CODIGO CMP: </span>    </label>
                        <input name="codigo_cmp" type="text" id="cod_doc" placeholder="CODIGO CMP" class="inputrange" autofocus style="text-transform:uppercase;width:225px" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Codigo" required>
	                </div>
                      
                    <div>  
                      <label for="name" class="labelrange">
                       <span class="text-info">USUARIO: </span> </label>
                        <input align="right" name="nick_usuario" type="text" id="input_usu" placeholder="USUARIO" class="inputrange" autofocus style="text-transform:uppercase;width:225px" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Usuario" required>
                      </div>
                      
                    <div>  
                      <label for="name" class="labelrange">
                       <span class="text-info">CONTRASEÑA:</span> </label>
                        <input align="right" name="pass_usuario" type="password" id="input_pas" placeholder="CONTRASEÑA" class="inputrange"  title="Requiere Contraseña" style="width:225px" required>
                 </div>
                      
                <div>  
                      <label for="name" class="labelrange">
                       <span class="text-info">NOMBRE: </span> </label>
                        <input align="right" name="nom_usuario" type="text" id="input_nom" placeholder="NOMBRES" class="inputrange"  style="text-transform:uppercase;width:225px" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Nombre" required>
                     </div>
                     
                      
                      <div>  
                      <label for="name" class="labelrange">
                       <span class="text-info">APELLIDOS:  </span> </label>
                      <input align="right" name="apellido_usuario" type="text" id="input_nom" placeholder="APELLIDOS" class="inputrange" style="text-transform:uppercase;width:225px" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Apellidos" required>
               		</div>
                      
                     <div>  
                      <label for="name" class="labelrange">
                       <span class="text-info">DNI: </span> </label>
                        <input align="right" name="dni_usuario" type="text" id="input_dni" placeholder="DNI" class="inputrange"  style="text-transform:uppercase;width:225px" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere DNI" required>
    				</div>
    
				    <div>  
                      <label for="name" class="labelrange">
                       <span class="text-info">UNIVERSIDAD:</span> </label>
                        <input align="right" name="universidad_usuario" type="text" id="descripcion" placeholder="UNIVERSIDAD" class="inputrange"  style="text-transform:uppercase;width:225px" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Universidad">
                      </div>
                      
                       <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">ESTADO CIVIL: </span>    </label>
                        <select style="width:225px" id="select_estadocivil" name="estado_civil_usuario" class="form-control control-sign placeholder" required>
                          <?= HTML::default_option('ESTADO CIVIL') ?>
                          <option value="SOLTERO(A)">SOLTERO(A)</option>
                          <option value="CASADO(A)">CASADO(A)</option>
                          <option value="VIUDO(A)">VIUDO(A)</option>
                        </select>	
                      </div>
    
					 <div>  
                      <label for="name" class="labelrange">
                       <span class="text-info">FECHA NAC.: </span> </label>
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
                      <span class="text-info">E-MAIL USUARIO: </span>    </label>
                        <input align="right" name="email_usuario" type="email" id="descripcion" placeholder="E-MAIL" class="inputrange"  style="text-transform:uppercase;width:225px" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere E-Mail">
                      </div>
                      
                      <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">E-MAIL EMPRESA: </span>    </label>
                        <input align="right" name="email_emp" type="email" id="descripcion" placeholder="E-MAIL EMP" class="inputrange"  style="text-transform:uppercase;width:225px" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere E-Mail EMP">
                      </div>
                      
                      <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">TELÉFONO: </span>    </label>
                        <input align="right" name="telf_usuario" type="text" id="descripcion" placeholder="TELÉFONO" class="inputrange"  style="text-transform:uppercase;width:225px" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Telefono">
                      </div>
                      
                      
                      <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">DIRECCIÓN: </span>    </label>
                        <input align="right" name="direc_usuario" type="text" id="descripcion" placeholder="DIRECCIÓN" class="inputrange"  style="text-transform:uppercase;width:225px" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Dirección">
                      </div>
                      
                     <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">OBSERVACIÓN: </span>    </label>
                     <input align="right" name="observacion_usuario" type="text"  id="descripcion" placeholder="OBSERVACIÓN" class="inputrange"  style="text-transform:uppercase;width:225px" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Observación">
                      </div>
                      
                      
                      
                     <br>
                      <?php  foreach ($uTipo as $uTipo): ?>   
                      <?php endforeach ?>
                      
                      
                      <?php  $coddoc = 1?> 
                      <?php  foreach ($docCod as $docCod): ?>
                      <?php  $coddoc++?>   
                      <?php endforeach ?>
                      
                      <input type="text" name="cod_doc" value="<?= $coddoc ?>" hidden>
                      
                      <button id="cancel_usuario" name="cancel_usuario" type="reset" class="btn btn-primary" value="">Cancelar</button>
                      <button name="crear_usuario" type="submit" class="btn btn-primary" value=" <?= ($uTipo->id_usuario)+1?>">Guardar</button>
                 
                      </div>
                    </div>
                    
                    </form>  
                </div>
            
            </div>                                                 
          		<!--NUEVO USUARIO-->
                
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
              
<div id="dvData" style="display:none">
                        <table border="2px solid #000000">
                     		<caption>
                     		<strong>LISTA DOCTORES</strong>
                     		</caption>
                           	 <tr>
                              <th bgcolor="#8EBFF0" >CODIGO</th>
                              <th bgcolor="#8EBFF0" >CODIGO CMP</th>
                              <th bgcolor="#8EBFF0" >USUARIO</th>
                              <th bgcolor="#8EBFF0" >NOMBRE</th>
                              <th bgcolor="#8EBFF0" >APELLIDOS</th>
                              <th bgcolor="#8EBFF0" >ESPECIALIDAD</th>
                              <th bgcolor="#8EBFF0" >EMAIL-EMP</th>
                              <th bgcolor="#8EBFF0" >TELEFONO</th>
                              <th bgcolor="#8EBFF0" >DIRECCION</th>
                              <th bgcolor="#8EBFF0" >DNI</th>
                              <th bgcolor="#8EBFF0" >OBSERVACION</th>
                              </tr>
                  
                          <tbody>
                            
                            <?php  foreach ($usDoctorExcel as $usDoctorExcel): ?>
                            <tr  align="center">
                              <td><?= strtoupper($usDoctorExcel->cod_usuario)?></td>
                              <td><?= strtoupper($usDoctorExcel->cod_cmp)?></td>
                              <td><?= strtoupper($usDoctorExcel->nick_usuario)?></td>
                              <td><?= strtoupper($usDoctorExcel->nom_usuario)?></td>
                              <td><?= strtoupper($usDoctorExcel->apellido_usuario)?></td>
                              <td><?= $usDoctorExcel->id_especialidad_doctor?></td>
                              <td><?= strtoupper($usDoctorExcel->email_emp_usuario)?></td>
                              <td><?= $usDoctorExcel->telf_usuario?></td>
                              <td><?= strtoupper($usDoctorExcel->direc_usuario)?></td>
                              <td><?= $usDoctorExcel->dni_usuario?></td>
                              <td><?= $usDoctorExcel->observacion_usuario?></td>
                              </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
</div> <!--EXPORT EXCEL-->

