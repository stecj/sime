<meta charset="utf-8">
    <h3 class="heading" align="center">
      <?= __('CATALOGO') ?>
	   </h3>
	
  <hr>

      

  
<br>
<div id="tabs">
  <!-- Nav tabs -->
  <ul id="nav_tab" class="nav nav-tabs" role="tablist">  <!--style="margin: 0 0 0 38%;" MEDIO-->
    
    
    
   
    
    <li class="active"><a href="#CATALOGO" role="tab" data-toggle="tab">CATÁLOGO</a></li>
   <li ><a href="#VERCATALOGO" role="tab" data-toggle="tab">VER CATÁLOGOS</a></li>
   
  </ul>
  
  <!-- Tab panes -->
  <div  class="tab-content">

   
    	<div class="tab-pane active" id="CATALOGO">
  
 
          <form class="form-sign signup" role="form" method="post">
            
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <div align="center">LISTA DE CATALOGOS</div>
                    </div>
                  <div class="panel-body">
                    <div class="form-horizontal">
                      <div class="control-group row-fluid form-inline">
                        
                   
                        <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">EMPRESA: </span>    </label>
                        <select style="width:166px" id="selectempresa" name="select_empresa" class="form-control control-sign placeholder" required>
                          <?= HTML::default_option('EMPRESA') ?>
                          <?php foreach ($empresa as $keyEm => $valEm): ?>
                          <option  value="<?= $keyEm ?>"><?= __(strtoupper($valEm)) ?></option>
                          <?php endforeach ?>
                      </select>		<!--SELECT EMPRESA-->
              
                      <?php foreach ($empCatalogo as $keyEm => $valEm): ?>
                          <?PHP $contSub = $keyEm ?>
                      <?php endforeach ?>
                      
                      
                      <?php if(empty($contSub)): ?>
							   <?php $contSub = 0; ?>
                      <?php endif ?>
                      
                      <button name="editar_subcatalogo" type="submit" class="btn btn-primary" value="<?= $contSub ?>">GUARDAR</button></p>
                      </div>
              
                    
                
                      </div>
                      </div>
                    </div>
              
                  
                          <div id="collapseCat" class="panel panel-default" style="display:block">
                            
                            <!--COLLAPSE 1-->
                        
                             <?php foreach ($catalogo as $keyCat => $valCat): ?>
                             <?php $num = 1; ?>
                            <div class="panel-heading" role="tab" id="heading<?=__($keyCat)?>">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=__($keyCat)?>" aria-expanded="true" aria-controls="collapse<?=__($keyCat)?>">
                                 <span class="glyphicon glyphicon-th-list"></span> <?= $valCat ?>
                                </a>
                              </h4>
                              </div>
                              
                                <div id="collapse<?=__($keyCat)?>" class="panel-collapse collapse in"   role="tabpanel" aria-labelledby="heading<?=__($keyCat)?>">
                                  <div class="panel-body">
                                  
                                    <div class="table-responsive">
                                      
                                        <!--ARRAY DE SUBMENUS-->
                                      
                                      
                                      <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                          <tr>
                                            <th style="text-align: center">N°</th>
                                            <th style="text-align: center">DESCRIPCION</th>
                                            <th style="text-align: center">INSCRIPCION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php foreach ($subcatalogo as $keysub => $valsub): ?>
                                                  <?php foreach ($recorrido as $keyR => $valR): ?>
                                                  	<?php foreach ($empCatalogo as $keyCheck => $valCheck): ?>
															<?php if( $valR  == $keyCat): ?>
                                                                <?php if( $keysub  == $keyR): ?>
                                                        	    	<?php if( $keysub  == $keyCheck): ?>
                                                                  <tr  align="center">
                                                                    <td><?= $num ?></td>
                                                                    <td><?= $valsub ?></td>
                                                                    <td>
                                                                      <?php  if ($valCheck == 1): ?>
                                                                      <input class="checkbox<?=$keyCheck?>" type="checkbox" name="checkview[<?=$keyCheck?>]" checked/ >
                                                                      <?php else: ?>
                                                                      <input class="checkbox<?=$keyCheck?>" type="checkbox" name="checkview[<?=$keyCheck?>]" / >
                                                                      <?php endif ?>
                                                                    </td>
                                                                    </tr>
                                                                    <?php $num++; ?>
                                                             		<?php endif?>
                                                                 <?php endif?>
                                                         <?php endif?>
                                       				 <?php endforeach ?>
                                              <?php endforeach ?>
                                         
                                       <?php endforeach ?>
                                        
                                          </tbody>
                                        </table>
                                    </div>
                                    
                                  </div>
                                </div>
                            
                           
                            <?php endforeach ?>
                            
                          </div>  <!--PANEL DEFAULT-->
                          
                          
                  
                  
                </div>
            		<button id="createcatalogo" name="" type="submit" class="btn btn-primary" >CREAR CATALOGO
                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>    
                    <button id="createsubcatalogo" name="" type="submit" class="btn btn-primary" >CREAR SUB-CATALOGO
                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>                      
                        
                          
                          
                          
          </form>  	 <!--PANEL PERMISOS-->
          
       <div id="new_subcatalogo" class="panel panel-primary" style="display:none">
                <div class="panel-heading">
                  <div align="center">NUEVO SUBCATALOGO</div>
                  </div>
                
                <div class="panel-body">
              <form name="form_usuario" class="form-sign signup" role="form" method="post">
                  <div class="form-horizontal">
                    <div class="control-group row-fluid form-inline" >
                    
                    <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">CATÁLOGO: </span>    </label>
                        <select style="width:166px" id="selectcatalogo" name="select_catalogo" class="form-control control-sign placeholder" required>
                          <?= HTML::default_option('CATALOGO') ?>
                          <?php foreach ($catalogo as $keyEm => $valEm): ?>
                          <option  value="<?= $keyEm ?>"<?php if(isset($_POST['crear_catalogo'])){if($keyEm == $_POST['select_catalogo'])echo " selected";}?>><?= __(strtoupper($valEm)) ?></option>
                          <?php endforeach ?>
                      </select>		<!--SELECT PERFIL-->
                      </div>
                    
                    
              		  <div>  
                      <label for="name" class="labelrange">
                       <span class="text-info">SUBCATÁLOGO: </span> </label>
                        <input align="right" name="nom_subcatalogo" type="text" id="input_nom" placeholder="SUBCATALOGO" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Nombre" required>
                     </div>
   
   		
                      
                     <br>
                   
                      <button id="cancel_subcatalogo" name="cancel_subcatalogo" type="reset" class="btn btn-primary" value="">Cancelar</button>
                      <button name="crear_subcatalogo" type="submit" class="btn btn-primary">Guardar</button>
                 
                      </div>
                    </div>
                    </form>
                   
                </div>
            
            </div>
      
      <div id="new_catalogo" class="panel panel-primary" style="display:none">
                <div class="panel-heading">
                  <div align="center">NUEVO CATALOGO</div>
                  </div>
                
                <div class="panel-body">
                <form name="form_usuario" class="form-sign signup" role="form" method="post">
                  <div class="form-horizontal">
                    <div class="control-group row-fluid form-inline" >
                    
              		  <div>  
                      <label for="name" class="labelrange">
                       <span class="text-info">CATÁLOGO: </span> </label>
                        <input align="right" name="nom_catalogo" type="text" id="input_nom" placeholder="CATALOGO" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Nombre" required>
                     </div>
                     
                      
                      
                      
                     <br>
                   
                      
                      <button id="cancel_catalogo" name="cancel_catalogo" type="reset" class="btn btn-primary" value="">Cancelar</button>
                      <button name="crear_catalogo" type="submit" class="btn btn-primary" >Guardar</button>
                 
                      </div>
                    </div>
                    
                    </form>  
                </div>
            
            </div>
            
           
      
      </div> 	<!--TAB 1 PANEL -->
      
     	<div class="tab-pane" id="VERCATALOGO">
  
 
          <form class="form-sign signup" role="form" method="post">
            
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <div align="center">BUSQUEDA DE CATALOGOS</div>
                    </div>
                  <div class="panel-body">
                    <div class="form-horizontal">
                      <div class="control-group row-fluid form-inline">
                        
                   
                          
                         <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">DESTINO: </span>    </label>
                        <select style="width:166px" id="select_perfilus" name="perfiles" class="form-control control-sign placeholder" required>
                          <?= HTML::default_option('TIPO DE DESTINO') ?>
                          <?php foreach ($empresa as $keyEm => $valEm): ?>
                          <option  value="<?= $keyEm ?>"><?= __(strtoupper($valEm)) ?></option>
                          <?php endforeach ?>
                      </select>		<!--SELECT PERFIL-->
                      <button type="button" class="btn btn-primary">Buscar</button></p>
                      </div>
                      
                      
                         <div class="table-responsive">
                      
                        <table id="demoTable1">
                          <thead>
                            <tr>
                              <th sort="index" style="text-align: center">CODIGO</th>
                              <th sort="description"  style="text-align: center">RAZÓN SOCIAL</th>
                              <th style="text-align: center">EDIT</th>
                              <th style="text-align: center">ELIMINAR</th>
                              </tr>
                            </thead>
                          <tbody>
                            
                            <?php  foreach ($EmpTab as $EmpTab): ?>
                            <tr  align="center">
                              <td><?= strtoupper($EmpTab->cod_empresa)?></td>
                              <td><?= strtoupper($EmpTab->razon_social_empresa)?></td>
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
                     
                      </div>
                        
                      </div>
                      </div>
                    </div>
                  
                  
                       
                  
                  
                </div>
            
          </form>  	 <!--PANEL PERMISOS-->
      
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
