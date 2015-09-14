<meta charset="utf-8">
    <h3 class="heading" align="center">
      <?= __('PROTOCOLO') ?>
	    </h3>
	
  <hr>

  
<br>
<div id="tabs">
  <!-- Nav tabs -->
  <ul id="nav_tab" class="nav nav-tabs" role="tablist">  <!--style="margin: 0 0 0 38%;" MEDIO-->
    
    
    
   
    
    <li class="active"><a href="#PROTOCOLO" role="tab" data-toggle="tab">PROTOCOLO</a></li>
   <li ><a href="#VERPROTOCOLO" role="tab" data-toggle="tab">VER PROTOCOLO</a></li>
   
  </ul>
  
  <!-- Tab panes -->
  <div  class="tab-content">

   
    	<div class="tab-pane active" id="PROTOCOLO">

         <form  id="usuariospanel" name="usuarios_panel" class="form-sign signup" role="form" method="post">
        	<div class="panel panel-primary" >
                    
                             <div class="panel-heading" >
                                 <div align="center">NUEVO PROTOCOLO (SAN MIGUEL)</div>
                             </div>
                            <div class="panel-body">
                        <div class="form-horizontal">
                          <div class="control-group row-fluid form-inline">
                            <div>  
                          <label for="name" class="labelrange">
                          <span class="text-info">DESTINO </span>    </label>
                          <input align="right" name="destino_empresa" type="text" id="descripcion" placeholder="DESTINO" class="inputrange" style="text-transform:uppercase; width:50%" onkeyup="javascript:this.value=this.value.toUpperCase();" >
                            FACTURAR: <input type="radio" name="factura1" value="1">
                         </div>
                         
                         <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">EMPRESA 1: </span>    </label>
                          <input align="right" name="empresa1" type="text" id="descripcion" placeholder="EMPRESA 1" class="inputrange"  style="text-transform:uppercase;width:50%" onkeyup="javascript:this.value=this.value.toUpperCase();" >
                         FACTURAR: <input type="radio" name="factura2" value="1">
                         </div>
                         
                        <div>  
                              <label for="name" class="labelrange">
                              <span class="text-info">EMPRESA 2: </span>    </label>
                                <input align="right" name="empresa2" type="text" id="descripcion" placeholder="EMPRESA 2" class="inputrange"  style="text-transform:uppercase;width:50%" onkeyup="javascript:this.value=this.value.toUpperCase();" >
                                FACTURAR: <input type="radio" name="factura3" value="1">
                          </div> 
                                         
                 
                          </div>
                       </div> 
                          
                   </div>
          		  </div>
       <div class="panel panel-primary" >
                    
                             <div class="panel-heading" >
                                 <div align="center"><input type="radio" name="COORPORATIVO" value="1"> COORPORATIVO &nbsp&nbsp <input type="radio" name="COORPORATIVO" value="1"> A &nbsp&nbsp <input type="radio" name="COORPORATIVO" value="1"> B &nbsp&nbsp <input type="radio" name="COORPORATIVO" value="1"> C </div>
                             </div>
                            <div class="panel-body">
                        <div class="form-horizontal">
                          <div class="control-group row-fluid form-inline">
                            <div>  
                          <label for="name" class="labelrange">
                          <span class="text-info">VIGENCIA   &nbsp&nbsp &nbsp&nbsp  |</span>    </label>
                         
                    
                         
                       
                              <label for="name" class="labelrange">
                              <span class="text-info">FECHA INICIAL: </span>    </label>
                          <input align="right" name="fecha_inicial" type="date" id="descripcion" placeholder="EMPRESA 1" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" >
                        
                     
                         &nbsp&nbsp &nbsp&nbsp  &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
                      
                              <label for="name" class="labelrange">
                              <span class="text-info">FECHA FINAL: </span>    </label>
                                <input align="right" name="fecha_final" type="date" id="descripcion" placeholder="EMPRESA 2" class="inputrange"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" >
                           
                          </div> 
                                         
                 
                          </div>
                       </div> 
                          
                   </div>
          		  </div>
          <div align="center">
      				<button id="crearprotocolo" name="create_protocolo" type="button" class="btn btn-primary" >GRABAR
                          </button>         
                     <button id="cancalprotocolo" name="cancel_protocolo" type="button" class="btn btn-primary" >CANCELAR
                         </button>               
                          </div>
  				</form>  
                <div class="table-responsive">
                      
                        <table id="demoTable1">
                          <thead>
                            <tr>
                              <th sort="index" style="text-align: center">Nº</th>
                              <th sort="description"  style="text-align: center">DESCRIPCION</th>
                              <th style="text-align: center">INGRESO</th>
                              <th style="text-align: center">ANUAL</th>
                              <th style="text-align: center">RETIRO</th>
                              <th style="text-align: center">LEVANT</th>
                              <th style="text-align: center">ALT.1.8</th>
                              </tr>
                            </thead>
                          <tbody>
                            
                         
                            <tr  align="center">
                              <td></td>
                              <td align="right">TOTAL BASICO</td>
                              <td>
                              <input align="right" name="ingreso" type="text" id="descripcion" placeholder="" class="inputrange"  style="text-transform:uppercase;width:60px" onkeyup="javascript:this.value=this.value.toUpperCase();" disabled>
							  </td>
                              <td>
                              <input align="right" name="ANUAL" type="text" id="descripcion" placeholder="" class="inputrange"  style="text-transform:uppercase;width:60px" onkeyup="javascript:this.value=this.value.toUpperCase();" disabled>
                              </td>
                               <td>
                              <input align="right" name="RETIRO" type="text" id="descripcion" placeholder="" class="inputrange"  style="text-transform:uppercase;width:60px" onkeyup="javascript:this.value=this.value.toUpperCase();" disabled>
							  </td>
                              <td>
                              <input align="right" name="LEVANT" type="text" id="descripcion" placeholder="" class="inputrange"  style="text-transform:uppercase;width:60px" onkeyup="javascript:this.value=this.value.toUpperCase();" disabled>
                              </td>
                               <td>
                              <input align="right" name="ALT.1.8" type="text" id="descripcion" placeholder="" class="inputrange"  style="text-transform:uppercase;width:60px" onkeyup="javascript:this.value=this.value.toUpperCase();" disabled>
							  </td>
                            
                              
                            </tr>
                         
                         <tr  align="center">
                              <td></td>
                              <td align="right">TOTAL COMPLETO</td>
                              <td>
                              <input align="right" name="ingreso" type="text" id="descripcion" placeholder="" class="inputrange"  style="text-transform:uppercase;width:60px" onkeyup="javascript:this.value=this.value.toUpperCase();" disabled>
							  </td>
                              <td>
                              <input align="right" name="ANUAL" type="text" id="descripcion" placeholder="" class="inputrange"  style="text-transform:uppercase;width:60px" onkeyup="javascript:this.value=this.value.toUpperCase();" disabled>
                              </td>
                               <td>
                              <input align="right" name="RETIRO" type="text" id="descripcion" placeholder="" class="inputrange"  style="text-transform:uppercase;width:60px" onkeyup="javascript:this.value=this.value.toUpperCase();" disabled>
							  </td>
                              <td>
                              <input align="right" name="LEVANT" type="text" id="descripcion" placeholder="" class="inputrange"  style="text-transform:uppercase;width:60px" onkeyup="javascript:this.value=this.value.toUpperCase();" disabled>
                              </td>
                               <td>
                              <input align="right" name="ALT.1.8" type="text" id="descripcion" placeholder="" class="inputrange"  style="text-transform:uppercase;width:60px" onkeyup="javascript:this.value=this.value.toUpperCase();" disabled>
							  </td>
                            
                              
                            </tr>
                            </tbody>
                             <tfoot class="nav">
                                    <tr>
                                            <td colspan=8>
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
           
      
      	<!--TAB 1 PANEL -->
      
     	<div class="tab-pane" id="VERPROTOCOLO">
  
 
          <form class="form-sign signup" role="form" method="post">
            
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <div align="center">BUSQUEDA DE PROTOCOLO</div>
                    </div>
                  <div class="panel-body">
                    <div class="form-horizontal">
                      
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
