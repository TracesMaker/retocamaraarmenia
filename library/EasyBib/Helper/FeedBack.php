<?php
class EasyBib_Helper_FeedBack  extends Zend_Controller_Action_Helper_Abstract{
	public function __construct(){
	}
}
?>
	<!-- <div id="TheFeedbackButton">
		Feedback <i class="icon-bullhorn"></i>
	</div> -->

	<div class="help hide">
		<div class="help_wrapper">
					<div id="formregistrar" class="">
					    <form id="feedbackform" class="">
					    	<fieldset>
					    		<legend>Envíanos tus comentarios</legend>
					    		<div class="form-actions title">
					    				<strong>¿Por qué esta información es importante?</strong>
						    			<ul>
						    				<li>
									    		Estamos comprometidos en apoyarlo, lo que significa que nuestra gente y los productos deben evolucionar para satisfacer las necesidades de cada cliente.
						    				</li>
						    				<li>
									    		Queremos saber lo que está pensando, sintiendo, y esperar de nuestra interfaz de usuario.
						    				</li>
						    				<li>
									    		No podemos responder a cada pieza de información, pero vamos a hacer todo lo posible.
						    				</li>
						    			</ul>
							    </div>
					    		<div class="control-group">
					    			<label class="control-label optional" for="titulo">* Por favor, díganos lo que piensa</label>
									<div class="controls">
										<input type="text" value="" id="feedcomentario" name="feedcomentario" placeholder="Pregunta, Comentario, Sugerencia o Queja">
									</div>
								</div>
					    		<div class="control-group">
					    		 	<label class="control-label optional" for="comentario">¿Por qué es esto importante para usted?</label>
									<div class="controls">
										<textarea rows="3" name="feeddetalle" id="feeddetalle"></textarea>
									</div>
					    		</div>
					    		<div class="control-group">
					    			<label class="control-label optional" for="titulo">¿Quiere que contactemos con usted?</label>
									<div class="controls">									
										<select class=" " id="feedcontactar" name="feedcontactar">
										    <option label="No" value="0">No</option>
										    <option label="Sí" value="1">Sí</option>
										</select>
									</div>
								</div>
							    <div class="control-group">
								    <div class="form-actions">
									    <button id="submitfeedback" type="button" class="btn btn-primary " idform="feedbackform" control="feedback" modulo="feed">Enviar</button>
									    <button id="closeFeedbackButton" type="button" class="btn btn-inverse ">Cancelar</button>
								    </div>
							    </div>
					    	</fieldset>
							    <input type="hidden" name="feedback_id" id="feedback_id" />
					    </form>
					</div>
			</div>
	</div>
<script type="text/javascript">
	$("#menu-TheFeedbackButton").click(
		function(event){
			event.preventDefault();
			$(".help").show();
		}
	);
	$("#closeFeedbackButton").click(
		function(){
			$(".help").hide();
		}
	);
	$("#submitfeedback").click(
			function(){
				$(this).button('loading');
				var _idform=$(this).attr("idform");
				var _control=$(this).attr("control");
				var _modulo=$(this).attr("modulo");
				if($("#"+_idform).valid()){
					$.post(baseUrl+"/"+_modulo+"/"+_control+"/add", $("#"+_idform).serialize(),
						function(data) {
							if(data.id<0){
								$("#"+_idform).parent().html(data.form);					
								
							}else{
									varenviada = "";			
									$(".help").hide();
							}
							$(this).button('reset');
						}
					)
				}else{
					$(this).button('reset');
					alert("Formulario invalido");
				}
			}
		);




		
</script>
<style type="text/css">
	/*#TheFeedbackButton {
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
	    top: 75%;
	    -webkit-transform: rotate(90deg);
     	-moz-transform: rotate(90deg);
      	-ms-transform: rotate(90deg);
       	-o-transform: rotate(90deg);
        transform: rotate(90deg);
	}*/
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
		width:45%;
		background:#FFFFFF;
		color:#333333;
		font-size: 12px;
		padding: 5px 30px;
		overflow: auto;
	}

	#feedbackform textarea,
	#feedbackform input{
		width: 98%;
	}
	.form-actions.title{
		margin-bottom: 5px;
	    margin-top: 0px;
	    padding: 10px 20px 5px;
	}
</style>

