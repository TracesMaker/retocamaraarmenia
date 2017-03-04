$(document).ready(function(){
		$('.dropdown-toggle').dropdown();
		$('#bootstrapmenu-loadperfil,#bootstrapmenu-loadpass').click(function(event){
			event.preventDefault();
			_control = $(this).attr("href");
			FormModal(_control, "Mi perfil");

		});

	$(document).on("click", ".loadmodal", function(){
		var title = $(this).attr("title")+" ";

		if ($(this).parent().attr("title") != undefined) {
			title += $(this).parent().attr("title")+" ";
		};

		FormModal($(this).attr("request"), title)
	});

	$(document).on("click", ".linkonmodal", function(e){
		e.preventDefault();
		var title = $(this).text();
		FormModal($(this).attr("href"), title)
	});

});

base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) };

var tableToExcel = function(tabla) {

	var worksheet_template = '<?xml version="1.0"?>'+
								'<?mso-application progid="Excel.Sheet"?>'+
								'<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"'+
								' xmlns:o="urn:schemas-microsoft-com:office:office"'+
								' xmlns:x="urn:schemas-microsoft-com:office:excel"'+
								' xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"'+
								' xmlns:html="http://www.w3.org/TR/REC-html40">'+
								'<DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">'+
								'<Author>Usuario</Author>'+
								'<LastAuthor>Usuario</LastAuthor>'+
								'<Created>2013-01-08T15:41:45Z</Created>'+
								'<Version>14.00</Version>'+
								'</DocumentProperties>'+
								'<OfficeDocumentSettings xmlns="urn:schemas-microsoft-com:office:office">'+
								'<AllowPNG/>'+
								'</OfficeDocumentSettings>'+
								'<ExcelWorkbook xmlns="urn:schemas-microsoft-com:office:excel">'+
								'<WindowHeight>12585</WindowHeight>'+
								'<WindowWidth>28515</WindowWidth>'+
								'<WindowTopX>120</WindowTopX>'+
								'<WindowTopY>120</WindowTopY>'+
								'<ProtectStructure>False</ProtectStructure>'+
								'<ProtectWindows>False</ProtectWindows>'+
								'</ExcelWorkbook>'+
								'<Styles>'+
								'<Style ss:ID="Default" ss:Name="Normal">'+
								'<Alignment ss:Vertical="Bottom"/>'+
								'<Borders/>'+
								'<Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="11" ss:Color="#000000"/>'+
								'<Interior/>'+
								'<NumberFormat/>'+
								'<Protection/>'+
								'</Style>'+
								'</Styles>'+
								'<Worksheet ss:Name="Sheet1">'+
             					'<Table>'+
             					'{{ROWS}}</Table></Worksheet></Workbook>';

		var row_template = '<Row ss:AutoFitHeight="0">{{celdas}}</Row>';
		var celda = '<Cell><Data ss:Type="String">{{name}}</Data></Cell>';
		var row_data = '';
		var row = '';
		$('#'+tabla+' thead tr').find('th').each(function() {
			if(!$(this).hasClass('acciones')){
				row += celda.replace('{{name}}', $(this).text());
			}
		});		   	
	   	row_data += row_template.replace('{{celdas}}', row); 

		$('#'+tabla+' tbody tr').each(function(){

			var row = '';

			$(this).find('td').each(function() { 
				if(!$(this).hasClass('acciones')){
					row += celda.replace('{{name}}', $(this).text());
				}
			});
		   	
		   	row_data += row_template.replace('{{celdas}}', row); 

		});

		javascript:window.open('data:application/vnd.ms-excel;base64,'+base64(worksheet_template.replace('{{ROWS}}', row_data)));
}


//function actionsave(data, idsubmit, idformulario, _modulo, _control, _varenviada ){
//	//submitexperiencialaboralbuscar
//	switch($("#"+idsubmit).attr("accion")){
//		case "cerrarmodal": $("#"+$("#"+idsubmit).attr("idselect")).append("<option value='"+data.id+"'> "+data.nombre+" </option>")
//							$("#"+$("#"+idsubmit).attr("idselect")).val(data.id)
//							$($("#"+idsubmit).attr("modal")+' > .modal-header > .close').click();
//							break;
//		case "irtab":       location.href= baseUrl+"/"+_modulo+"/"+_control+"/edit/"+_varenviada;
//							break;
//			
//		default:			if($("#"+idformulario).parent().parent().hasClass("modal-body")){
//								idmodal = $("#"+idformulario).parent().parent().parent().attr("id");
//								$("#"+idmodal).modal("hide");
//								$("#"+$("#"+idsubmit).attr("id")+"buscar").click();
//								return;
//							}	
//							location.href= baseUrl+"/"+_modulo+"/"+_control+"/index/"+_varenviada;
//	}
//}

function MakeFormAdd(_id, txtheader){
	$('#'+_id+'').remove();
	var _html ='<div id="'+_id+'" class="modal hide" >'+
	    '<div class="modal-header">'+
	    	'<button type="button" class="close" data-dismiss="modal">×</button>'+
	    	'<h3>'+txtheader+'</h3>'+
	   ' </div>'+
	    '<div class="modal-body">'+	    
	  '  </div>'+
    '</div>';
    $("body").append(_html);
	$('#'+_id+' > .modal-header > .close').click(function(){
		$('#'+_id+'').modal('hide');
		$('#'+_id+'').remove();
	});
	$("#"+_id).modal("show");
}

show_loader = function (message) {
	
	message = typeof message === "undefined" ? 'Loading' : message;
	var message_pop_html = '<div class="process_ajax_request"><div class="alert">' + message + ' ...</div></div>';
	$('body').append(message_pop_html);
	$('.process_ajax_request').fadeIn('fast');
	
}

hide_loader = function () {
	
	$('.process_ajax_request').fadeOut('fast');
	$('.process_ajax_request').remove();
	
}


function zeroFill( number, width )
{
  width -= number.toString().length;
  if ( width > 0 )
  {
    return new Array( width + (/\./.test( number ) ? 2 : 1) ).join( '0' ) + number;
  }
  return number + ""; // always return a string
}

//$('.load-menu-lateral > li > a').on('click',function(){
//	$(".load-menu-lateral > .active").removeClass("active");
//	$(this).parent().addClass("active");
//	show_loader();
//	$("#containermenu").load($(this).attr("rel"), function(){ hide_loader() } );
//});

//$(document).ready(function(){
//
//	var string = document.URL;
//	var btn_load = string.substring(string.indexOf("#"));
//	if(btn_load !='' && $('.load-menu-lateral > li > a[href="'+btn_load+'"]').length > 0){
//		$('.load-menu-lateral > li > a[href="'+btn_load+'"]').click();
//	}
//
//	if(btn_load =='' || btn_load =='#' || string.indexOf("#") == -1){
//		$('.load-menu-lateral > li:first-child > a').click();
//	}
//
//});

$(document).on("click", ".close_modal", function(){
	$('#ajax').modal('hide');
	$('#ajax').remove();
});

/* Lista de errores */
function showNotifyError(status){

	var msg = " Lo sentimos pero ha ocurrido un error: 	";
	switch(status){
		case 404:
			msg = msg + 'Usted no tiene permisos para acceder' ;
			break;
		case 500:
			msg = msg + 'Comuniquese con el administrador' ;
			break;
		default:
			'';
			break;

	}
	$('.notify').notify({message: { text: msg}}).show();
}

function successload(response, status, xhr) {
	hide_loader();
	if (status == "error") {showNotifyError(xhr.status);}
}

function ajaxasincronico(url)
{
   var unico=-1;
   $.ajax({
      url: url,
      type: "POST",
      async: false,
      success: function(data) {
         unico=data;
      }
 	});
   return unico;
}

