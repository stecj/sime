<meta charset="utf-8">
    <h3 class="heading" align="center">
      <?= __('TIPO DE DENOMINACION') ?>
	    </h3>
	
  <hr>


<br>
<div class="panel panel-primary" >
            
                 	 <div class="panel-heading" >
                   		 <div align="center">LISTA DE DENOMINACIONES</div>
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
                              <th sort="description"  style="text-align: center">NOMBRE</th>
                              <th sort="beds"  style="text-align: center">PASAJE</th>
                              <th sort="beds"  style="text-align: center">ALIMENTO</th>
                              <th sort="beds"  style="text-align: center">SUELDO</th>
                              <th style="text-align: center">EDIT</th>
                              <th style="text-align: center">ELIMINAR</th>
                              </tr>
                            </thead>
                          <tbody>
                            
                            <?php  foreach ($DenoTipo as $DenoTipo): ?>
                            <tr  align="center">
                              <td><?= strtoupper($DenoTipo->cod_denominacion)?></td>
                              <td><?= strtoupper($DenoTipo->nom_denominacion)?></td>
                              <td><?= $DenoTipo->pasaje_denominacion?></td>
                              <td><?= $DenoTipo->alimento_denominacion?></td>
                              <td><?= $DenoTipo->sueldo_denominacion?></td>
                              <td><button id="btneditar_usuario<?= $DenoTipo->cod_denominacion?>" name="editDeno<?= $DenoTipo->cod_denominacion?>" type="submit" class="btn btn-default" value="<?= $DenoTipo->cod_denominacion?>" >
                                <span class="glyphicon glyphicon-edit"></span>
                                </button></td>
                                
                                
                              <td><button id="btncancelar_usuario<?= $DenoTipo->cod_denominacion?>" name="delDeno<?= $DenoTipo->cod_denominacion?>" type="submit" class="btn btn-default" value="<?= $DenoTipo->cod_denominacion?>">
                                <span class="glyphicon glyphicon-remove"></span>
                                </button></td>
                              
                              </tr>
                            <?php endforeach ?>
                            </tbody>
                             <tfoot class="nav">
                                    <tr>
                                            <td colspan=7>
                                                    <div class="pagination"></div>
                                                    <div class="paginationTitle">Página:</div>
                                                    <div class="selectPerPage"></div>
                                                    <div class="status"></div>
                                            </td>
                                    </tr>
                   			 </tfoot>
                        </table>
                        
                      </div>	<!--TABLA USUARIO--> 
                       <button id="create_denominacion" name="create_denominacion" type="button" class="btn btn-primary" >CREAR TIPO DENOMINACION
                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>                        
                      </form>
                </div> 

          
 <form  id="edity_denominacion" name="edity_denominacion" class="form-sign signup" role="form" method="post">
          <?php  foreach ($DenoTipoE as $DenoTipoE): ?>
			  <?php  if (isset($_POST['editDeno'.$DenoTipoE->cod_denominacion])): ?>
				  <?php if ($DenoTipoE->cod_denominacion == $_POST['editDeno'.$DenoTipoE->cod_denominacion]): ?>
					  
                      
          
          
          <div id="edit_denominacion" style="display:block">
             <div class="panel panel-primary" >
            <div class="panel-heading">
              <div align="center">EDITAR TIPO DE DENOMINACIÓN</div>
              </div>
              </div>
            
            <div class="panel-body">
              <div class="form-horizontal">
                <div class="control-group row-fluid form-inline" >
                  
                  
                  <div>  
                      <label for="name" class="labelrange">
                       <span class="text-info">NOMBRE: </span> </label>
                        <input align="right" name="nom_deno" type="text" id="input_usu" placeholder="NOMBRE" class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Nombre" value="<?= $DenoTipoE->nom_denominacion?>" required>
                      </div>
                      
                      
                	<div>  
                      <label for="name" class="labelrange">
                       <span class="text-info">PASAJE: </span> </label>
                        <input align="right" name="pasaje_deno" type="number" step="any" id="input_nom" placeholder="PASAJE" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Pasaje" value="<?= $DenoTipoE->pasaje_denominacion?>" required>
                     </div>
                     
                      
                      <div>  
                      <label for="name" class="labelrange">
                       <span class="text-info">ALIMENTO:  </span> </label>
                      <input align="right" name="alimento_deno" type="number" step="any"  id="input_nom" placeholder="ALIMENTO" class="inputrange" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Alimento" value="<?= $DenoTipoE->alimento_denominacion?>" required>
               		</div>
                      
                     <div>  
                      <label for="name" class="labelrange">
                       <span class="text-info">SUELDO: </span> </label>
                        <input align="right" name="sueldo_deno" type="number" step="any"  id="input_dni" placeholder="SUELDO" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Sueldo"value="<?= $DenoTipoE->sueldo_denominacion?>"  required>
    				</div>
                    
                  
                  
                   <br>
       			
                  <button id="cancel_editDeno" name="cancel_editU" type="submit" class="btn btn-primary" >Cancelar</button>
                  <button name="editar_denominacion" type="submit" class="btn btn-primary" value="<?= $DenoTipoE->cod_denominacion?>">Guardar</button>
                
             
                  
                 
                  </div>
                </div>
              </div>
          </div>
          
          <?php endif ?>  
          
          <?php endif ?>    
          
          <?php endforeach ?>
          </form>	<!--EDITAR USUARIO-->
          
          
           
              <div id="new_denominacion" class="panel panel-primary" style="display:none">
                <div class="panel-heading">
                  <div align="center">NUEVO TIPO DE DENOMINACIÓN</div>
                  </div>
                
                <div class="panel-body">
                <form name="form_usuario" class="form-sign signup" role="form" method="post">
                  <div class="form-horizontal">
                    <div class="control-group row-fluid form-inline" >
                  
                      
                    <div>  
                      <label for="name" class="labelrange">
                       <span class="text-info">NOMBRE: </span> </label>
                        <input align="right" name="nom_deno" type="text" id="input_usu" placeholder="NOMBRE" class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Nombre" required>
                      </div>
                      
                      
                	<div>  
                      <label for="name" class="labelrange">
                       <span class="text-info">PASAJE: </span> </label>
                        <input align="right" name="pasaje_deno" type="number" step="any" id="input_nom" placeholder="PASAJE" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Pasaje" required>
                     </div>
                     
                      
                      <div>  
                      <label for="name" class="labelrange">
                       <span class="text-info">ALIMENTO:  </span> </label>
                      <input align="right" name="alimento_deno" type="number" step="any" id="input_nom" placeholder="ALIMENTO" class="inputrange" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Alimento" required>
               		</div>
                      
                     <div>  
                      <label for="name" class="labelrange">
                       <span class="text-info">SUELDO: </span> </label>
                        <input align="right" name="sueldo_deno" type="number" step="any" id="input_dni" placeholder="SUELDO" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Sueldo" required>
    				</div>
    
			
                      
                      <button id="cancel_denominacion" name="cancel_usuario" type="reset" class="btn btn-primary" value="">Cancelar</button>
                      <button name="crear_denominacion" type="submit" class="btn btn-primary">Guardar</button>
                 
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