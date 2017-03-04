
$(document).ready(function(){
    $('#modalbuscar').modal({
    keyboard: false
    });
	$('#modalbuscar').modal('hide');
	$(".grid tbody tr").hover(function(){
        $(this).toggleClass("color");
    });

});


function reservar(){ 	
	
		if (confirm("Se va a reservar la hora seleccionada, desea continuar?")) {
		
			var date= $(this).attr("datetime");		
	
		}
		else
			return;	
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'/'+modulo+'/'+control+'/reservar',
	        dataType: "html",
	        data: "fecha="+date,
	        // Mostramos un mensaje con la respuesta de PHP            
	        success: function(data) {
	       
	        	$.ajax({
	                type: 'POST',
	                url: baseUrl+'/'+modulo+'/'+control+'/index',
	                dataType: "html",
	                data: "date="+date.substring(0, 10),
	                // Mostramos un mensaje con la respuesta de PHP            
	                success: function(data) {
	               
	                	$(".conten").html(data);                
	                }
	            });                  
	        }
	    });        
	    return false;	

	
} 

function cancelar(){ 	
	
	if (confirm("Se va a cancelar la reserva seleccionada, desea continuar?")) {
	
		var date= $(this).attr("datetime");
		var id= $(this).attr("id");	
	}
	else
		return;	
	$.ajax({
        type: 'POST',
        url: baseUrl+'/'+modulo+'/'+control+'/cancelar',
        dataType: "html",
        data: "id="+id,
        // Mostramos un mensaje con la respuesta de PHP            
        success: function(data) {
       
        	$.ajax({
                type: 'POST',
                url: baseUrl+'/'+modulo+'/'+control+'/index',
                dataType: "html",
                data: "date="+date.substring(0, 10),
                // Mostramos un mensaje con la respuesta de PHP            
                success: function(data) {
               
                	$(".conten").html(data);                
                }
            });                  
        }
    });        
    return false;	


} 

function agregar(){ 
	location.href=baseUrl+'/'+modulo+'/'+control+'/add';
}
function eliminar(){ 
	var id = "";
	if($('input[name=id]').is(':checked')){
		if (confirm("Esta seguro de eliminar el registro seleccionado?")) {
		$(":radio:checked").each(
			function() {
			   id= $(this).val();
			}
		);
		}
		else
			return;	
	}else{
		alert("Seleccione Mariposa");
		return;
	}
	location.href=baseUrl+'/'+modulo+'/'+control+'/delete/id/'+id;
}
function buscar(){
	$('#modalbuscar').modal('show');
 } 

function Guardar() {
	 
	$('#modalbuscar').modal({
	    keyboard: false
	    });
		$('#modalbuscar').modal('hide');
	var date=$(this).attr('date');
// Enviamos el formulario usando AJAX
    $.ajax({
        type: 'POST',
        url: baseUrl+'/'+modulo+'/'+control+'/index',
        dataType: "html",
        data: "date="+date,
        // Mostramos un mensaje con la respuesta de PHP            
        success: function(data) {
       
        	$(".conten").html(data);                
        }
    });        
    return false;
}

function reloadgrid(){
	$("a.agenda").click(Guardar);
	$("a.reservar").click(reservar);
	$("a.cancelar").click(cancelar);
	$("a.buscar").click(buscar);
		$(".grid tbody tr").click(function(){
			$("table").find('.seleccion').removeClass("seleccion");
	        $(this).toggleClass("seleccion");
	        $('input[type=radio]',this).attr('checked','checked');        
	    });
	    $('.pagination li.paginacion a').click(function(){
	        var page=$(this).attr('page');
	        $('#irapagina').attr('value',page);
	        Guardar();
	    });
}
