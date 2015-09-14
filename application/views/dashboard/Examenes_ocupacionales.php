<meta charset="utf-8">
    <h3 class="heading" align="center">
      <?= __('EXAMENES OCUPACIONALES') ?>
	    </h3>
	
  <hr>

      

  
<br>
        <div class="panel panel-primary" >
          
          <div class="panel-heading" >
            <div align="center">LISTA DE EXAMENES</div>
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
                <?php  foreach ($ExamTipo as $key => $val): ?>
                <tr  align="center">
                  <td><?= $key?></td>
                  <td><?= strtoupper($val)?></td>
                  <td><button name="editExa<?= $key?>" type="submit" class="btn btn-default" value="<?= $key?>">
                    <span class="glyphicon glyphicon-edit"></span>
                    </button></td>
                  <td><button name="delExa<?= $key?>" type="submit" class="btn btn-default" value="<?= $key?>">
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
            <button id="create_examen" name="create_examen" type="submit" class="btn btn-primary" >CREAR EXAMEN OCUPACIONAL
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
         		<span  id="btnExportExamen" style="cursor:pointer"><img title="EXPORTAR A EXCEL" src="/serhas/media/serhas/img/excel.jpg" width="38" height="39" ></span>
            </div></form>	<!--TABLA PERFILES-->
   		</div>
         
          
          </div>     
        <form name="form_examen" class="form-sign signup" role="form" method="post">
      	<div id="new_examen" class="panel panel-primary" style="display:none" >
          <div class="panel-heading">
            <div align="center">NUEVO TIPO DE EXAMEN OCUPACIONAL</div>
          </div>
          <div class="panel-body">
            
            
            <div class="form-horizontal">
              <div class="control-group row-fluid form-inline">
              
                 <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">EXAMEN OCUPACIONAL: </span>    </label>
           
                  <input name="nom_examen" type="text" id="descripcion" placeholder="descripción" class="textb1" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" autofocus title="Ingresar Nueva Especialidad" required>
                  <button id="cancel_examen" name="especialidad" type="reset" class="btn btn-primary" >Cancelar</button>
                  <button name="crear_examen" type="submit" class="btn btn-primary" >Guardar</button>
                  </div>
              </div>
              </div>
            </div>
          </div>
		</form>
        
        
        <form name="form_edit_examen" class="form-sign signup" role="form" method="post">
        <?php  foreach ($ExamTipo as $keyR => $nomR): ?>
        
        <?php  if (isset($_POST['editExa'.$keyR])): ?>
        
        
        <div id="edit_examen" class="editable">
          <?php if ($keyR == $_POST['editExa'.$keyR]): ?>
          <div class="panel panel-primary" >
            <div class="panel-heading" >
              <div align="center">EDITAR EXAMEN OCUPACIONAL</div>
              </div>
            <div class="panel-body">
              
               <div>  
                      <label for="name" class="labelrange">
                      <span class="text-info">EXAMEN OCUPACIONAL: </span>    </label>
                <input name="nom_editar_examen" type="text"  placeholder="<?= $nomR?>" class="text" autofocus style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?= $nomR?>" required>
                <button id="cancel_editExam" name="cancele_perfil" type="submit" class="btn btn-primary" >Cancelar</button>
              <button name="editar_examen" type="submit" class="btn btn-primary" value="<?= $keyR ?>">Guardar</button>
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

<div id="dvDataExamen" style="display:none">
                        <table border="2px solid #000000">
                     		<caption>
                     		<strong>EXAMENES OCUPACIONALES</strong>
                     		</caption>
                           	 <tr>
                              <th bgcolor="#8EBFF0">CODIGO</th>
                			  <th bgcolor="#8EBFF0">DESCRIPCION</th>
                              </tr>
                  
                          <tbody>
                            
                            <?php  foreach ($ExamTipo as $keyExcel => $valExcel): ?>
                            <tr  align="center">
                              <td><?= $keyExcel?></td>
                 			  <td><?= strtoupper($valExcel)?></td>
                              </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
</div> <!--EXPORT EXCEL-->