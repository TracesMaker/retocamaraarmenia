var idselect;
$(document).ready(function(){ 	
    //loadpage();    
    $(document).on("click", "button.addmultiple", 
    	function(){ 
			var idfield = $(this).attr("idfield");
			addFieldMulti(idfield, "");
    	}
    );
 
     $(document).on("click", "button.removemultiple", 
    	function(){ 
    		$(this).parent().html("");
    	}
    );    
    
    $(document).on("click", "button.addwidgetbuscar", 
    	function(){ 
    		addwidgetbuscar($(this).attr("idfield"));
    	}
    );
    
});

function addwidgetbuscar(idselect){
	value = $("#"+idselect).val(); 
	Texto = $("#"+idselect+' [value='+value+']').text();
	

	$("."+idselect+"widgetbuscar").each(
		function(){
			if($(this).val()==value)value=-2;
		}
	)
	if(value==-2)return;
	if(  value < 1){
		alert("Debe seleccionar");
		return;
	}
	var _input= "<input type='hidden' name='"+idselect+"[]' value='"+value+"' class='"+idselect+"widgetbuscar' />"+Texto;
	var _button = "<button class='btn removemultiple' type='button'><div class='icon-remove'></div></button>";
	$("#"+idselect).parent().append("<div>"+_input+_button+"</div>");
	$("#"+idselect).val(""); 
	
}
function addFieldMulti(idfield, value){
	_type = $("#"+idfield).attr("type");
	_name = $("#"+idfield).attr("name");
	if($("#"+idfield).hasClass("hasDatepicker")){
		 $("#"+idfield).removeClass("hasDatepicker");
		_class = $("#"+idfield).attr("class");
	}
	_placeholder = $("#"+idfield).attr("placeholder");
	_disabled = "";
	if(_type == "file" && value != ""){
		_type = "text";
		_class = _class+" disabled ";
		_disabled = " disabled "; 
	}
	var _input= "<input type='"+_type+"' name='"+_name+"' placeholder='"+_placeholder+"' class='"+_class+"' value='"+value+"' "+_disabled+" />"
	var _button = "<button class='btn removemultiple' type='button'><div class='icon-minus'></div></button>";
	$("#"+idfield).parent().append("<div>"+_input+_button+"</div>");
	if($("#"+idfield).hasClass("datetime")){
		$("[name='"+_name+"']").datetimepicker({
		    dateFormat: 'yy-mm-dd',
			timeFormat: 'HH:00'
		  });
	}
	
}


function recargar(){	
	var validarentero = /^[0-9]$/;
	if(!validarentero.test($("#iddato").val())){
		$("#iddato").val(idactual);
		return;		
	}
	location.href=baseUrl+'/'+modulo+'/'+control+'/edit/id/'+$("#iddato").val();
}


function loadpage(){	
	
	$('.combobox').combobox();
	
	var tooltips = $("form *").tooltip({
      position: { my: 'left center', at: 'right+10 center' },
      offset: [-2, 10],
      effect: "fade",
      opacity: 0.7
      });
    $("#viewhelpbutton").click(function() {tooltips.tooltip( "open" );})
    
	//$('.multiselect').multiselect({buttonClass: 'btn btn-primary'});

	$(".accionagregar > option").each(
		function(){
			if($(this).attr("value")=="-1"){
				$(this).css("color","#FF0000");
				$(this).addClass("nuevoregistro");
			}
		}
	);
	
	$("input.multiregis").each(
    	function(){
    		var idfield = $(this).attr("id");
    		$(this).parent().append("<button class='btn addmultiple' idfield='"+idfield+"' type='button'><div class='icon-plus'></div></button>");    	
    	}
    );
    
    $("input.multiregishidden").each(
    	function(){
    		
    		var idfield = $(this).attr("campoForm");
    		 
    		addFieldMulti(idfield, $(this).val());
    		$(this).parent().html("");

    	}
    );
    
	$("input.verificar").each(
		function(){
			_id = $(this).attr("id");    		
			_type = $(this).attr("type");
			_name = $(this).attr("name");
			_class = $(this).attr("class");				
			var _input= "<label class='control-label'>* Verificar:</label><div class='controls'><input id='"+_id+"-2' equalto='#"+$(this).attr("id")+"' type='"+_type+"' name='"+_name+"' class='"+_class+"' /></div>"
			$(this).parent().parent().after("<div class='control-group'>"+_input+"</div>");
			$(this).attr("equalto","#"+_id+"-2")
    	}
	);
    
   	$("select.widgetbuscar").each(
    	function(){
    		var idfield = $(this).attr("id");
    		$(this).parent().append("<button class='btn addwidgetbuscar' idfield='"+idfield+"' type='button'><div class='icon-ok'></div></button>");

    		$("#"+idfield+" option:selected").each(
    			function(){
    				var _input= "<input type='hidden' name='"+idfield+"[]' value='"+$(this).val()+"' class='"+idfield+"widgetbuscar' />"+$(this).text();
					var _button = "<button class='btn removemultiple' type='button'><div class='icon-remove'></div></button>";
					$("#"+idfield).parent().append("<div>"+_input+_button+"</div>");
    			}
    		)
    		$(this).attr("name","");
    		$(this).removeAttr("multiple");
    		$(this).val("");    	
    	}
    );	
}

function actualizarselect(data,id, backup){
	$(id).html("");
	for (j in data){
		value=j;
		if(j==0)
			value="";
		$(id).append('<option label="'+data[j]+'" value="'+value+'">'+data[j]+'</option>');		
	}
	$(id).val(backup);
	$(id).change();
	$(id).parent().addClass("success");
	setTimeout(
		function(){
			$(id).parent().removeClass("success");
		}
		,5000)
}

function actualizarcheckbox(data,id, modulo, control){
	
	html = '';
	for (j in data){
		value=j;
		if(j==0) value="";
		html = html + '<label class="checkbox"><input type="checkbox" name="'+id+'[]" id="'+id+'-'+value+'" value="'+value+'" entidad="'+control+'" modulo="'+modulo+'" class="   multiple'+id+'">'+data[j]+'</label>';
	}
	console.log(html);
	$('[name="'+id+'[]"]').parents('div.controls').html(html);
}

function changeselect(propiedad, id, selectactualizar, backup, modulo, control){
	$('#'+selectactualizar).val("");
	url = baseUrl+'/'+modulo+'/'+control+'/dependency/propiedad/'+propiedad+'/id/'+id;
	//$.getJSON(url, function(data) { actualizarselect(data,'#'+selectactualizar, backup );});
	$.ajax({
		url: url,
		dataType: 'json',
		async: false
	}).done(function(data) { actualizarselect(data,'#'+selectactualizar, backup )});
}

function changecheckbox(propiedad, id, checkboxctualizar, modulo, control){
	url = baseUrl+'/'+modulo+'/'+control+'/dependency/propiedad/'+propiedad+'/id/'+id;
	$.ajax({
		url: url,
		dataType: 'json',
		async: false
	}).done(function(data) { actualizarcheckbox(data,checkboxctualizar, modulo, control)});
}

function verificarunico(data, id){	
	id.popover('destroy');
	id.popover({
		title: id.val()+" ya esta registrado",
		content: "Debe ingresar el dato nuevamente",
		placement: 'top',
		trigger: 'manual'
	});
	if(data>0){
		id.parent().addClass("error");
		id.popover('show');
		id.val("");
	}else{
		id.parent().removeClass("error");
		id.popover('destroy');
	}
}
