<meta charset="utf-8">
    <h3 class="heading" align="center">
      <?= __('ESPECIALIDADES') ?>
	 </h3>
	
  <hr>
	

      

  
<br>
        <div class="panel panel-primary" >
          
          <div class="panel-heading" >
            <div align="center">LISTA DE ESPECIALIDADES</div>
            </div>
            
           <div class="panel-body">
           <form name="form_new_especialidad" class="form-sign signup" role="form" method="post">
            <div class="form-horizontal">
              <div class="control-group row-fluid form-inline">
              
              
                <label for="name" class="control-label">
                <p class="text-info">DESCRIPCIÓN&nbsp;<i class="icon-star"></i>
                  <input type="text" id="descripcion" placeholder="Descripción" class="span3" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                  <button type="button" class="btn btn-primary">Buscar</button></p>
                  </label>
                  
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
                <?php  foreach ($EspTipo as $key => $val): ?>
                <tr  align="center">
                  <td><?= $key?></td>
                  <td><?= strtoupper($val)?></td>
                  <td><button name="editE<?= $key?>" type="submit" class="btn btn-default" value="<?= $key?>">
                    <span class="glyphicon glyphicon-edit"></span>
                    </button></td>
                  <td><button name="delE<?= $key?>" type="submit" class="btn btn-default" value="<?= $key?>">
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
            <button id="create_especialidad" name="create_especialidad" type="submit" class="btn btn-primary" >CREAR ESPECIALIDAD
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
         
            </div></form>	<!--TABLA PERFILES-->
   		</div>
         
          
          </div>     
        <form name="form_especialidad" class="form-sign signup" role="form" method="post">
      	<div id="new_especialidad" class="panel panel-primary" style="display:none" >
          <div class="panel-heading">
            <div align="center">NUEVO TIPO DE ESPECIALIDAD</div>
          </div>
          <div class="panel-body">
            
            
            <div class="form-horizontal">
              <div class="control-group row-fluid form-inline">
              
                 <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">ESPECIALIDAD: </span>    </label>
           
                  <input name="nom_especialidad" type="text" id="descripcion" placeholder="descripción" class="textb1" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" autofocus title="Ingresar Nueva Especialidad" required>
                  <button id="cancel_especialidad" name="especialidad" type="reset" class="btn btn-primary" >Cancelar</button>
                  <button name="crear_especialidad" type="submit" class="btn btn-primary" >Guardar</button>
                  </div>
              </div>
              </div>
            </div>
          </div>
		</form>
        
        
        <form name="form_edit_especialidad" class="form-sign signup" role="form" method="post">
        <?php  foreach ($EspTipo as $keyR => $nomR): ?>
        
        <?php  if (isset($_POST['editE'.$keyR])): ?>
        
        
        <div id="edit_especialidad" class="editable">
          <?php if ($keyR == $_POST['editE'.$keyR]): ?>
          <div class="panel panel-primary" >
            <div class="panel-heading" >
              <div align="center">EDITAR ESPECIALIDAD</div>
              </div>
            <div class="panel-body">
              
               <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">ESPECIALIDAD: </span>    </label>
                <input name="nom_editar_especialidad" type="text"  placeholder="<?= $nomR?>" class="text" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?= $nomR?>" required>
                <button id="cancel_editE" name="cancele_perfil" type="submit" class="btn btn-primary" onClick="usuario_permisos">Cancelar</button>
              <button name="editar_especialidad" type="submit" class="btn btn-primary" value="<?= $keyR ?>">Guardar</button>
              </div>
              </div>
          </div>
          <?php endif ?> 
          </div>
        <?php endif ?>                          
        <?php endforeach ?>	     
</form>

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