<meta charset="utf-8">
    <h3 class="heading" align="center">
      <?= __('EMPRESAS') ?>
	 </h3>
	
  <hr>
	

      

<br>
<div class="panel panel-primary" >
            
                 	 <div class="panel-heading" >
                   		 <div align="center">LISTA DE EMPRESAS</div>
                     </div>
                    <div class="panel-body">
                    <form  id="usuariospanel" name="usuarios_panel" class="form-sign signup" role="form" method="post">

                        <div class="form-horizontal">
                          <div class="control-group row-fluid form-inline">
                            <label for="name" class="control-label">
                            <p class="text-info">DESCRIPCIÓN&nbsp;<i class="icon-star"></i>
                              <input type="search" id="descripcion" placeholder="Descripción" class="span3" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                              <button type="button" class="btn btn-primary">Buscar</button></p>
                                 
                 
                          </div>
                          </div> 
                          
                        <div class="table-responsive">
                      
                        <table id="demoTable1">
                          <thead>
                            <tr>
                              <th sort="index" style="text-align: center">CODIGO</th>
                              <th sort="description"  style="text-align: center">NOMBRE</th>
                              <th sort="description"  style="text-align: center">RAZÓN SOCIAL</th>
                              <th sort="description"  style="text-align: center">ACTIVIDAD ECÓNOMICA</th>
                              <th sort="description"  style="text-align: center">DEPARTAMENTO</th>
                              <th sort="description"  style="text-align: center">PROVINCIA</th>
                              <th sort="description"  style="text-align: center">DISTRITO</th>
                              <th sort="description"  style="text-align: center">DIRECCIÓN</th>
                              <th sort="beds" style="text-align: center">TELÉFONO 1</th>
                              <th sort="beds" style="text-align: center">TELÉFONO 2</th>
                              <th sort="description" style="text-align: center">CONTACTO</th>
                              <th style="text-align: center">EDIT</th>
                              <th style="text-align: center">ELIMINAR</th>
                              </tr>
                            </thead>
                          <tbody>
                            
                            <?php  foreach ($EmpTab as $EmpTab): ?>
                            <tr  align="center">
                              <td><?= strtoupper($EmpTab->cod_empresa)?></td>
                              <td><?= strtoupper($EmpTab->nom_empresa)?></td>
                              <td><?= strtoupper($EmpTab->razon_social_empresa)?></td>
                              <td><?= strtoupper($EmpTab->actividad_economica_empresa)?></td>
                              <td><?= strtoupper($EmpTab->departamento_empresa)?></td>
                              <td><?= strtoupper($EmpTab->provincia_empresa)?></td>
                              <td><?= strtoupper($EmpTab->distrito_empresa)?></td>
                              <td><?= strtoupper($EmpTab->direccion_empresa)?></td>
                              <td><?= $EmpTab->telefono_empresa?></td>
                              <td><?= $EmpTab->telefono2_empresa?></td>
                              <td><?= strtoupper($EmpTab->contacto_empresa)?></td>
                           	  
                              <td><button id="btneditar_empresa<?= $EmpTab->cod_empresa?>" name="editE<?= $EmpTab->cod_empresa?>" type="submit" class="btn btn-default" value="<?= $EmpTab->cod_empresa?>" >
                                <span class="glyphicon glyphicon-edit"></span>
                                </button></td>
                                
                                
                              <td><button id="btncancelar_empresa<?= $EmpTab->cod_empresa?>" name="deleteE<?= $EmpTab->cod_empresa?>" type="submit" class="btn btn-default" value="<?= $EmpTab->cod_empresa?>">
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
                       <button id="" name="create_usuario" type="submit" class="btn btn-primary" >CREAR EMPRESA
                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>                        
                          <span  id="btnExportar" style="cursor:pointer"><img title="EXPORTAR A EXCEL" src="/serhas/media/serhas/img/excel.jpg" width="38" height="39" ></span>
                      </form>
                </div> 

          
 <form  id="edity_usuario" name="edity_usuario" class="form-sign signup" role="form" method="post">
          <?php  foreach ($EmpEdit as $EmpEdit): ?>
			  <?php  if (isset($_POST['editE'.$EmpEdit->cod_empresa])): ?>
				  <?php if ($EmpEdit->cod_empresa == $_POST['editE'.$EmpEdit->cod_empresa]): ?>
					                        
          
          
          <div id="edit_emp" style="display:block">
             <div class="panel panel-primary" >
            <div class="panel-heading">
              <div align="center">EDITAR EMPRESA</div>
              </div>
              </div>
            
            <div class="panel-body">
              <div class="form-horizontal">
                <div class="control-group row-fluid form-inline" >
                  
                    <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">DEPARTAMENTO: </span>    </label>
                    <select style="width:166px" name="departamento" id="departamento" class="form-control control-sign placeholder" required>
                      <?= HTML::default_option('DEPARTAMENTO') ?>
                     <?php foreach ($ubigeodep as $keyS => $valS): ?>
                      <option value="<?= $keyS ?>" <?php if($keyS == $EmpEdit->departamento_empresa) echo " selected"?>><?= __(strtoupper($valS)) ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  
                  <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">PROVINCIA: </span>    </label>
                    <select style="width:166px" name="provincia"  id="provincia" class="form-control control-sign placeholder" disabled="false" required>
                      <?= HTML::default_option('PROVINCIA') ?>
                      
                      <?php foreach ($ubigeopro as $ubigeopro): ?>
						 	 <?php if ($ubigeopro->cod_departamento == $EmpEdit->departamento_empresa): ?>
                           		 <option value="<?= $ubigeopro->cod_provincia ?>" <?php if($ubigeopro->cod_provincia == $EmpEdit->provincia_empresa) echo " selected"?>><?= __(strtoupper($ubigeopro->nom_provincia)) ?></option>                  
                                
                             <?php endif ?>
                      <?php endforeach ?>
                      </select><img id="loadingp" style="display:none" src="/serhas/media/serhas/img/loading.gif" width="25" height="28" ></div>
                  
                  <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">DISTRITO: </span>    </label>
                    <select style="width:166px" name="distrito" id="distrito" class="form-control control-sign placeholder" required>
                      <?= HTML::default_option('DISTRITO') ?>
                      <?php foreach ($ubigeodis as $ubigeodis): ?>
						 	 <?php if ($ubigeodis->cod_departamento == $EmpEdit->departamento_empresa): ?>
                            	 <?php if ($ubigeodis->cod_provincia == $EmpEdit->provincia_empresa): ?>
                           		 <option value="<?= $ubigeodis->cod_distrito ?>" <?php if($ubigeodis->cod_distrito == $EmpEdit->distrito_empresa) echo " selected"?>><?= __(strtoupper($ubigeodis->nom_distrito)) ?></option>                  
                             
                             	<?php endif ?>
							 <?php endif ?>
                      <?php endforeach ?>
                    </select><img id="loadingd" style="display:none" src="/serhas/media/serhas/img/loading.gif" width="25" height="28">
                  </div>
            
                  <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">NOMBRE ALUMNO: </span>    </label>
                        <input name="nom_emp" type="text" id="nom_emp" placeholder="NOMBRE EMPRESA" class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Nombre" required value="<?= $EmpEdit->nom_empresa ?>">
	                </div>
                      
                    <div>  
                      <label for="name" class="labelrange">
                       <span class="text-info">RAZÓN SOCIAL: </span> </label>
                        <input align="right" name="razon_social" type="text" id="razon_social" placeholder="RAZÓN SOCIAL" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Razon Social" required value="<?= $EmpEdit->razon_social_empresa ?>">
                      </div>
                      
                    <div>  
                      <label for="name" class="labelrange">
                       <span class="text-info">ACTIVIDAD ECONÓMICA:</span> </label>
                        <input align="right" name="act_economica" type="text" id="act_economica" placeholder="ACTIVIDAD ECONÓMICA" class="inputrange" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Actividad E." required value="<?= $EmpEdit->actividad_economica_empresa ?>">
                 </div>
                     
                   
                       
                      <div> 
                      <label for="name" class="labelrange">
                      <span class="text-info">DIRECCIÓN: </span>    </label>
                        <input align="right" name="direc_empresa" type="text" id="direc_empresa" placeholder="DIRECCIÓN" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Dirección" required value="<?= $EmpEdit->direccion_empresa ?>">
                      </div>
                      
                      <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">TELÉFONO: </span>    </label>
                        <input align="right" name="telf_empresa" type="text" id="telf_empresa" placeholder="TELÉFONO" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Telefono" required value="<?= $EmpEdit->telefono_empresa ?>">
                      </div>
                      
                      <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">TELÉFONO 2 (opcional): </span>    </label>
                        <input align="right" name="telf_empresa2" type="text" id="telf_empresa2" placeholder="TELÉFONO (Opcional)" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Telefono 2" value="<?= $EmpEdit->telefono2_empresa ?>">
                      </div>
                
                      
                      
                     <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">CONTACTO: </span>    </label>
                     <input align="right" name="contacto_empresa" type="text"  id="contacto_empresa" placeholder="CONTACTO" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Contacto" value="<?= $EmpEdit->contacto_empresa ?>">
                      </div>
                  
                   <br>
       			
                  <button id="cancel_empeditU" name="cancel_editU" type="submit" class="btn btn-primary" >Cancelar</button>
                  <button name="editar_empresa" type="submit" class="btn btn-primary" value="<?= $EmpEdit->cod_empresa?>">Guardar</button>
                
             
                  
                 
                  </div>
                </div>
              </div>
          </div>
          
          <?php endif ?>  
          
          <?php endif ?>    
          
          <?php endforeach ?>
          </form>	<!--EDITAR USUARIO-->
          
          
           <?php  if (isset($_POST['create_usuario'])): ?>
              <div id="new_emp" class="panel panel-primary" style="display:block">
                <div class="panel-heading">
                  <div align="center">NUEVA EMPRESA</div>
                  </div>
                
                <div class="panel-body">
                <form name="form_usuario" class="form-sign signup" role="form" method="post">
                  <div class="form-horizontal">
                    <div class="control-group row-fluid form-inline" >
                      
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
                      <span class="text-info">NOMBRE EMPRESA: </span>    </label>
                        <input name="nom_emp" type="text" id="nom_emp" placeholder="NOMBRE EMPRESA" class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Nombre" required>
	                </div>
                      
                    <div>  
                      <label for="name" class="labelrange">
                       <span class="text-info">RAZÓN SOCIAL: </span> </label>
                        <input align="right" name="razon_social" type="text" id="razon_social" placeholder="RAZÓN SOCIAL" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Razon Social" required>
                      </div>
                      
                    <div>  
                      <label for="name" class="labelrange">
                       <span class="text-info">ACTIVIDAD ECO.:</span> </label>
                        <input align="right" name="act_economica" type="text" id="act_economica" placeholder="ACTIVIDAD ECONÓMICA" class="inputrange" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Actividad E." required>
                 </div>
                     
                    
                       
                      <div> 
                      <label for="name" class="labelrange">
                      <span class="text-info">DIRECCIÓN: </span>    </label>
                        <input align="right" name="direc_empresa" type="text" id="direc_empresa" placeholder="DIRECCIÓN" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Dirección" required>
                      </div>
                      
                      <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">TELÉFONO: </span>    </label>
                        <input align="right" name="telf_empresa" type="tel" maxlength="9" id="telf_empresa" placeholder="TELÉFONO" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Telefono" required>
                      </div>
                      
                      <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">TELÉFONO 2 (OPCIONAL): </span>    </label>
                        <input align="right" name="telf_empresa2" type="tel" maxlength="9" id="telf_empresa2" placeholder="TELÉFONO (Opcional)" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Telefono 2">
                      </div>
                
                      
                      
                     <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">CONTACTO: </span>    </label>
                     <input align="right" name="contacto_empresa" type="text"  id="contacto_empresa" placeholder="CONTACTO" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Contacto">
                      </div>
                      
                      
                      
                     <br>
                  
                    
                       <?php foreach ($contEmp as $keycont => $valcont): ?>
							   <?php $valEmp = $keycont+1; ?>
                      <?php endforeach ?>
                 
                      <?php if(empty($valEmp)): ?>
							   <?php $valEmp = 1; ?>
                      <?php endif ?>
                      
                      <?php foreach ($subcatalogo as $keyEm => $valEm): ?>
                          <?PHP $contSub = $keyEm ?>
                      <?php endforeach ?>
                      
                      
                      <?php if(empty($contSub)): ?>
							   <?php $contSub = 0; ?>
                      <?php endif ?>
                      
                      <input type="text" name="contsub" value="<?= $contSub ?>" hidden>
                      
                      <button id="cancel_emp" name="cancel_usuario" type="reset" class="btn btn-primary" value="">Cancelar</button>
                      <button name="crear_empresa" type="submit" class="btn btn-primary" value="<?= $valEmp ?>">Guardar</button>
                 
                      </div>
                    </div>
                    
                    </form>  
                </div>
            
            </div>  
             <?php  endif ?>                                               
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
              
<div id="dvDataEmp" style="display:none">
                        <table border="2px solid #000000">
                     		<caption>
                     		<strong>LISTA DE EMPRESAS</strong>
                     		</caption>
                           	 <tr>
                              <th bgcolor="#8EBFF0">CODIGO</th>
                              <th bgcolor="#8EBFF0">NOMBRE</th>
                              <th bgcolor="#8EBFF0">RAZON SOCIAL</th>
                              <th bgcolor="#8EBFF0">ACTIVIDAD ECONOMICA</th>
                              <th bgcolor="#8EBFF0">DEPARTAMENTO</th>
                              <th bgcolor="#8EBFF0">PROVINCIA</th>
                              <th bgcolor="#8EBFF0">DISTRITO</th>
                              <th bgcolor="#8EBFF0">DIRECCION</th>
                              <th bgcolor="#8EBFF0">TELEFONO 1</th>
                              <th bgcolor="#8EBFF0">TELEFONO 2</th>
                              <th bgcolor="#8EBFF0">CONTACTO</th>
                              </tr>
                  
                          <tbody>
                            
                            <?php  foreach ($EmpExcel as $EmpExcel): ?>
                            <tr  align="center">
                              <td><?= strtoupper($EmpExcel->cod_empresa)?></td>
                              <td><?= strtoupper($EmpExcel->nom_empresa)?></td>
                              <td><?= strtoupper($EmpExcel->razon_social_empresa)?></td>
                              <td><?= strtoupper($EmpExcel->actividad_economica_empresa)?></td>
                              <td><?= strtoupper($EmpExcel->departamento_empresa)?></td>
                              <td><?= strtoupper($EmpExcel->provincia_empresa)?></td>
                              <td><?= strtoupper($EmpExcel->distrito_empresa)?></td>
                              <td><?= strtoupper($EmpExcel->direccion_empresa)?></td>
                              <td><?= $EmpExcel->telefono_empresa?></td>
                              <td><?= $EmpExcel->telefono2_empresa?></td>
                              <td><?= strtoupper($EmpExcel->contacto_empresa)?></td>
                              </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
</div> <!--EXPORT EXCEL-->

