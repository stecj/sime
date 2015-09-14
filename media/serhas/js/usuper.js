// JavaScript Document
$(document).ready(function(){
	cargar_departamentos();
	//cargar_provincias();
	$("#departamento").change(function(){
	$("#loadingp").css("display","block");	
	cargar_provincias();});
	$("#provincia").change(function(){
	$("#loadingd").css("display","block");	
	cargar_distrito();});
	$("#provincia").attr("disabled",true);
	$("#distrito").attr("disabled",true);
});

function cargar_departamentos()
{
	
	//var datas= "<option value=\"1\">jalando</option>"
		//var resultado= "TEST"
		$.get("loadDepa", function(resultado){
		if(resultado== false)
		{
			alert("Error");
		}
		else
		{
			$('#departamento').append(resultado);			
		}
	});	
}		//CARGAR DEPARTAMENTO
function cargar_provincias()
{
	var cod_depa = $("#departamento").val();
	
	$.get("loadProv", { codeDepa: cod_depa }, function(resultado){
		
			//alert(resultado);
			if(resultado == false)
			{
				alert("Seleccione un Departamento");
				$("#loadingp").css("display","none");
			}
			else
			{
				$("#loadingp").css("display","none");
				$("#provincia").attr("disabled",false);
				document.getElementById("provincia").options.length=1;
				$('#provincia').append(resultado);			
			}
		}

	);
}		//CARGAR PROVINCIA
function cargar_distrito()
{
	var cod_depa = $("#departamento").val();
	var cod_prov = $("#provincia").val();
	$.get("loadDist", { codeDepa: cod_depa, codeProv: cod_prov }, function(resultado){
		if(resultado == false)
		{
			alert("Seleccione un provincia");
			$("#loadingd").css("display","none");
			
			
		}
		else
		{
			$("#loadingd").css("display","none");
			$("#distrito").attr("disabled",false);
			document.getElementById("distrito").options.length=1;
			$('#distrito').append(resultado);			
		}
	});	
	
}		//CARGAR DISTRITO



$(document).ready(function(){
	
	$("#cancel_paciente").click(function(){
	$("#list").css("display","none");	

	});
	
});

$(document).ready(function(){
	
	$("#selectempresa").change(function(){
	$("#collapseCat").css("display","block");	

	});
	
});

$(document).ready(function(){	
	$("#crearSede").click(function(){
		event.preventDefault();
		$("#new_Sede").css("display","block");
		});
	$("#cancel_sede").click(function(){
	
		
		//$("#ubi_Sede").val("");
		//sleep(2)
		$("#new_Sede").css("display","none");			
	});
});

$(document).ready(function(){	
	$("#create_perfil").click(function(){
		event.preventDefault();
		$("#new_perfil").css("display","block");
		$("#edit_perfil").css("display","none");
		});
	$("#cancel_perfil").click(function(){
		$("#new_perfil").css("display","none");
		});
	$("#cancele_perfil").click(function(){
		event.preventDefault();
		$("#edit_perfil").css("display","none");
		});
});	

$(document).ready(function(){	
	$("#createemp").click(function(){
		event.preventDefault();
		$("#new_emp").css("display","block");
		$("#edit_emp").css("display","none");
		});
	$("#cancel_emp").click(function(){
		$("#new_emp").css("display","none");
		});
	$("#cancel_empeditU").click(function(){
		event.preventDefault();
		$("#edit_emp").css("display","none");
		});
		
	$("#btnExportar").click(function() {
	event.preventDefault();
    window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#dvDataEmp').html()));
  	window.close();  
});
});

$(document).ready(function(){	
	$("#createusuario").click(function(){
		event.preventDefault();
		$("#new_user").css("display","block");
		$("#edit_user").css("display","none");
		});
	$("#cancel_usuario").click(function(){
		$("#new_user").css("display","none");
		});
	$("#cancel_editU").click(function(){
		event.preventDefault();
		$("#edit_user").css("display","none");
		});
		
	$("#canceledit_paciente").click(function(){
		event.preventDefault();
		$("#edit_paciente").css("display","none");
		});
	
	$("#btnExportPaciente").click(function() {
	event.preventDefault();
    window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#dvDataPaciente').html()));
  	window.close();});
		
	$("#btnExport").click(function() {
	event.preventDefault();
    window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#dvData').html()));
  	window.close();  
});
});	

$(document).ready(function(){	
	$("#createcatalogo").click(function(){
		event.preventDefault();
		$("#new_catalogo").css("display","block");
		$("#new_subcatalogo").css("display","none");
		});
	$("#cancel_catalogo").click(function(){
		$("#new_catalogo").css("display","none");
		$("#new_subcatalogo").css("display","none");
		});
		
	$("#createsubcatalogo").click(function(){
		event.preventDefault();
		$("#new_subcatalogo").css("display","block");
		$("#new_catalogo").css("display","none");
		});
	$("#cancel_subcatalogo").click(function(){
		$("#new_subcatalogo").css("display","none");
		$("#new_catalogo").css("display","none");
		});

});

$(document).ready(function(){	
	$("#create_especialidad").click(function(){
		event.preventDefault();
		$("#new_especialidad").css("display","block");
		$("#edit_especialidad").css("display","none");
		});
		
	$("#cancel_especialidad").click(function(){
		$("#new_especialidad").css("display","none");
		});
	$("#cancel_editE").click(function(){
		event.preventDefault();
		$("#edit_especialidad").css("display","none");
		});
	
		
});

$(document).ready(function(){	
	$("#create_examen").click(function(){
		event.preventDefault();
		$("#new_examen").css("display","block");
		$("#edit_examen").css("display","none");
		});
		
	$("#cancel_examen").click(function(){
		$("#new_examen").css("display","none");
		});
	$("#cancel_editExam").click(function(){
		event.preventDefault();
		$("#edit_examen").css("display","none");
		});
	
		
});

$(document).ready(function(){	

		var val_edit = $("#btneditar_usuario2").val();
		$("#btneditar_usuario2").click(function(){
		//event.preventDefault();
		//alert(val_edit);
		$("#edit_user").css("display","block");
		});

});	

$(document).ready(function(){	

		$("#select_perfilus").change(function(){
		//event.preventDefault();
		//alert(val_edit);
		$("#requerido_select1").css("display","none");
	
		});
		$("#select_sedeus").change(function(){
		//event.preventDefault();
		//alert(val_edit);
		$("#requerido_select2").css("display","none");
	
		});
		
		$("#btnExportExamen").click(function() {
		event.preventDefault();
		window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#dvDataExamen').html()));
		window.close();
		
});
});	

$(document).ready(function(){	
	$("#create_denominacion").click(function(){
		event.preventDefault();
		$("#new_denominacion").css("display","block");
		$("#edit_denominacion").css("display","none");
		});
	$("#cancel_denominacion").click(function(){
		$("#new_denominacion").css("display","none");
		});
	$("#cancel_editDeno").click(function(){
		event.preventDefault();
		$("#edit_denominacion").css("display","none");
		});
 
});

function archivo(evt) {
      var files = evt.target.files; // FileList object
       
        //Obtenemos la imagen del campo "file". 
      for (var i = 0, f; f = files[i]; i++) {         
           //Solo admitimos imágenes.
           if (!f.type.match('image.*')) {
                continue;
           }
       
           var reader = new FileReader();
           
           reader.onload = (function(theFile) {
               return function(e) {
               // Creamos la imagen.
                      document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
               };
           })(f);
 
           reader.readAsDataURL(f);
       }
	 $("#list").css("display","block");	
}
document.getElementById('files').addEventListener('change', archivo, false);
