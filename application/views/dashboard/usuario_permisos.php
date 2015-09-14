<meta charset="utf-8">
    <h3 class="heading" align="center">
      <?= __('USUARIOS Y PERMISOS') ?>
	 </h3>
	
  <hr>
	

  
<br>
<div id="tabs">
  <!-- Nav tabs -->
  <ul id="nav_tab" class="nav nav-tabs" role="tablist">  <!--style="margin: 0 0 0 38%;" MEDIO-->
    
    	<li ><a href="#PERFILES" role="tab" data-toggle="tab">PERFILES</a></li>
    
   
    
    <li><a href="#PERMISOS" role="tab" data-toggle="tab">ASIGNACION DE PERMISOS</a></li>
    
       
    <?php  if(isset($_POST['editar_usuario']) || isset($_POST['crear_usuario'])): ?> 
  		 <li class="active"><a href="#USUARIOS" role="tab" data-toggle="tab">USUARIOS</a></li>
    <?php else: ?>
  		 <li><a href="#USUARIOS" role="tab" data-toggle="tab">USUARIOS</a></li>
    <?php endif ?>
    
    
    <?php if(isset($_POST['creare_sede'])): ?>
    	 <li class="active"><a href="#SEDE" role="tab" data-toggle="tab">SEDE</a></li>
 	<?php else:?>
    	<li><a href="#SEDE" role="tab" data-toggle="tab">SEDE</a></li>
    <?php endif ?>
   
  </ul>
  
  <!-- Tab panes -->
  <div  class="tab-content">
  
  <?php  $contp = 0 ?>
    <?php  foreach ($usTipoPerfil as $usTipoPerfil): ?>
    <?php  $contp = $contp+1  ?>
			  <?php  if(isset($_POST['editU'.$usTipoPerfil->id_usuario])): ?>
				  <?php if( $usTipoPerfil->id_usuario == $_POST['editU'.$usTipoPerfil->id_usuario]): ?>
                      <div class="tab-pane" id="PERFILES">
                        <?php  reset($usTipoPerfil); ?>
   		 	      <?php endif ?> 
              <?php  elseif(isset($_POST['deleteU'.$contp])): ?>
             		 <div class="tab-pane" id="PERFILES">   
                     <?php  reset($usTipoPerfil); ?>
   			  <?php endif ?>  
   	<?php endforeach ?> 
    
    <?php  if(isset($_POST['editar_permisos']) || isset($_POST['editar_usuario']) || isset($_POST['crear_usuario'])|| isset($_POST['creare_sede'])): ?>
    	<div class="tab-pane" id="PERFILES">
    <?php else: ?>
    	<div class="tab-pane active" id="PERFILES">
    <?php endif ?>
     
        <div class="panel panel-primary" >
          
          <div class="panel-heading" >
            <div align="center">LISTA DE PERFILES</div>
            </div>
            
           <div class="panel-body">
            <form name="form_new_perfil" class="form-sign signup" role="form" method="post">
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
                  <th sort="description" style="text-align: center">DESCRIPCIÓN</th>
                  <th style="text-align: center">EDITAR</th>
                  <th style="text-align: center">ELIMINAR</th>
                  </tr>
                </thead>
              
              <tbody>
                <?php  foreach ($pTipo as $key => $val): ?>
                <tr  align="center">
                  <td><?= $key?></td>
                  <td><?= strtoupper($val)?></td>
                  <td><button name="edit<?= $key?>" type="submit" class="btn btn-default" value="<?= $key?>">
                    <span class="glyphicon glyphicon-edit"></span>
                    </button></td>
                  <td><button name="del<?= $key?>" type="submit" class="btn btn-default" value="<?= $key?>">
                    <span class="glyphicon glyphicon-remove"></span>
                    </button></td>
                  </tr>
                <?php endforeach ?>
                
                </tbody>
                <tfoot class="nav">
                <tr>
                        <td colspan=4>
                                <div class="pagination"></div>
                                <div class="paginationTitle">Página:</div>
                                <div class="selectPerPage"></div>
                                <div class="status"></div>
                        </td>
                </tr>
        </tfoot>
            </table>	
            
            <button id="create_perfil" name="create_perfil" type="submit" class="btn btn-primary" >CREAR PERFIL
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
         		
            </div>	</form>	<!--TABLA PERFILES-->
   		</div>
         
          
          </div>     
        
        
        
         <form class="form-sign signup" role="form" method="post">
        <div id="new_perfil" class="panel panel-primary" style="display:none">
          <div class="panel-heading">
            <div align="center">NUEVO TIPO DE PERFIL</div>
          </div>
          <div class="panel-body">
            
            
            <div class="form-horizontal">
              <div class="control-group row-fluid form-inline">
                 <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">NOMBRE PERFIL: </span>    </label>
                <?php  foreach ($pTipo as $keyR => $nomR): ?>
                <?php $valper = $keyR+1 ?>
                <?php endforeach ?>
                  <input name="nom_perfil" type="text" id="descripcion" placeholder="descripción" class="textb1" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" autofocus title="Ingresar Nuevo Perfil" required>
                  <button id="cancel_perfil" name="cancel_perfil" type="reset" class="btn btn-primary" onClick="usuario_permisos">Cancelar</button>
                  <button name="crear_perfil" type="submit" class="btn btn-primary" value="<?= $valper?>">Guardar</button>
                  </div>
              </div>
              </div>
            </div>
          </div>
        
        </form>
        <form class="form-sign signup" role="form" method="post">
        <?php  foreach ($pTipo as $keyR => $nomR): ?>
        
        <?php  if (isset($_POST['edit'.$keyR])): ?>
        
        
        <div id="edit_perfil" class="editable">
          <?php if ($keyR == $_POST['edit'.$keyR]): ?>
          <div class="panel panel-primary" >
            <div class="panel-heading" >
              <div align="center">EDITAR PERFIL</div>
              </div>
            <div class="panel-body">
              
               <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">NOMBRE PERFIL: </span>    </label>
                <input name="nom_editar" type="text" id="change" placeholder="<?= $nomR?>" class="text" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?= $nomR?>" required>
                <button id="cancele_perfil" name="cancele_perfil" type="reset" class="btn btn-primary" onClick="usuario_permisos">Cancelar</button>
              <button id="editarPerfil" name="editarPerfil" type="submit" class="btn btn-primary" value="<?= $keyR ?>">Guardar</button>
              </div>
              </div>
          </div>
          <?php endif ?> 
          </div>
        <?php endif ?>                          
        <?php endforeach ?>
        
        </form>		<!--FORMULARIO EDITAR-->
        
        <?php  $contpf = 0 ?>
        <?php  foreach ($usTipoPerfildiv as $usTipoPerfildiv): ?>
        <?php  $contpf = $contpf+1  ?>
			  <?php  if (isset($_POST['editU'.$usTipoPerfildiv->id_usuario])): ?>
				  <?php if (($usTipoPerfildiv->id_usuario == $_POST['editU'.$usTipoPerfildiv->id_usuario])): ?>
         			</div>
                    <?php  reset($usTipoPerfildiv); ?>
	         <?php endif ?>  
              <?php  elseif(isset($_POST['deleteU'.$contpf])): ?> 
              </div>
               <?php  reset($usTipoPerfildiv); ?>
   			<?php endif ?>    
   	<?php endforeach ?> 
      </div>		<!--TAB 1 PANEL -->
    
   
    
    <?php if(isset($_POST['editar_permisos'])): ?>
    	<div class="tab-pane active" id="PERMISOS">
 	<?php else:?>
    	<div class="tab-pane" id="PERMISOS">
    <?php endif ?>
 
      <form class="form-sign signup" role="form" method="post">
        
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div align="center">ASIGNACIÓN DE PERMISOS</div>
            </div>
          <div class="panel-body">
            <div class="form-horizontal">
              <div class="control-group row-fluid form-inline">
                
                
                <label for="name" class="control-label">
                <p class="text-info">Descripción&nbsp;<i class="icon-star"></i>
                  
                  <select id="select_permisos" name="perfiles_permisos" class="form-control control-sign placeholder">
                    <?= HTML::default_option('Tipo Perfil') ?>
                    <?php foreach ($pTipo as $keyD => $valD): ?>
                    <option value="<?= $keyD ?>"><?= __(strtoupper($valD)) ?></option>
                    <?php endforeach ?>
                   </select>
                  <button name="load_permisos"type="submit" class="btn btn-primary" >Load</button>
                  <button name="editar_permisos"type="submit" class="btn btn-primary" >Guardar</button></p>
                
              </div>
              </div>
            </div>
          
          
          <div class="panel panel-default">
            
            <!--COLLAPSE 1-->
            
            <div class="panel-heading" role="tab" id="heading1">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                 <span class="glyphicon glyphicon-th-list"></span> ADMINISTRACIÓN
                </a>
              </h4>
              </div>
            <div id="collapse1" class="panel-collapse collapse in"   role="tabpanel" aria-labelledby="heading1">
              <div class="panel-body">
                <div class="table-responsive">
                  
                  <?php  foreach ($submTipo as $keysub => $valsub): ?>
                  
                  <?php for ($i = 1; $i < 10; $i++) { 
						
						if($i == $keysub){							
							$submenu1[$i-1] = $valsub;
						}
				
					}
                ?>
                  <?php for ($i = 10; $i < 11; $i++) { 
					
						if($i == $keysub){							
							$submenu2[$i-10] = $valsub;
						}
					
					}
                ?>
                  <?php for ($i = 11; $i <= 18; $i++) { 
				
						if($i == $keysub){							
							$submenu3[$i-11] = $valsub;
						}
					
					}
                ?>
                  
                  <?php endforeach ?>   	<!--ARRAY DE SUBMENUS-->
                  
                  
                  <table class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th style="text-align: center">NÚMERO</th>
                        <th style="text-align: center">PROGRAMA</th>
                        <th style="text-align: center">VISUALIZAR</th>
                        <th style="text-align: center">AGREGAR</th>
                        <th style="text-align: center">EDITAR</th>
                        <th style="text-align: center">ELIMINAR</th>
                        <th style="text-align: center">AUDITAR</th>
                        <th style="text-align: center">TODO</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                      <?php  foreach ($psmTipo1 as $psmTipo1): ?>
                      
                      <tr  align="center">
                        <td><?= $psmTipo1->id_submenu_PER?></td>
                        
                        <td><?= $submenu1[($psmTipo1->id_submenu_PER)-1]?></td>
                        
                        <td>
                          <?php if ($psmTipo1->visualizar == 1): ?>
                          <input class="checkbox<?=$psmTipo1->id_PerfilMenu?>" type="checkbox" name="checkview1[<?= $psmTipo1->id_PerfilMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo1->id_PerfilMenu?>" type="checkbox" name="checkview1[<?= $psmTipo1->id_PerfilMenu?>]" / >
                          <?php endif ?>
                        </td>
                        <td>
                          <?php if ($psmTipo1->agregar == 1): ?>
                          <input class="checkbox<?=$psmTipo1->id_PerfilMenu?>" type="checkbox" name="checkadd1[<?= $psmTipo1->id_PerfilMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo1->id_PerfilMenu?>" type="checkbox" name="checkadd1[<?= $psmTipo1->id_PerfilMenu?>]"  / >
                          <?php endif ?>
                        </td> 
                        <td>
                          <?php if ($psmTipo1->editar == 1): ?>
                          <input class="checkbox<?=$psmTipo1->id_PerfilMenu?>" type="checkbox" name="checkedit1[<?= $psmTipo1->id_PerfilMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo1->id_PerfilMenu?>" type="checkbox" name="checkedit1[<?= $psmTipo1->id_PerfilMenu?>]" / >
                          <?php endif ?>
                        </td> 
                        <td>
                          <?php if ($psmTipo1->eliminar == 1): ?>
                          <input class="checkbox<?=$psmTipo1->id_PerfilMenu?>" type="checkbox" name="checkdel1[<?= $psmTipo1->id_PerfilMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo1->id_PerfilMenu?>" type="checkbox" name="checkdel1[<?= $psmTipo1->id_PerfilMenu?>]"  / >
                          <?php endif ?>
                        </td> 
                        
                        <td></td> 
                        <td>
                          
                          <input class="checkbox<?=$psmTipo1->id_PerfilMenu ?>" type="hidden" name="check<?= $psmTipo1->id_PerfilMenu?>" value="0" />
                          <input class="checkbox<?=$psmTipo1->id_PerfilMenu?>" type="checkbox" name="check<?= $psmTipo1->id_PerfilMenu?>" value="0" checked="1" / >
                          
                        </td>
                        </tr>
                      
                      <?php endforeach ?>
                      
                      </tbody>
                    <input type="text" name="valm1" value="<?= $psmTipo1->id_PerfilMenu ?>" hidden>
                    
                    
                    
                    </table>
                </div>
                
              </div>
              </div>
            
            
            <!--COLLAPSE 2-->	
            
            <div class="panel-heading" role="tab" id="heading2">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
                 <span class="glyphicon glyphicon-th-list"></span> ADMISIÓN
                </a>
                </h4>
              </div>
            <div id="collapse2" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading2">
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th style="text-align: center">NÚMERO</th>
                        <th style="text-align: center">PROGRAMA</th>
                        <th style="text-align: center">VISUALIZAR</th>
                        <th style="text-align: center">AGREGAR</th>
                        <th style="text-align: center">EDITAR</th>
                        <th style="text-align: center">ELIMINAR</th>
                        <th style="text-align: center">AUDITAR</th>
                        <th style="text-align: center">TODO</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php  foreach ($psmTipo2 as $psmTipo2): ?>
                      
                      <tr  align="center">
                        <td><?= $psmTipo2->id_submenu_PER?></td>
                        <td><?= $submenu2[$psmTipo2->id_submenu_PER-1]?></td>
                        
                        <td>
                          <?php if ($psmTipo2->visualizar == 1): ?>
                          <input class="checkbox<?=$psmTipo2->id_PerfilMenu?>" type="checkbox" name="checkview2[<?= $psmTipo2->id_PerfilMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo2->id_PerfilMenu?>" type="checkbox" name="checkview2[<?= $psmTipo2->id_PerfilMenu?>]" / >
                          <?php endif ?>
                        </td>
                        <td>
                          <?php if ($psmTipo2->agregar == 1): ?>
                          <input class="checkbox<?=$psmTipo2->id_PerfilMenu?>" type="checkbox" name="checkadd2[<?= $psmTipo2->id_PerfilMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo2->id_PerfilMenu?>" type="checkbox" name="checkadd2[<?= $psmTipo2->id_PerfilMenu?>]"  / >
                          <?php endif ?>
                        </td> 
                        <td>
                          <?php if ($psmTipo2->editar == 1): ?>
                          <input class="checkbox<?=$psmTipo2->id_PerfilMenu?>" type="checkbox" name="checkedit2[<?= $psmTipo2->id_PerfilMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo2->id_PerfilMenu?>" type="checkbox" name="checkedit2[<?= $psmTipo2->id_PerfilMenu?>]" / >
                          <?php endif ?>
                        </td> 
                        <td>
                          <?php if ($psmTipo2->eliminar == 1): ?>
                          <input class="checkbox<?=$psmTipo2->id_PerfilMenu?>" type="checkbox" name="checkdel2[<?= $psmTipo2->id_PerfilMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo2->id_PerfilMenu?>" type="checkbox" name="checkdel2[<?= $psmTipo2->id_PerfilMenu?>]"  / >
                          <?php endif ?>
                        </td> 
                        
                        <td></td> 
                        <td>
                          
                          <input class="checkbox<?=$psmTipo2->id_PerfilMenu ?>" type="hidden" name="check<?= $psmTipo2->id_PerfilMenu?>" value="0" />
                          <input class="checkbox<?=$psmTipo2->id_PerfilMenu?>" type="checkbox" name="check<?= $psmTipo2->id_PerfilMenu?>" value="0" checked="1" / >
                          
                        </td>
                        </tr>
                      <?php endforeach ?>
                      </tbody>
                    <input type="text" name="valm2" value="" hidden>
                    
                    </table>
                </div>
                
              </div>
              </div>
            
            <!--COLLAPSE 3-->	
            
            <div class="panel-heading" role="tab" id="heading3">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse3">
                 <span class="glyphicon glyphicon-th-list"></span> CAJA
                </a>
                </h4>
              </div>
            <div id="collapse3" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading3">
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th style="text-align: center">NÚMERO</th>
                        <th style="text-align: center">PROGRAMA</th>
                        <th style="text-align: center">VISUALIZAR</th>
                        <th style="text-align: center">AGREGAR</th>
                        <th style="text-align: center">EDITAR</th>
                        <th style="text-align: center">ELIMINAR</th>
                        <th style="text-align: center">AUDITAR</th>
                        <th style="text-align: center">TODO</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php  foreach ($psmTipo3 as $psmTipo3): ?>
                      
                      <tr  align="center">
                        <td><?= $psmTipo3->id_submenu_PER?></td>
                        <td><?= $submenu3[$psmTipo3->id_submenu_PER-1]?></td>
                        
                        <td>
                          <?php if ($psmTipo3->visualizar == 1): ?>
                          <input class="checkbox<?=$psmTipo3->id_PerfilMenu?>" type="checkbox" name="checkview3[<?= $psmTipo3->id_PerfilMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo3->id_PerfilMenu?>" type="checkbox" name="checkview3[<?= $psmTipo3->id_PerfilMenu?>]" / >
                          <?php endif ?>
                        </td>
                        <td>
                          <?php if ($psmTipo3->agregar == 1): ?>
                          <input class="checkbox<?=$psmTipo3->id_PerfilMenu?>" type="checkbox" name="checkadd3[<?= $psmTipo3->id_PerfilMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo3->id_PerfilMenu?>" type="checkbox" name="checkadd3[<?= $psmTipo3->id_PerfilMenu?>]"  / >
                          <?php endif ?>
                        </td> 
                        <td>
                          <?php if ($psmTipo3->editar == 1): ?>
                          <input class="checkbox<?=$psmTipo3->id_PerfilMenu?>" type="checkbox" name="checkedit3[<?= $psmTipo3->id_PerfilMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo3->id_PerfilMenu?>" type="checkbox" name="checkedit3[<?= $psmTipo3->id_PerfilMenu?>]" / >
                          <?php endif ?>
                        </td> 
                        <td>
                          <?php if ($psmTipo3->eliminar == 1): ?>
                          <input class="checkbox<?=$psmTipo3->id_PerfilMenu?>" type="checkbox" name="checkdel3[<?= $psmTipo3->id_PerfilMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo3->id_PerfilMenu?>" type="checkbox" name="checkdel3[<?= $psmTipo3->id_PerfilMenu?>]"  / >
                          <?php endif ?>
                        </td> 
                        
                        <td></td> 
                        <td>
                          
                          <input class="checkbox<?=$psmTipo3->id_PerfilMenu ?>" type="hidden" name="check<?= $psmTipo3->id_PerfilMenu?>" value="0" />
                          <input class="checkbox<?=$psmTipo3->id_PerfilMenu?>" type="checkbox" name="check<?= $psmTipo3->id_PerfilMenu?>" value="0" checked="1" / >
                          
                        </td>
                        </tr>
                      <?php endforeach ?>
                      </tbody>
                    <input type="text" name="valm3" value="" hidden>
                    
                    
                    </table>
                </div>
                
              </div>
              </div>
            
            <!--COLLAPSE 4-->	
            
            <div class="panel-heading" role="tab" id="heading4">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="true" aria-controls="collapse4">
                 <span class="glyphicon glyphicon-th-list"></span> FACTURACIÓN
                </a>
                </h4>
              </div>
            <div id="collapse4" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading4">
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th style="text-align: center">NÚMERO</th>
                        <th style="text-align: center">PROGRAMA</th>
                        <th style="text-align: center">VISUALIZAR</th>
                        <th style="text-align: center">AGREGAR</th>
                        <th style="text-align: center">EDITAR</th>
                        <th style="text-align: center">ELIMINAR</th>
                        <th style="text-align: center">AUDITAR</th>
                        <th style="text-align: center">TODO</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php  foreach ($psmTipo4 as $psmTipo4): ?>
                      
                      <tr  align="center">
                        <td><?= $psmTipo4->id_submenu_PER?></td>
                        <td><?= $submenu4[$psmTipo4->id_submenu_PER-1]?></td>
                        
                        <td>
                          <?php if ($psmTipo4->visualizar == 1): ?>
                          <input class="checkbox<?=$psmTipo4->id_PerfilMenu?>" type="checkbox" name="checkview3[<?= $psmTipo4->id_PerfilMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo4->id_PerfilMenu?>" type="checkbox" name="checkview3[<?= $psmTipo4->id_PerfilMenu?>]" / >
                          <?php endif ?>
                        </td>
                        <td>
                          <?php if ($psmTipo4->agregar == 1): ?>
                          <input class="checkbox<?=$psmTipo4->id_PerfilMenu?>" type="checkbox" name="checkadd3[<?= $psmTipo4->id_PerfilMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo4->id_PerfilMenu?>" type="checkbox" name="checkadd3[<?= $psmTipo4->id_PerfilMenu?>]"  / >
                          <?php endif ?>
                        </td> 
                        <td>
                          <?php if ($psmTipo4->editar == 1): ?>
                          <input class="checkbox<?=$psmTipo4->id_PerfilMenu?>" type="checkbox" name="checkedit3[<?= $psmTipo4->id_PerfilMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo4->id_PerfilMenu?>" type="checkbox" name="checkedit3[<?= $psmTipo4->id_PerfilMenu?>]" / >
                          <?php endif ?>
                        </td> 
                        <td>
                          <?php if ($psmTipo4->eliminar == 1): ?>
                          <input class="checkbox<?=$psmTipo4->id_PerfilMenu?>" type="checkbox" name="checkdel3[<?= $psmTipo4->id_PerfilMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo4->id_PerfilMenu?>" type="checkbox" name="checkdel3[<?= $psmTipo4->id_PerfilMenu?>]"  / >
                          <?php endif ?>
                        </td> 
                        
                        <td></td> 
                        <td>
                          
                          <input class="checkbox<?=$psmTipo4->id_PerfilMenu ?>" type="hidden" name="check<?= $psmTipo4->id_PerfilMenu?>" value="0" />
                          <input class="checkbox<?=$psmTipo4->id_PerfilMenu?>" type="checkbox" name="check<?= $psmTipo4->id_PerfilMenu?>" value="0" checked="1" / >
                          
                        </td>
                        </tr>
                      <?php endforeach ?>
                      </tbody>
                    </table>
                </div>
                
              </div>
              </div>
            
            
            <!--COLLAPSE 5-->	
            
            <div class="panel-heading" role="tab" id="heading5">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="true" aria-controls="collapse5">
                 <span class="glyphicon glyphicon-th-list"></span> ATENCIÓN
                </a>
                </h4>
              </div>
            <div id="collapse5" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading5">
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th style="text-align: center">NÚMERO</th>
                        <th style="text-align: center">PROGRAMA</th>
                        <th style="text-align: center">VISUALIZAR</th>
                        <th style="text-align: center">AGREGAR</th>
                        <th style="text-align: center">EDITAR</th>
                        <th style="text-align: center">ELIMINAR</th>
                        <th style="text-align: center">AUDITAR</th>
                        <th style="text-align: center">TODO</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php  foreach ($psmTipo5 as $psmTipo5): ?>
                      
                      <tr  align="center">
                        <td><?= $psmTipo5->id_submenu_PER?></td>
                        <td><?= $submenu5[$psmTipo5->id_submenu_PER-1]?></td>
                        
                        <td>
                          <?php if ($psmTipo5->visualizar == 1): ?>
                          <input class="checkbox<?=$psmTipo5->id_PerfilMenu?>" type="checkbox" name="checkview3[<?= $psmTipo5->id_PerfilMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo5->id_PerfilMenu?>" type="checkbox" name="checkview3[<?= $psmTipo5->id_PerfilMenu?>]" / >
                          <?php endif ?>
                        </td>
                        <td>
                          <?php if ($psmTipo5->agregar == 1): ?>
                          <input class="checkbox<?=$psmTipo5->id_PerfilMenu?>" type="checkbox" name="checkadd3[<?= $psmTipo5->id_PerfilMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo5->id_PerfilMenu?>" type="checkbox" name="checkadd3[<?= $psmTipo5->id_PerfilMenu?>]"  / >
                          <?php endif ?>
                        </td> 
                        <td>
                          <?php if ($psmTipo5->editar == 1): ?>
                          <input class="checkbox<?=$psmTipo5->id_PerfilMenu?>" type="checkbox" name="checkedit3[<?= $psmTipo5->id_PerfilMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo5->id_PerfilMenu?>" type="checkbox" name="checkedit3[<?= $psmTipo5->id_PerfilMenu?>]" / >
                          <?php endif ?>
                        </td> 
                        <td>
                          <?php if ($psmTipo5->eliminar == 1): ?>
                          <input class="checkbox<?=$psmTipo5->id_PerfilMenu?>" type="checkbox" name="checkdel3[<?= $psmTipo5->id_PerfilMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo5->id_PerfilMenu?>" type="checkbox" name="checkdel3[<?= $psmTipo5->id_PerfilMenu?>]"  / >
                          <?php endif ?>
                        </td> 
                        
                        <td></td> 
                        <td>
                          
                          <input class="checkbox<?=$psmTipo5->id_PerfilMenu ?>" type="hidden" name="check<?= $psmTipo5->id_PerfilMenu?>" value="0" />
                          <input class="checkbox<?=$psmTipo5->id_PerfilMenu?>" type="checkbox" name="check<?= $psmTipo5->id_PerfilMenu?>" value="0" checked="1" / >
                          
                        </td>
                        </tr>
                      <?php endforeach ?>
                      </tbody>
                    </table>
                </div>
                
              </div>
              </div>
            
            
            <!--COLLAPSE 6-->	
            
            <div class="panel-heading" role="tab" id="heading6">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="true" aria-controls="collapse6">
                 <span class="glyphicon glyphicon-th-list"></span> REPORTE
                </a>
                </h4>
              </div>
            <div id="collapse6" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading6">
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th style="text-align: center">NÚMERO</th>
                        <th style="text-align: center">PROGRAMA</th>
                        <th style="text-align: center">VISUALIZAR</th>
                        <th style="text-align: center">AGREGAR</th>
                        <th style="text-align: center">EDITAR</th>
                        <th style="text-align: center">ELIMINAR</th>
                        <th style="text-align: center">AUDITAR</th>
                        <th style="text-align: center">TODO</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php  foreach ($psmTipo6 as $psmTipo6): ?>
                      
                      <tr  align="center">
                        <td><?= $psmTipo6->id_submenu_PER?></td>
                        <td><?= $submenu6[$psmTipo6->id_submenu_PER-1]?></td>
                        
                        <td>
                          <?php if ($psmTipo6->visualizar == 1): ?>
                          <input class="checkbox<?=$psmTipo6->id_PerfilesMenu?>" type="checkbox" name="checkview3[<?= $psmTipo6->id_PerfilesMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo6->id_PerfilesMenu?>" type="checkbox" name="checkview3[<?= $psmTipo6->id_PerfilesMenu?>]" / >
                          <?php endif ?>
                        </td>
                        <td>
                          <?php if ($psmTipo6->agregar == 1): ?>
                          <input class="checkbox<?=$psmTipo6->id_PerfilesMenu?>" type="checkbox" name="checkadd3[<?= $psmTipo6->id_PerfilesMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo6->id_PerfilesMenu?>" type="checkbox" name="checkadd3[<?= $psmTipo6->id_PerfilesMenu?>]"  / >
                          <?php endif ?>
                        </td> 
                        <td>
                          <?php if ($psmTipo3->editar == 1): ?>
                          <input class="checkbox<?=$psmTipo6->id_PerfilesMenu?>" type="checkbox" name="checkedit3[<?= $psmTipo6->id_PerfilesMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo6->id_PerfilesMenu?>" type="checkbox" name="checkedit3[<?= $psmTipo6->id_PerfilesMenu?>]" / >
                          <?php endif ?>
                        </td> 
                        <td>
                          <?php if ($psmTipo3->eliminar == 1): ?>
                          <input class="checkbox<?=$psmTipo6->id_PerfilesMenu?>" type="checkbox" name="checkdel3[<?= $psmTipo6->id_PerfilesMenu?>]" checked/ >
                          <?php else: ?>
                          <input class="checkbox<?=$psmTipo6->id_PerfilesMenu?>" type="checkbox" name="checkdel3[<?= $psmTipo6->id_PerfilesMenu?>]"  / >
                          <?php endif ?>
                        </td> 
                        
                        <td></td> 
                        <td>
                          
                          <input class="checkbox<?=$psmTipo6->id_PerfilesMenu ?>" type="hidden" name="check<?= $psmTipo6->id_PerfilesMenu?>" value="0" />
                          <input class="checkbox<?=$psmTipo6->id_PerfilesMenu?>" type="checkbox" name="check<?= $psmTipo6->id_PerfilesMenu?>" value="0" checked="1" / >
                          
                        </td>
                        </tr>
                      <?php endforeach ?>
                      </tbody>
                    </table>
                </div>
                
              </div>
              </div>
            
            
          </div>  <!--PANEL DEFAULT-->
        </div>
      </form>  	 <!--PANEL PERMISOS-->
      </div> 	<!--TAB 2 PANEL -->
      
	 
   <?php  $cont = 0 ?>
	<?php  foreach ($usTipoPanele as $usTipoPanele): ?>
    <?php  $cont = $cont+1  ?>
			  <?php  if(isset($_POST['editU'.$usTipoPanele->id_usuario])): ?>
				  <?php if( $usTipoPanele->id_usuario == $_POST['editU'.$usTipoPanele->id_usuario]):?>
                      <div class="tab-pane active" id="USUARIOS">
                      <?php  reset($usTipoPanele); ?>
                  <?php endif ?>    
              <?php  elseif(isset($_POST['deleteU'.$cont])): ?>   
                 	 <div class="tab-pane active" id="USUARIOS">
                       <?php  reset($usTipoPanele); ?>
   			  <?php endif ?>  
   	<?php endforeach ?>  
    
    <?php  if(isset($_POST['editar_usuario']) || isset($_POST['crear_usuario'])): ?> 
  		 <div class="tab-pane active" id="USUARIOS">
    <?php else: ?>
  		  <div class="tab-pane" id="USUARIOS">
    <?php endif ?>
    
        <div class="panel panel-primary" >
            
                 	 <div class="panel-heading" >
                   		 <div align="center">LISTA DE USUARIOS</div>
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
            <table id="demoTable2">
              <thead>
                <tr>
                  <th sort="index" style="text-align: center">CODIGO</th>
                  <th sort="description"  style="text-align: center">NOMBRE</th>
                  <th sort="description"  style="text-align: center">APELLIDOS</th>
                  <th sort="description"  style="text-align: center">USUARIO</th>
                  <th sort="description"  style="text-align: center">EMAIL</th>
                  <th sort="beds" style="text-align: center">TELÉFONO</th>
                  <th sort="description" style="text-align: center">DIRECCIÓN</th>
                  <th sort="beds" style="text-align: center">DNI</th>
                  <th style="text-align: center">EDIT</th>
                  <th style="text-align: center">ELIMINAR</th>
                  </tr>
                </thead>
              <tbody>
                
                <?php  foreach ($usTipo as $usTipo): ?>
                <tr  align="center">
                  <td><?= $usTipo->cod_usuario?></td>
                  <td><?= strtoupper($usTipo->nom_usuario)?></td>
                  <td><?= strtoupper($usTipo->apellido_usuario)?></td>
                  <td><?= strtoupper($usTipo->nick_usuario)?></td>
                  <td><?= strtoupper($usTipo->email_usuario)?></td>
                  <td><?= $usTipo->telf_usuario?></td>
                  <td><?= strtoupper($usTipo->direc_usuario)?></td>
                  <td><?= $usTipo->dni_usuario?></td>
                  <td><button id="btneditar_usuario<?= $usTipo->id_usuario?>" name="editU<?= $usTipo->id_usuario?>" type="submit" class="btn btn-default" value="<?= $usTipo->id_usuario?>" >
                    <span class="glyphicon glyphicon-edit"></span>
                    </button></td>
                  <td><button id="btncancelar_usuario<?= $usTipo->id_usuario?>" name="deleteU<?= $usTipo->id_usuario?>" type="submit" class="btn btn-default" value="<?= $usTipo->id_usuario?>">
                    <span class="glyphicon glyphicon-remove"></span>
                    </button></td>
                  
                  </tr>
                <?php endforeach ?>
                </tbody>
                 <tfoot class="nav">
                <tr>
                        <td colspan=10>
                                <div class="pagination"></div>
                                <div class="paginationTitle">Página:</div>
                                <div class="selectPerPage"></div>
                                <div class="status"></div>
                        </td>
                </tr>
        </tfoot>
            </table>
          </div>	<!--TABLA USUARIO-->  
                          <button id="createusuario" name="create_usuario" type="button" class="btn btn-primary" >CREAR USUARIO
                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
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
             			 <?php endif ?>   
        			  <?php endforeach ?>
                      
          
          
          <div id="edit_user" style="display:block">
             <div class="panel panel-primary" >
            <div class="panel-heading">
              <div align="center">EDITAR USUARIO</div>
              </div>
              </div>
            
            <div class="panel-body">
              <div class="form-horizontal">
                <div class="control-group row-fluid form-inline" >
                  
                   <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">PERFILES: </span>    </label>
                    <select style="width:166px" name="perfil_editUsu" class="form-control control-sign placeholder" required>
                      <?= HTML::default_option('TIPO PERFIL') ?>
                      
                      <?php foreach ($pTipo as $keyP => $valP): ?>
                      <option value="<?= $keyP ?>" <?php if($keyP == $perfilval) echo " selected"?>><?= __(strtoupper($valP)) ?></option>
                      <?php endforeach ?>
                      
                      
                  </select>		<!--SELECT PERFIL-->
                  </div>
                  
                   <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">SEDE: </span>    </label>
                    <select style="width:166px" name="sede_usuario" class="form-control control-sign placeholder" required>
                      <?= HTML::default_option('TIPO SEDE') ?>
                      <?php foreach ($sede as $keyS => $valS): ?>
                      <option value="<?= $keyS ?>" <?php if($keyS == $usTipoE->id_sede_PK) echo " selected"?>><?= __(strtoupper($valS)) ?></option>
                      
                      <?php endforeach ?>
                  </select>		<!--SELECT SEDE-->
                  </div>
                  
                  
                   <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">USUARIO: </span>    </label>
                  <input align="right" name="nick_usuario" type="text" id="descripcion" placeholder="USUARIO" class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?= $usTipoE->nick_usuario?>" required>
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
                      <span class="text-info">TELÉFONO: </span>    </label>
                  <input align="right" name="telf_usuario" type="text" id="descripcion" placeholder="TELÉFONO" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?= $usTipoE->telf_usuario?>" >
                  </div>
                  
                  
                   <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">DIRECCIÓN: </span>    </label>
                  <input align="right" name="direc_usuario" type="text" id="descripcion" placeholder="DIRECCIÓN" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?= $usTipoE->direc_usuario?>" >
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
                  <div align="center">NUEVO USUARIO</div>
                  </div>
                
                <div class="panel-body">
                <form name="form_usuario" class="form-sign signup" role="form" method="post">
                  <div class="form-horizontal">
                    <div class="control-group row-fluid form-inline" >
                      
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
                      <span class="text-info">USUARIO: </span>    </label>
                        <input align="right" name="nick_usuario" type="text" id="input_usu" placeholder="USUARIO" class="inputrange" autofocus style="text-transform:uppercase;width:225px" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Usuario" required>
                      </div>
                      <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">CONTRASEÑA: </span>    </label>
                        <input align="right" name="pass_usuario" type="password" id="input_pas" placeholder="CONTRASEÑA" class="inputrange"  title="Requiere Contraseña" style="width:225px" required>
                     </div>
                      
                      <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">NOMBRE: </span>    </label>
                        <input align="right" name="nom_usuario" type="text" id="input_nom" placeholder="NOMBRES" class="inputrange"  style="text-transform:uppercase;width:225px" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Nombre" required>
                      </div>
                      
                      <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">APELLIDOS: </span>    </label>
                      <input align="right" name="apellido_usuario" type="text" id="input_nom" placeholder="APELLIDOS" class="inputrange" style="text-transform:uppercase;width:225px" onkeyup="javascript:this.value=this.value.toUpperCase();"  title="Requiere Apellidos" required>
	                  </div>
                      
                      <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">DNI: </span>    </label>
                        <input align="right" name="dni_usuario" type="text" id="input_dni" placeholder="DNI" class="inputrange"  style="text-transform:uppercase;width:225px" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere DNI" required>
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
                      <span class="text-info">E-MAIL USUARIO: </span>    </label>
                        <input align="right" name="email_usuario" type="email" id="descripcion" placeholder="E-MAIL" class="inputrange"  style="text-transform:uppercase;width:225px" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere E-Mail">
                      </div>
                      
                      <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">TELÉFONO: </span>    </label>
                        <input align="right" name="telf_usuario" type="text" id="descripcion" placeholder="TELÉFONO" class="inputrange"  style="text-transform:uppercase;width:225px" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Telefono">
                      </div>
                      
                      
                      <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">DIRECCIÓN: </span>    </label>
                        <input align="right" name="direc_usuario" type="text" id="descripcion" placeholder="DIRECCIÓN" class="inputrange"  style="text-transform:uppercase;width:225px" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Requiere Direccion">
                      </div>
                      
                     
                      
                      
                      
                      <br>
                      <?php  foreach ($uTipo as $uTipo): ?>   
                      <?php endforeach ?>
                      
					  <?php  $codus = 1?> 
                      <?php  foreach ($usCod as $usCod): ?>
                      <?php  $codus++?>   
                      <?php endforeach ?>
                      
                      <input type="text" name="cod_usu" value="<?= $codus ?>" hidden>
                      <button id="cancel_usuario" name="cancel_usuario" type="reset" class="btn btn-primary" value="">Cancelar</button>
                      <button name="crear_usuario" type="submit" class="btn btn-primary" value=" <?= ($uTipo->id_usuario)+1?>">Guardar</button>
                      
                      </div>
                    </div>
                    </form>  
                </div>
            
            </div>                                                 
          		<!--NUEVO USUARIO-->
            
            
          
          <!--EDITAR USUARIO-->
          
        </div>
        
     <?php  $contf = 0 ?>
      <?php  foreach ($usTipoPanel as $usTipoPanel): ?>
      <?php  $contf = $contf+1  ?>
			  <?php  if (isset($_POST['editU'.$usTipoPanel->id_usuario])): ?>
				  <?php if (($usTipoPanel->id_usuario == $_POST['editU'.$usTipoPanel->id_usuario])): ?>
         			</div>
                    <?php  reset($usTipoPanel); ?>
        		 <?php endif ?>  
              <?php  elseif(isset($_POST['deleteU'.$contf])): ?> 
             	  </div>
                  <?php  reset($usTipoPanel); ?>
   			<?php endif ?>    
   	<?php endforeach ?> 
      </div> 
       	<!--PANEL_USUARIOS-->
      <!--TAB 3 PANEL -->
   
   
   
    <?php if(isset($_POST['creare_sede'])): ?>
    	<div class="tab-pane active" id="SEDE">
 	<?php else:?>
    	<div class="tab-pane" id="SEDE">
    <?php endif ?>
          <form id="sedepanel" class="form-sign signup" role="form" method="post">
            <div class="panel panel-primary" >
              
              <div class="panel-heading" >
                <div align="center">LISTA DE SEDES</div>
                </div>
                
			 <div class="panel-body">
            <div class="form-horizontal">
              <div class="control-group row-fluid form-inline">
                <label for="name" class="control-label">
                <p class="text-info">DESCRIPCIÓN&nbsp;<i class="icon-star"></i>
                  <input type="text" id="descripcion" placeholder="Descripción" class="span3" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                  <button type="button" class="btn btn-primary">Buscar</button></p>
              </div>
              </div> 
              
                <div class="table-responsive">
                <table id="demoTable3">
                  <thead>
                    <tr>
                      <th sort="index" style="text-align: center">CODIGO</th>
                      <th sort="description" style="text-align: center">SEDE</th>
                      <th sort="description" style="text-align: center">DIRECCIÓN</th>
                      <th sort="beds" style="text-align: center">CODIGO UBIGEO</th>
                      <th sort="average" style="text-align: center">TELÉFONO</th>
                      <th sort="date" style="text-align: center">FECHA CREACION</th>
                      </tr>
                    </thead>
                  <tbody>
                    
                    <?php  foreach ($sedeall as $sedeall): ?>
                    <tr  align="center">
                      <td><?= $sedeall->id_sede?></td>
                      <td><?= $sedeall->ubi_sede?></td>
                      <td><?= $sedeall->dir_sede?></td>
                      <td><?= $sedeall->cod_ubigeo_FK?></td>
                      <td><?= $sedeall->tel_sede?></td>
                      <td><?= $sedeall->fec_crea_sede?></td>
                      
                      
                      
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                    <tfoot class="nav">
                <tr>
                        <td colspan=6>
                                <div class="pagination"></div>
                                <div class="paginationTitle">Página:</div>
                                <div class="selectPerPage"></div>
                                <div class="status"></div>
                        </td>
                </tr>
        </tfoot>
                  </table>
               </div>		<!--TABLA SEDE-->
              
              <button name="CreateSede" id="crearSede" type="submit" class="btn btn-primary" >CREAR SEDE
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>  
                 </div>

        
              </div>
            
            <div id="new_Sede" class="panel panel-primary" style="display:none">
              <div class="panel-heading">
                <div align="center">NUEVA SEDE</div>
                </div>
              <div class="panel-body">
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
                      <span class="text-info">SEDE: </span>    </label>
                    <input id="ubi_sede" align="right" name="ubi_sede" type="text" placeholder="SEDE" class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Se requiere Sede" value="">
                    </div>
                    
                   <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">DIRECCIÓN: </span>    </label>
                    <input id="dir_sede" align="right" name="dir_sede" type="text" placeholder="DIRECCION" class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" title="Se requiere Dirección" required value="">
                    </div>
                    
                    <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">TELÉFONO: </span>    </label>
                    <input id="telf_sede" align="right" name="telf_sede" type="text" placeholder="TELEFONO" class="inputrange" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"title="Se requiere Teléfono" value="">
                    </div><br>

                    <button id="cancel_sede" name="cancel_sede" type="reset" class="btn btn-primary" value="">Cancelar</button>
                    <button id="crear_sede" name="creare_sede" type="submit" class="btn btn-primary" value="">Guardar</button>
                    
                    
                  </div>
                </div>
                
                </div>	
              </div>                                                            
            
            
            <!--CREAR SEDE-->
            
            
            
            
            
            </form> 	<!--PANEL_SEDE-->
       </div>		<!--TAB 4 PANEL -->
    
  </div>	
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

