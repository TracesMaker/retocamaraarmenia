
function actividadesfundamentales(baseUrl){
	$(document).on("click", "#saveactividadesfundamentales", function(event){
		var idguardar = $('#actividadesfundamentales_id').val();
		if(idguardar == ""){
			ruta = 'add';
		}else if(idguardar >0){
			ruta = 'edit/id/'+idguardar;
		}

		$.post(baseUrl+"/reto/actividadesfundamentales/"+ruta, $("#actividadesfundamentalesform").serialize(),
			function(data) {
				if (data.id<0) {
					alert("Error al agregar");
				} else {
					$('#newactividadesfundamentales').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					var Content_actividadesfundamentales = $("#div-actividadesfundamentales");
                    Request_actividadesfundamentales = baseUrl+"/reto/actividadesfundamentales/list";
      				Content_actividadesfundamentales.load(Request_actividadesfundamentales,function(response, status, xhr) {});
				}
			}
		)
     
    });

   $(document).on("click", "#actividadesfundamentalesTable .deleteaction", function(){
		_request = $(this).attr("request");
		if (confirm("¿Esta seguro de eliminar el registro seleccionado?")){
			$.post( _request, function(data){ 
				if(data.id > 0){
					var Content = $("#div-actividadesfundamentales");
                    Request = baseUrl+"/reto/actividadesfundamentales/list";
      				Content.load(Request,function(response, status, xhr) {});
				} else {
					alert("No fue posible eliminar");					
				}
			});
		}
	});

   	$(document).on("click", "#actividadesfundamentalesTable .editaction", function(){
		iditem = $(this).attr("iditem");
		
		_request = $(this).attr("request");
			$.post( _request, function(data){
				$('#newactividadesfundamentales .modtitle').text('Editar Actividad');
				$('#saveactividadesfundamentales').text('GUARDAR');
				$('#actividadesfundamentales_id').val(data.datos.actividadesfundamentales_id); 
				$('#actividadesfundamentalesform #actividades').val(data.datos.actividades); 
				$('#actividadesfundamentalesform #resultadoactividad').val(data.datos.resultadoactividad); 
				$('#actividadesfundamentalesform #tiempoactividad').val(data.datos.tiempoactividad); 
			});
	});

   	$(document).on("click", "#addnewactividadesfundamentales", function(){
		$('#newactividadesfundamentales .modtitle').text('Nueva Actividad');
		$('#saveactividadesfundamentales').text('AGREGAR');
		$('#actividadesfundamentales_id').val(""); 
		$('#actividadesfundamentalesform #actividades').val(""); 
		$('#actividadesfundamentalesform #resultadoactividad').val("");
		$('#actividadesfundamentalesform #tiempoactividad').val("");
	});
}

function riesgos(baseUrl){

	$(document).on("click", "#saveriesgos", function(event){
		var idguardar = $('#riesgos_id').val();
		if(idguardar == ""){
			ruta = 'add';
		}else if(idguardar >0){
			ruta = 'edit/id/'+idguardar;
		}

		$.post(baseUrl+"/reto/riesgos/"+ruta, $("#riesgosform").serialize(),
			function(data) {
				if (data.id<0) {
					alert("Error al agregar");
				} else {
					$('#newriesgos').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					var Content_riesgos = $("#div-riesgos");
                    Request_riesgos = baseUrl+"/reto/riesgos/list";
      				Content_riesgos.load(Request_riesgos,function(response, status, xhr) {});
				}
			}
		)
     
    });

   
    $(document).on("click", "#riesgosTable .deleteaction", function(){
		_request = $(this).attr("request");
		if (confirm("¿Esta seguro de eliminar el registro seleccionado?")){
			$.post( _request, function(data){ 
				if(data.id > 0){
					var Content = $("#div-riesgos");
                    Request = baseUrl+"/reto/riesgos/list";
      				Content.load(Request,function(response, status, xhr) {});
				} else {
					alert("No fue posible eliminar");					
				}
			});
		}
	});

    $(document).on("click", "#riesgosTable .editaction", function(){
		iditem = $(this).attr("iditem");
		
		_request = $(this).attr("request");
			$.post( _request, function(data){
				$('#newriesgos .modtitle').text('Editar Riesgo');
				$('#saveriesgos').text('GUARDAR');
				$('#riesgos_id').val(data.datos.riesgos_id); 
				$('#riesgosform #riesgo').val(data.datos.riesgo); 
				$('#riesgosform #descripcion').val(data.datos.descripcion); 
				$('#riesgosform #impacto').val(data.datos.impacto); 
				$('#riesgosform #probabilidad').val(data.datos.probabilidad); 
			});
	});

    $(document).on("click", "#addnewriesgos", function(){
		$('#newriesgos .modtitle').text('Nuevo Riesgo');
		$('#saveriesgos').text('AGREGAR');
		$('#riesgos_id').val(""); 
		$('#riesgosform #riesgo').val(""); 
		$('#riesgosform #descripcion').val("");
		$('#riesgosform #impacto').val("");
		$('#riesgosform #probabilidad').val("");
	});
}

function caracteristicasprincipalessolucion(baseUrl){
	$(document).on("click", "#savecaracteristicasprincipalessolucion", function(event){
		var idguardar = $('#caracteristicasprincipalessolucion_id').val();
		if(idguardar == ""){
			ruta = 'add';
		}else if(idguardar >0){
			ruta = 'edit/id/'+idguardar;
		}

		$.post(baseUrl+"/reto/caracteristicasprincipalessolucion/"+ruta, $("#caracteristicasprincipalessolucionform").serialize(),
			function(data) {
				if (data.id<0) {
					alert("Error al agregar");
				} else {
					$('#newcaracteristicasprincipalessolucion').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					var Content_caracteristicasprincipalessolucion = $("#div-caracteristicasprincipalessolucion");
                    Request_caracteristicasprincipalessolucion = baseUrl+"/reto/caracteristicasprincipalessolucion/list";
      				Content_caracteristicasprincipalessolucion.load(Request_caracteristicasprincipalessolucion,function(response, status, xhr) {});
				}
			}
		)
     
    });

   $(document).on("click", "#caracteristicasprincipalessolucionTable .deleteaction", function(){
		_request = $(this).attr("request");
		if (confirm("¿Esta seguro de eliminar el registro seleccionado?")){
			$.post( _request, function(data){ 
				if(data.id > 0){
					var Content = $("#div-caracteristicasprincipalessolucion");
                    Request = baseUrl+"/reto/caracteristicasprincipalessolucion/list";
      				Content.load(Request,function(response, status, xhr) {});
				} else {
					alert("No fue posible eliminar");					
				}
			});
		}
	});

    $(document).on("click", "#caracteristicasprincipalessolucionTable .editaction", function(){
		iditem = $(this).attr("iditem");
		_request = $(this).attr("request");
			$.post( _request, function(data){
				$('#newcaracteristicasprincipalessolucion .modtitle').text('Editar Caracteristica Principal');
				$('#savecaracteristicasprincipalessolucion').text('GUARDAR');
				$('#caracteristicasprincipalessolucion_id').val(data.datos.caracteristicasprincipalessolucion_id); 
				$('#caracteristicasprincipalessolucionform #atributo').val(data.datos.atributo); 
				$('#caracteristicasprincipalessolucionform #descripcionatributo').val(data.datos.descripcionatributo); 
				$('#caracteristicasprincipalessolucionform #diferenciador').val(data.datos.diferenciador); 
				$('#caracteristicasprincipalessolucionform #ventajas').val(data.datos.ventajas); 
			});
	});

    $(document).on("click", "#addnewcaracteristicasprincipalessolucion", function(){
		$('#newcaracteristicasprincipalessolucion .modtitle').text('Nueva Caracteristica Principal');
		$('#savecaracteristicasprincipalessolucion').text('AGREGAR');
		$('#caracteristicasprincipalessolucion_id').val(""); 
		$('#caracteristicasprincipalessolucionform #atributo').val(""); 
		$('#caracteristicasprincipalessolucionform #descripcionatributo').val("");
		$('#caracteristicasprincipalessolucionform #diferenciador').val("");
		$('#caracteristicasprincipalessolucionform #ventajas').val("");
	});

}

function elementostangibles(baseUrl){
	$(document).on("click", "#saveelementostangibles", function(event){
		var idguardar = $('#elementostangibles_id').val();
		if(idguardar == ""){
			ruta = 'add';
		}else if(idguardar >0){
			ruta = 'edit/id/'+idguardar;
		}

		$.post(baseUrl+"/reto/elementostangibles/"+ruta, $("#elementostangiblesform").serialize(),
			function(data) {
				if (data.id<0) {
					alert("Error al agregar");
				} else {
					$('#newelementostangibles').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					var Content_elementostangibles = $("#div-elementostangibles");
                    Request_elementostangibles = baseUrl+"/reto/elementostangibles/list";
      				Content_elementostangibles.load(Request_elementostangibles,function(response, status, xhr) {});
				}
			}
		)
     
    });

    $(document).on("click", "#elementostangiblesTable .deleteaction", function(){
		_request = $(this).attr("request");
		if (confirm("¿Esta seguro de eliminar el registro seleccionado?")){
			$.post( _request, function(data){ 
				if(data.id > 0){
					var Content = $("#div-elementostangibles");
                    Request = baseUrl+"/reto/elementostangibles/list";
      				Content.load(Request,function(response, status, xhr) {});
				} else {
					alert("No fue posible eliminar");					
				}
			});
		}
	});

    $(document).on("click", "#elementostangiblesTable .editaction", function(){	
		iditem = $(this).attr("iditem");
		
		_request = $(this).attr("request");
			$.post( _request, function(data){
				$('#newelementostangibles .modtitle').text('Editar Elemento Tangible');
				$('#saveelementostangibles').text('GUARDAR');
				$('#elementostangibles_id').val(data.datos.elementostangibles_id); 
				$('#elementostangiblesform #elementofisico').val(data.datos.elementofisico); 
				$('#elementostangiblesform #descripcion').val(data.datos.descripcion); 
				$('#elementostangiblesform #funcionenlasolucion').val(data.datos.funcionenlasolucion); 
			});
	});

    $(document).on("click", "#addnewelementostangibles", function(){	
		$('#newelementostangibles .modtitle').text('Nuevo Elemento Tangible');
		$('#saveelementostangibles').text('AGREGAR');
		$('#elementostangibles_id').val(""); 
		$('#elementostangiblesform #elementofisico').val(""); 
		$('#elementostangiblesform #descripcion').val("");
		$('#elementostangiblesform #funcionenlasolucion').val("");
	});
}

function indicadores(baseUrl){
	$(document).on("click", "#saveindicadores", function(event){	
		var idguardar = $('#indicadores_id').val();
		if(idguardar == ""){
			ruta = 'add';
		}else if(idguardar >0){
			ruta = 'edit/id/'+idguardar;
		}

		$.post(baseUrl+"/reto/indicadores/"+ruta, $("#indicadoresform").serialize(),
			function(data) {
				if (data.id<0) {
					alert("Error al agregar");
				} else {
					$('#newindicadores').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					var Content_indicadores = $("#div-indicadores");
                    Request_indicadores = baseUrl+"/reto/indicadores/list";
      				Content_indicadores.load(Request_indicadores,function(response, status, xhr) {});
				}
			}
		)
     
    });

   	$(document).on("click", "#indicadoresTable .deleteaction", function(){
		_request = $(this).attr("request");
		if (confirm("¿Esta seguro de eliminar el registro seleccionado?")){
			$.post( _request, function(data){ 
				if(data.id > 0){
					var Content = $("#div-indicadores");
                    Request = baseUrl+"/reto/indicadores/list";
      				Content.load(Request,function(response, status, xhr) {});
				} else {
					alert("No fue posible eliminar");					
				}
			});
		}
	});

   	$(document).on("click", "#indicadoresTable .editaction", function(){
		iditem = $(this).attr("iditem");
		_request = $(this).attr("request");
			$.post( _request, function(data){
				$('#newindicadores .modtitle').text('Editar Indicador');
				$('#saveindicadores').text('GUARDAR');
				$('#indicadores_id').val(data.datos.indicadores_id); 
				$('#indicadoresform #indicador').val(data.datos.indicador); 
				$('#indicadoresform #descripcion').val(data.datos.descripcion); 
			});
	});

   	$(document).on("click", "#addnewindicadores", function(){
		$('#newindicadores .modtitle').text('Nuevo Indicador');
		$('#saveindicadores').text('AGREGAR');
		$('#indicadores_id').val(""); 
		$('#indicadoresform #indicador').val(""); 
		$('#indicadoresform #descripcion').val("");
	});

}

function caracteristicasprincipalesimplementacion(baseUrl){

	$(document).on("click", "#savecaracteristicasprincipalesimplementacion", function(event){
		var idguardar = $('#caracteristicasprincipalesimplementacion_id').val();
		if(idguardar == ""){
			ruta = 'add';
		}else if(idguardar >0){
			ruta = 'edit/id/'+idguardar;
		}

		$.post(baseUrl+"/reto/caracteristicasprincipalesimplementacion/"+ruta, $("#caracteristicasprincipalesimplementacionform").serialize(),
			function(data) {
				if (data.id<0) {
					alert("Error al agregar");
				} else {
					$('#newcaracteristicasprincipalesimplementacion').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					var Content_caracteristicasprincipalesimplementacion = $("#div-caracteristicasprincipalesimplementacion");
                    Request_caracteristicasprincipalesimplementacion = baseUrl+"/reto/caracteristicasprincipalesimplementacion/list";
      				Content_caracteristicasprincipalesimplementacion.load(Request_caracteristicasprincipalesimplementacion,function(response, status, xhr) {});
				}
			}
		)
     
    });

    $(document).on("click", "#caracteristicasprincipalesimplementacionTable .deleteaction", function(){
		_request = $(this).attr("request");
		if (confirm("¿Esta seguro de eliminar el registro seleccionado?")){
			$.post( _request, function(data){ 
				if(data.id > 0){
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					var Content = $("#div-caracteristicasprincipalesimplementacion");
                    Request = baseUrl+"/reto/caracteristicasprincipalesimplementacion/list";
      				Content.load(Request,function(response, status, xhr) {});
				} else {
					alert("No fue posible eliminar");					
				}
			});
		}
	});

    $(document).on("click", "#caracteristicasprincipalesimplementacionTable .editaction", function(){
		iditem = $(this).attr("iditem");
		
		_request = $(this).attr("request");
			$.post( _request, function(data){
				$('#newcaracteristicasprincipalesimplementacion .modtitle').text('Editar Caracteristica Implementacion');
				$('#savecaracteristicasprincipalesimplementacion').text('GUARDAR');
				$('#caracteristicasprincipalesimplementacion_id').val(data.datos.caracteristicasprincipalesimplementacion_id); 
				$('#caracteristicasprincipalesimplementacionform #gradodeldesarrollo').val(data.datos.gradodeldesarrollo); 
				$('#caracteristicasprincipalesimplementacionform #estadodeldesarrollo').val(data.datos.estadodeldesarrollo); 
				$('#caracteristicasprincipalesimplementacionform #aspectospendientes').val(data.datos.aspectospendientes); 
				$('#caracteristicasprincipalesimplementacionform #atributobasico').val(data.datos.atributobasico); 
			});
	});

    $(document).on("click", "#addnewcaracteristicasprincipalesimplementacion", function(){
		$('#newcaracteristicasprincipalesimplementacion .modtitle').text('Nueva Caracteristica Implementacion');
		$('#savecaracteristicasprincipalesimplementacion').text('AGREGAR');
		$('#caracteristicasprincipalesimplementacion_id').val(""); 
		$('#caracteristicasprincipalesimplementacionform #gradodeldesarrollo').val(""); 
		$('#caracteristicasprincipalesimplementacionform #estadodeldesarrollo').val("");
		$('#caracteristicasprincipalesimplementacionform #aspectospendientes').val("");
		$('#caracteristicasprincipalesimplementacionform #atributobasico').val("");
	});
}

function otrosdesarrollos(baseUrl){
	$(document).on("click", "#saveotrosdesarrollos", function(event){
		var idguardar = $('#otrosdesarrollos_id').val();
		if(idguardar == ""){
			ruta = 'add';
		}else if(idguardar >0){
			ruta = 'edit/id/'+idguardar;
		}

		$.post(baseUrl+"/reto/otrosdesarrollos/"+ruta, $("#otrosdesarrollosform").serialize(),
			function(data) {
				if (data.id<0) {
					alert("Error al agregar");
				} else {
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					var Content_otrosdesarrollos = $("#div-otrosdesarrollos");
                    Request_otrosdesarrollos = baseUrl+"/reto/otrosdesarrollos/list";
      				Content_otrosdesarrollos.load(Request_otrosdesarrollos,function(response, status, xhr) {});
				}
			}
		)
     
    });

   	$(document).on("click", "#otrosdesarrollosTable .deleteaction", function(){
		_request = $(this).attr("request");
		if (confirm("¿Esta seguro de eliminar el registro seleccionado?")){
			$.post( _request, function(data){ 
				if(data.id > 0){
					var Content = $("#div-otrosdesarrollos");
                    Request = baseUrl+"/reto/otrosdesarrollos/list";
      				Content.load(Request,function(response, status, xhr) {});
				} else {
					alert("No fue posible eliminar");					
				}
			});
		}
	});

   	$(document).on("click", "#otrosdesarrollosTable .editaction", function(){
		iditem = $(this).attr("iditem");
		_request = $(this).attr("request");
			$.post( _request, function(data){
				$('#newotrosdesarrollos .modtitle').text('Editar Desarrollo');
				$('#saveotrosdesarrollos').text('GUARDAR');
				$('#otrosdesarrollos_id').val(data.datos.otrosdesarrollos_id); 
				$('#otrosdesarrollosform #desarrollocomplementario').val(data.datos.desarrollocomplementario); 
				$('#otrosdesarrollosform #porque').val(data.datos.porque); 
			});
	});

   	$(document).on("click", "#addnewotrosdesarrollos", function(){
		$('#newotrosdesarrollos .modtitle').text('Nuevo Desarrollo');
		$('#saveotrosdesarrollos').text('AGREGAR');
		$('#otrosdesarrollos_id').val(""); 
		$('#otrosdesarrollosform #desarrollocomplementario').val(""); 
		$('#otrosdesarrollosform #porque').val("");
	});

}

function riesgostecnicos(baseUrl){
	$(document).on("click", "#saveriesgostecnicos", function(event){
		var idguardar = $('#riesgostecnicos_id').val();
		if(idguardar == ""){
			ruta = 'add';
		}else if(idguardar >0){
			ruta = 'edit/id/'+idguardar;
		}

		$.post(baseUrl+"/reto/riesgostecnicos/"+ruta, $("#riesgostecnicosform").serialize(),
			function(data) {
				if (data.id<0) {
					alert("Error al agregar");
				} else {
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					var Content_riesgostecnicos = $("#div-riesgostecnicos");
                    Request_riesgostecnicos = baseUrl+"/reto/riesgostecnicos/list";
      				Content_riesgostecnicos.load(Request_riesgostecnicos,function(response, status, xhr) {});
				}
			}
		)
     
    });

   	$(document).on("click", "#riesgostecnicosTable .deleteaction", function(){
		_request = $(this).attr("request");
		if (confirm("¿Esta seguro de eliminar el registro seleccionado?")){
			$.post( _request, function(data){ 
				if(data.id > 0){
					var Content = $("#div-riesgostecnicos");
                    Request = baseUrl+"/reto/riesgostecnicos/list";
      				Content.load(Request,function(response, status, xhr) {});
				} else {
					alert("No fue posible eliminar");					
				}
			});
		}
	});

   	$(document).on("click", "#riesgostecnicosTable .editaction", function(){
		iditem = $(this).attr("iditem");
		
		_request = $(this).attr("request");
			$.post( _request, function(data){
				$('#newriesgostecnicos .modtitle').text('Editar Riesgo Tecnico');
				$('#saveriesgostecnicos').text('GUARDAR');
				$('#riesgostecnicos_id').val(data.datos.riesgostecnicos_id); 
				$('#riesgostecnicosform #nombredelriesgo').val(data.datos.nombredelriesgo); 
				$('#riesgostecnicosform #descripcion').val(data.datos.descripcion); 
				$('#riesgostecnicosform #probabilidad').val(data.datos.probabilidad); 
				$('#riesgostecnicosform #impacto').val(data.datos.impacto); 
				$('#riesgostecnicosform #prevencion').val(data.datos.prevencion); 
			});
	});

   	$(document).on("click", "#addnewriesgostecnicos", function(){
		$('#newriesgostecnicos .modtitle').text('Nuevo Riesgo Tecnico');
		$('#saveriesgostecnicos').text('AGREGAR');
		$('#riesgostecnicos_id').val(""); 
		$('#riesgostecnicosform #nombredelriesgo').val(""); 
		$('#riesgostecnicosform #descripcion').val("");
		$('#riesgostecnicosform #probabilidad').val("");
		$('#riesgostecnicosform #impacto').val("");
		$('#riesgostecnicosform #prevencion').val("");
	});
}

function solucionessimilares(baseUrl){
	$(document).on("click", "#savesolucionessimilares", function(event){
		var idguardar = $('#solucionessimilares_id').val();
		if(idguardar == ""){
			ruta = 'add';
		}else if(idguardar >0){
			ruta = 'edit/id/'+idguardar;
		}

		$.post(baseUrl+"/reto/solucionessimilares/"+ruta, $("#solucionessimilaresform").serialize(),
			function(data) {
				if (data.id<0) {
					alert("Error al agregar");
				} else {
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					var Content_solucionessimilares = $("#div-solucionessimilares");
                    Request_solucionessimilares = baseUrl+"/reto/solucionessimilares/list";
      				Content_solucionessimilares.load(Request_solucionessimilares,function(response, status, xhr) {});
				}
			}
		)
     
    });

   	$(document).on("click", "#solucionessimilaresTable .deleteaction", function(){
		_request = $(this).attr("request");
		if (confirm("¿Esta seguro de eliminar el registro seleccionado?")){
			$.post( _request, function(data){ 
				if(data.id > 0){
					var Content = $("#div-solucionessimilares");
                    Request = baseUrl+"/reto/solucionessimilares/list";
      				Content.load(Request,function(response, status, xhr) {});
				} else {
					alert("No fue posible eliminar");					
				}
			});
		}
	});

   	$(document).on("click", "#solucionessimilaresTable .editaction", function(){
		iditem = $(this).attr("iditem");
		_request = $(this).attr("request");
			$.post( _request, function(data){
				$('#newsolucionessimilares .modtitle').text('Editar Solucion');
				$('#savesolucionessimilares').text('GUARDAR');
				$('#solucionessimilares_id').val(data.datos.solucionessimilares_id); 
				$('#solucionessimilaresform #soluciondesarrollada').val(data.datos.soluciondesarrollada); 
				$('#solucionessimilaresform #anodesarrollo').val(data.datos.anodesarrollo); 
				$('#solucionessimilaresform #quienladesarrollo').val(data.datos.quienladesarrollo); 
				$('#solucionessimilaresform #resultadosobtenidos').val(data.datos.resultadosobtenidos); 
				$('#solucionessimilaresform #dificultadespresentadas').val(data.datos.dificultadespresentadas); 
			});
	});

   	$(document).on("click", "#addnewsolucionessimilares", function(){
		$('#newsolucionessimilares .modtitle').text('Nueva Solucion');
		$('#savesolucionessimilares').text('AGREGAR');
		$('#solucionessimilares_id').val(""); 
		$('#solucionessimilaresform #soluciondesarrollada').val(""); 
		$('#solucionessimilaresform #anodesarrollo').val("");
		$('#solucionessimilaresform #quienladesarrollo').val("");
		$('#solucionessimilaresform #resultadosobtenidos').val("");
		$('#solucionessimilaresform #dificultadespresentadas').val("");
	});
}


