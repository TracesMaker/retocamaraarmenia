var menulateral = '';
$(document).ready(function(){ 
	/*$(window).bind("popstate", function (event) {
		var currLocation = window.location.href;
		if(currLocation.split("?")[1]){
			$(".navigation-index.active").removeClass("active");
			var tab = getUrlParameters("sublink", "", true)
			var currLocation = location.href;
			parArr = currLocation.split("?")[2];
			$("#subcontainer").load(tab+'?'+parArr);
			$('a[rel="'+tab+'"]').parent().addClass("active"); 
		}
	});*/
	$(window).bind("popstate", function (event) {
			var currLocation = window.location.href;
			var tab3 = getUrlParameters("subsubsublink", "", true);
			$(".navigation-index.active").removeClass("active");
			if(tab3 != '' && tab3 != 'false' && tab3 != "undefined"){
				show_loader();
				$('.left-menu > li > a[rel="'+tab3+'"]').parents(".navigation-index").addClass("active");
				$("#subcontainer").load(tab3,function(){
					hide_loader();
				});
			}
		});
	$(document).on("click", ".loadform", function(event){
		event.preventDefault();
		show_loader();
		var currLocation = location.href;
		var tab1 = getUrlParameters("sublink", "", true);
		var tab2 = getUrlParameters("subsublink", "", true);
		var tab3 = $(this).attr("request")
		href = currLocation.split("?")[0]+'?sublink='+ tab1+'&subsublink='+tab2+'&subsubsublink='+tab3;
		history.pushState(null, "", href);
		$("#subcontainer").load(tab3, hide_loader);
	});
	
	$(document).on("click", ".saveandnew", function(){
		var ButtonSave = $(this).parents(".form-actions").children(".saveform");
		ButtonSave.attr("new","true");
		ButtonSave.click();
	});

	$(document).on("click", ".closeform", function(){
		history.back();
	});

	
	$(document).on("click", ".actionajax", function(){
		if($(this).hasClass('disabled')){return false;}
		var tr = $(this).parents("tr");
		var title = $(this).parent().attr("title");
		var msj = $(this).attr("msj");

		_request = $(this).attr("request");
		if (confirm(msj)){
			show_loader();
			var _div = $(this);
			$.post( _request, function(data){	
				hide_loader();
				if(data.id > 0)
					$('.notify').notify({message: { text: title+' :: ' + data.Msj }}).show();
				else
					alert(data.Msj);
				if(data.Error = -1){
					window.location.href = data.url;
				}
				show_loader();
				_div.parents(".contentindex").parent().load(_div.parents(".contentindex").attr("request"), hide_loader); 
			})				
		}
	});
	
	$(document).on("click", ".deleteaction", function()
	{
		if($(this).hasClass('disabled')){return false;}
		var tr = $(this).parents("tr");
		var title = $(this).parent().attr("title");

		_request = $(this).attr("request");
		if (confirm("Esta seguro de eliminar el registro seleccionado ? :: "+title)){
			show_loader();
			$.post( _request, function(data){ 
				hide_loader();
				if(data.id > 0){
					$('.notify').notify({message: { text: title+' :: Registro eliminando con exito' }}).show();
					tr.hide();
				} else {
					alert("No fue posible eliminar");					
				}
			});
			// }).error(
			// 	function() { 
			// 		hide_loader(); 
			// 		alert('No fue posible eliminar este item. Por favor verifique que no tiene elementos relacionados.'); 
			// 	});
		}
	});	

	$(document).on("click", ".loaddialog", function(){
    	var dialog = $('<div></div>');
    	var btn = $(this);
		var url = $(this).attr('request');
		dialog.load(url).dialog({
			height: btn.attr('dheight'),
      		width: btn.attr('dwidth'),
      		close: function (event, ui) {  
      			dialog.dialog('destroy');
				dialog.remove();
			},
			beforeclose: function(event, ui) {
   				$('.ui-dialog table').dataTable( {
					"bDestroy": true
				} );
			}
      	});
    });

	$(document).on("click", ".accionload", function(){
		$('#detalles > .modal-body').html("");
		_control = $(this).attr("control");
		_tipoform = $(this).attr("tipoform");
		switch(_tipoform){
			case "ajax": 	
                            titulo =  "";
                            if ($(this).attr("title") == "") {
                                titulo = $(this).parent().attr("title");
                            } else {
                                titulo = $(this).attr("title");
                            };
                            
                            FormModal(_control, titulo);
						  	break;
			default:	  	location.href=_control;
		}	
	});
	

    $(document).on("click", ".accionajax", 
    	function(){ 
			$.post($(this).attr("accion"), function(data) {
			  $(".savefiltros").click();
			});
    	}
    );

    $(document).on("click", ".accionsubform", 
    	function(){ 
			MakeFormAdd("modalaccionajax");			
			$("#modalaccionajax > .modal-header > h3").html($(this).attr("titulo"));
			$('#modalaccionajax').modal('show');
			if($(this).attr("ancho") != ""){
				left =  (screen.width - parseInt($(this).attr("ancho")))/2;
				$("#modalaccionajax").css("width",$(this).attr("ancho")+"px");
				$("#modalaccionajax").css("margin-left","0px");
				$("#modalaccionajax").css("left",left+"px");
			}
			_url=$(this).attr("accion");
			$.get(_url, function(data) {	
			  	$("#modalaccionajax > .modal-body").html(data.form);
			  	$("#submitsubform").click(function(){
			  		$.post(_url, $("#subform").serialize(), function(data) {
					  if(data.estado=="1"){
					  	$('#modalaccionajax').modal("hide");
					  	$('#modalaccionajax').remove();
					  	$(".savefiltros").click();
					  }else{
					  	alert(data.mensaje)
					  }
					});
			  	});
			});			
    	}
    );
    
	$(document).on("click", ".cargarajax", 
		function(){		
			$('#cargarajax').remove();
			MakeFormAdd("cargarajax");
			$("#cargarajax > .modal-header > h3").html($(this).attr("titulo"));
			$('#cargarajax').modal('show');	
			_url=$(this).attr("accion");		
			$("#cargarajax > .modal-body").load(_url);	
			if($(this).attr("ancho") != ""){
				left =  (screen.width - parseInt($(this).attr("ancho")))/2;
				$("#cargarajax").css("width",$(this).attr("ancho")+"px");
				$("#cargarajax").css("margin-left","0px");
				$("#cargarajax").css("left",left+"px");
			}
		}
    );
    
    $(document).on("click", ".grid tbody tr",
    	function(){		
			$("table").find('.seleccion').removeClass("seleccion");
	       	$(this).toggleClass("seleccion");
	       	$('input[type=radio]',this).attr('checked','checked');
		}        
    );
    
    $(document).on("click", '.pagination li.paginacion a',
    	function(){		
	        var page=$(this).attr('page');
	        $('#irapagina').attr('value',page);
	        $(".savefiltros").click();
		}        
    );

    $(document).on("click", 'th.sort',
    	function(){		
    		idformbuscar = $(this).parent().parent().parent().attr("formBuscar");
    		// idformbuscar = $('.searchform').attr("id");
			var sort=$(this).attr('sort');
	        var order=$('#'+idformbuscar+' #order').val();
	        
	        if(order=="asc")
	        	order="desc";
	        else
	        	order="asc";	            
	        
	        $('#'+idformbuscar+' #order').val(order);
	        $('#'+idformbuscar+' #sort').val(sort+" "+order);

	      	$(".savefiltros").click();
		}        
    );

    $(document).on("click", '.clean',
    	function(){
    		$(this).parents(".modal").modal("hide");
    		$(this).parents(".modal").find(":text, select").val("");
    		$(this).parents(".modal").find(".savefiltros").click();	      	
		}        
    );
    

	$(document).on("click", "button.savefiltros", CargarListado);   

});

function reloadgrid(){
	var sort = $("#sort").val();
	var new_text=sort.split(' ');
	if(new_text[1]=='asc'){
		$('[sort=' + new_text[0] + ']').append('<i class="icon-arrow-up pull-right"></i>');
	}else{
		$('[sort=' + new_text[0] + ']').append('<i class="icon-arrow-down pull-right"></i>');
	}
}

function CargarListado() {
	$(this).parents(".modal").modal("hide");
 	$("#nregistros").attr("value",$("#number").attr('value'));
    var action = $(this).parents("form").attr('action');
 	var currLocation = location.href;
    parArr = currLocation.split("?")[0];
	var ContentIndex = $(this).parents("#subcontainer");
	var SearchForm = $(this).parents("form");
	var formData = SearchForm.serialize();
    show_loader();
    history.pushState(null, "", parArr+'?sublink=' + action + "?" + formData);
    ContentIndex.load(action,formData,function(response, status, xhr) {
		hide_loader();
		if (status == "error") {showNotifyError(xhr.status);}
	});
    return;
}
function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*?)[#.]/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}
function getUrlParameters(parameter, staticURL, decode){
   /*
    Function: getUrlParameters
    Description: Get the value of URL parameters either from 
                 current URL or static URL
    Author: Tirumal
    URL: www.code-tricks.com
   */
   var currLocation = (staticURL.length)? staticURL : window.location.search,
       parArr = currLocation.split("?")[1].split("&"),
       returnBool = true;
   
   for(var i = 0; i < parArr.length; i++){
        parr = parArr[i].split("=");
        if(parr[0] == parameter){
            return (decode) ? decodeURIComponent(parr[1]) : parr[1];
            returnBool = true;
        }else{
            returnBool = false;            
        }
   }
   
   if(!returnBool) return false;  
}


function paginacion(cont){ 
	var pagina = $("#pagina").attr('value');
	if(pagina<=cont){
		$('#irapagina').attr('value',pagina);
		$(".savefiltros").click();
	}
	else
		$("#pagina").attr('value',1);
} 

function Guardar(){	
	$(".savefiltros").click();
} 

function FormModal(_urlForm, _titleheader){
	MakeFormAdd("ajax", _titleheader)
	$("#ajax"+" > .modal-body").load(_urlForm,function(){
		$("#ajax"+" > .modal-body").scrollTop(0);
	});	
}
