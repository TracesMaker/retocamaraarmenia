<?php
class EasyBib_View_Helper_FeedBack  extends Zend_Controller_Action_Helper_Abstract{
	public function __construct(){
	}
}
?>
<div id="TheFeedbackButton">
	Feedback <i class="icon-bullhorn"></i>
</div>

<div class="help hide">
	<div class="help_wrapper">
		
	</div>
</div>
<script type="text/javascript">	

var EFproyectoname = "Clientes Caudata";
var EFIdproyecto = "";
var EFtoken = "";

$(document).ready(function(){

	$("#TheFeedbackButton").click(
			function(){

				verificarsesion();
			}
		);

	$("#closeFeedbackButton").live('click',
			function(){
				$(".help").hide();
			}
		);

	
});

function verificarsesion(){
	//http://50.23.86.178/mvpgenerador/public/default/authentication/verificar
	$.ajax( {
		type:'POST',
		url:'http://app.easydev.co/authentication/verificar',
		data: "easyfeedtoken="+EFtoken+'&easyfeedproyecto='+EFIdproyecto,
		dataType : 'jsonp',
		success:function(data) {

		}
	})
}

function functionVerificarCall(data=""){

if(data.login==1){		
		cargarindex($(location).attr('href'));
		$(".help").show();
}
else
	alert("Error al Iniciar Sesion, Token Incorrecto");
	
}

function cargarindex(url){
	//http://50.23.86.178/mvpgenerador/public/feed/threadfeed/list
	$.ajax( {
		type:'POST',
		url:'http://app.easydev.co/feed/threadfeed/list',
		data: 'easyfeedurl='+url+'&easyfeedproyecto='+EFIdproyecto,
		dataType : 'jsonp',
		success:function(data) {

		}
	})
}

function functionCargarIndexCall(data=""){


	var html = 
			'<div id="form_index">'+
			'<div class="navbar navbar-inverse">'+
				'<div class="navbar-inner">'+
					'<ul class="nav" id="opcionfeed">'+
						'<li><a href="#" id="addFeedbackButton"><i class="icon-plus"></i> Nuevo</a></li>'+
						'<li><a href="#" id="closeFeedbackButton"><i class="icon-remove"></i> Cerrar</a></li>'+
					'</ul>'+
				'</div>'+
			'</div>'+
		    '<table class="table  table-bordered table-hover table-condensed">'+
		    	'<thead>'+
					'<tr>'+
						'<th>TÃ­tulo</th>'+
						'<th  width="30px">Detalles</th>'+
					'</tr>'+
				'</thead>'+
				'<tbody>';
				$.each(data, function(k,v){
					html+='<tr><td>'+v.thrtitulo+'</td><td  class="btn-group"><button class="btn detailFeedbackButton" id='+v.thread_id+'><i class="icon-eye-open"></i> Ver</button></td></tr>';
					
					});
				html+='</tbody>'+
			'</table>'+
		'</div>';
		$('.help_wrapper').html(html);
	}


	

	$("#addFeedbackButton").live('click',
		function(){
			$('.help_wrapper').html(get_html_add());
		}
	);

	$("#cancelAddFeedbackButton").live('click',
		function(){
			cargarindex($(location).attr('href'));
		}
	);
	$("#sendFeedbackButton").live('click',
		function(){
		//http://50.23.86.178/mvpgenerador/public/feed/threadfeed/add
			$.ajax( {
				type:'POST',
				url:'http://app.easydev.co/feed/threadfeed/add',
				data: $("#threadform").serialize(),
				dataType : 'jsonp',
				success:function(data) {

				}
			})
		}
	);

	function functionThreadAddCall(data=""){
		cargarindex($(location).attr('href'));
	}

	$("#sendEntradaButton").live('click',
			function(){
			//http://50.23.86.178/mvpgenerador/public/feed/threadfeed/add
				$.ajax( {
					type:'POST',
					url:'http://app.easydev.co/feed/entradafeed/add',
					data: $("#entradaform").serialize(),
					dataType : 'jsonp',
					success:function(data) {

					}
				})
			}
		);

	function functionEntradaAddCall(data=""){
		cargarhistorial(data.thread_id);
	}
	
	$(".detailFeedbackButton").live('click',
		function(){
			//$(this).val();
			id=$(this).attr('id');
			cargarhistorial(id);
			//$('.help_wrapper').html(get_html_detail());
		}
	);

	function cargarhistorial(id){
		//http://50.23.86.178/mvpgenerador/public/feed/threadfeed/list
		$.ajax( {
			type:'POST',
			url:'http://app.easydev.co/feed/entradafeed/list',
			data: 'entthread='+id,
			dataType : 'jsonp',
			success:function(data) {

			}
		})
	}

	function functionCargarHistorialCall(data=""){
		var html = 
		'<div id="form_details" class="">'+
			'<fieldset>'+
				'<legend>Historial de conversaciÃ³n</legend>'+
						'<div class="popover bottom">'+
							'<div class="arrow"></div>'+
			            	'<h3 class="popover-title">'+data.thrtitulo+'</h3>'+
				            '<div class="popover-content">'+
				              '<p>'+data.thrdetalles+'</p>'+
				            '</div>'+
		        		'</div>';
		        		$.each(data.comentarios, function(k,v){
			        		if(v.enttipo==1){
							html+='<div class="popover right">'+
			            	'<div class="arrow"></div>'+
				            '<div class="popover-content">'+
				              '<p>'+v.entcomentario+'</p>'+
				            '</div>'+
		        		'</div>';}
			        		else{
			        			html+='<div class="popover left">'+
				            	'<div class="arrow"></div>'+
					            '<div class="popover-content">'+
					              '<p>'+v.entcomentario+'</p>'+
					            '</div>'+
			        		'</div>';
			        		}
							
							});		
		        		
		       html+=					    
		        	'</div>'+
		    '</fieldset>'+
		    '<div id="form_add" class="">'+
		    '<form id="entradaform" class="">'+
		    	'<fieldset>'+
		    		'<legend>Responder</legend>'+
		    		'<div class="control-group">'+
						'<div class="controls">'+
							'<textarea rows="2" name="comentario" id="comentario"></textarea>'+
						'</div>'+
		    		'</div>'+
				    '<div class="control-group">'+
					    '<div class="form-actions">'+
						    '<button id="sendEntradaButton" type="button" class="btn btn-primary ">Enviar</button>'+
						    '<button id="cancelAddFeedbackButton" type="button" class="btn btn-inverse ">Cancelar</button>'+
					    '</div>'+
				    '</div>'+
		    	'</fieldset>'+
		    		'<input type="hidden" name="thread_id" id="thread_id" value="'+data.thread_id+'" />'+
				    '<input type="hidden" name="easyfeedurl" id="easyfeedurl" value="'+$(location).attr('href')+'" />'+
				    '<input type="hidden" name="easyfeedproyecto" id="easyfeedproyecto" value="'+EFIdproyecto+'" />'+
		    '</form>'+
		'</div>'+
		'</div>';
			$('.help_wrapper').html(html);
		}


	function get_html_add(){

		var html = 
			'<div id="form_add" class="">'+
			    '<form id="threadform" class="">'+
			    	'<fieldset>'+
			    		'<legend>EnvÃ­anos tus comentarios</legend>'+
			    		'<div class="control-group">'+
			    			'<label class="control-label optional" for="titulo">*TÃ­tulo</label>'+
							'<div class="controls">'+
								'<input type="text" value="" id="titulo" name="titulo" placeholder="Pregunta, Comentario, Sugerencia o Queja">'+
							'</div>'+
						'</div>'+
			    		'<div class="control-group">'+
			    		 	'<label class="control-label optional" for="comentario">Descripcion</label>'+
							'<div class="controls">'+
								'<textarea rows="3" name="descripcion" id="descripcion"></textarea>'+
							'</div>'+
			    		'</div>'+
					    '<div class="control-group">'+
						    '<div class="form-actions">'+
							    '<button id="sendFeedbackButton" type="button" class="btn btn-primary ">Enviar</button>'+
							    '<button id="cancelAddFeedbackButton" type="button" class="btn btn-inverse ">Cancelar</button>'+
						    '</div>'+
					    '</div>'+
			    	'</fieldset>'+
			    	'<input type="hidden" name="easyfeedurl" id="easyfeedurl" value="'+$(location).attr('href')+'" />'+
				    '<input type="hidden" name="easyfeedproyecto" id="easyfeedproyecto" value="'+EFIdproyecto+'" />'+
			    '</form>'+
			'</div>';
		return html;
	}

	
</script>
<style type="text/css">
	#TheFeedbackButton {
	    background: none repeat scroll 0 0 #000;
	    border: 1px solid rgba(0, 0, 0, 0.5);
	    border-radius: 10px 10px 2px 2px;
	    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.5), 0 1px rgba(255, 255, 255, 0.3) inset, 0 10px rgba(255, 255, 255, 0.2) inset, 0 10px 20px rgba(255, 255, 255, 0.25) inset, 0 -15px 30px rgba(0, 0, 0, 0.3) inset;
	    color: #FFF;
	    font-weight: bold;
	    cursor: pointer;
	    font-family: "'Lucida Grande', Helvetica, Verdana, Arial, sans-serif";
	    font-size: 18px;
	    font-weight: normal;
	    height: 50px;
	    left: -50px;
	    opacity: 0.7;
	    padding: 10px;
	    position: fixed;
	    text-align: center;
	    top: 25%;
	    -webkit-transform: rotate(90deg);
     	-moz-transform: rotate(90deg);
      	-ms-transform: rotate(90deg);
       	-o-transform: rotate(90deg);
        transform: rotate(90deg);
	}
	.help {
		position: 				fixed;
		top: 					0;
		z-index: 				1500;
		float: 					left;
		width: 					100%;
		right: 					0px;
		height: 				100%;
		background-color: 		rgba(0,0,0,0.6);
	}

	.help_wrapper {
		float:right;
		height:100%;
		width:40%;
		background:#FFFFFF;
		color:#333333;
		font-size: 12px;
		padding: 5px 30px;
		overflow: auto;
	}


	#entradaform textarea,
	#entradaform input{
		width: 98%;
	}
	.form-actions.title{
		margin-bottom: 5px;
	    margin-top: 0px;
	    padding: 10px 20px 5px;
	}

#form_details .popover {
    display: block;
    float: left;
    margin: 20px;
    position: relative;
    width: 90%;
}
</style>

