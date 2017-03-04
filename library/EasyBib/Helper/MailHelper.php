<?php

class EasyBib_Helper_MailHelper extends Zend_Controller_Action_Helper_Abstract{

	/* members */
	

	
	public function send_invitation($id,$pass){
		
		$aclusuariosDB = Model_AclusuariosMapper::getInstance();
		
		$object = $aclusuariosDB->getById($id);
		$html=$this->getInvitation($object,$pass);

		$addTo[0]['email']= $object->getUseremail();
		$addTo[0]['nombre']= $object->get_Label_model();

		$param = array(
					'auth' => 'login',
					'ssl' => 'ssl',
					'port' => '465',
					'username' => 'info@easydev.co',
					'password' => 'R0m4R0m4'
			);


		$log=$this->send_email('Cuenta EasyDev', $html, 'info@easydev.co', $addTo, 'smtp', $param );

		return $log;		

	}

	private function getInvitation($object,$pass){
		
		$html='<div><table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:rgb(199,199,199)"><tbody><tr style="border-collapse:collapse"><td bgcolor="#c7c7c7" align="center" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			<table width="640" cellspacing="0" cellpadding="0" border="0" style="margin:0px 10px"><tbody><tr style="border-collapse:collapse"><td width="640" height="20" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			</td></tr><tr style="border-collapse:collapse"><td width="640" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"><table width="640" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" style="border-top-left-radius:6px;border-top-right-radius:6px;border-bottom-right-radius:0px;border-bottom-left-radius:0px;background-color:rgb(46,46,46);color:rgb(136,136,136)">


			<tbody><tr style="border-collapse:collapse"><td width="15" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"></td><td width="350" valign="middle" align="left" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			<table width="350" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="border-collapse:collapse"><td width="350" height="8" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			</td></tr></tbody></table><div style="font-size:12px"><br></div><table width="350" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="border-collapse:collapse"><td width="350" height="8" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			</td></tr></tbody></table></td><td width="30" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"></td><td width="255" valign="middle" align="right" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			<table width="255" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="border-collapse:collapse"><td width="255" height="8" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			</td></tr></tbody></table><table cellspacing="0" cellpadding="0" border="0"><tbody><tr style="border-collapse:collapse"><td valign="middle" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			<a target="_blank" style="font-weight:bold;color:rgb(238,238,238);text-decoration:none" rel="cs_facebox" href="http://t/t-fb-cdddkl-l-x/?act=wv"><img width="8" height="14" border="0" style="outline-style:none;display:block" alt="Facebook icon" src="https://img.createsend1.com/img/templatebuilder/like-glyph.png"></a></td>


			<td width="3" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"></td><td valign="middle" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			<div style="font-size:12px;color:rgb(136,136,136)"><a target="_blank" style="font-weight:bold;color:rgb(238,238,238);text-decoration:none" rel="cs_facebox" href="https://www.facebook.com/easydevco">Me gusta</a></div></td>


			<td width="10" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"></td><td valign="middle" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			<a target="_blank" style="font-weight:bold;color:rgb(238,238,238);text-decoration:none" href="http://prueba.createsend1.com/t/t-tw-cdddkl-l-c/"><img width="17" height="13" border="0" style="outline-style:none;display:block" alt="Twitter icon" src="https://img.createsend1.com/img/templatebuilder/tweet-glyph.png"></a></td>


			<td width="3" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"></td><td valign="middle" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			<div style="font-size:12px;color:rgb(136,136,136)"><a target="_blank" style="font-weight:bold;color:rgb(238,238,238);text-decoration:none" href="https://twitter.com/easydevco">Tweet</a></div></td><td width="10" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			</td><td valign="middle" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"><br></td><td width="3" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			<br></td><td valign="middle" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"><br></td></tr></tbody></table></td><td width="15" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			</td></tr></tbody></table></td></tr><tr style="border-collapse:collapse"><td width="640" bgcolor="#FFFFFF" align="center" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			<div align="center"><a target="_blank" href="http://prueba.createsend1.com/t/t-l-cdddkl-l-e/"><img width="250" border="0" align="top" style="display:inline;outline-style:none;text-decoration:none" alt="EasyDev" src="https://i2.createsend1.com/ti/t/02/BE5/24D/110004/images/250_logo.190132.png" label="Header Image"></a></div>


			</td></tr><tr style="border-collapse:collapse"><td width="640" height="30" bgcolor="#ffffff" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"></td></tr><tr style="border-collapse:collapse">


			<td width="640" bgcolor="#ffffff" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"><table width="640" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="border-collapse:collapse">


			<td width="30" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"></td><td width="580" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			<table width="580" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="border-collapse:collapse"><td width="580" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			

			<p align="left" style="font-size:18px;line-height:24px;color:rgb(176,176,176);font-weight:bold;margin-top:0px;margin-bottom:18px">Buen d&iacute;a '.$object->get_Label_model().'.</p><div align="left" style="line-height:18px;color:rgb(68,68,68);margin-top:0px;margin-bottom:18px">


			<div><p style="font-size:13px;margin-bottom:15px">Le escribimos para informarle que ha sido creado su usuario y contrase&ntilde;a. &nbsp;</p></div><p style="font-size:13px;margin-bottom:15px"><b>Usuario:&nbsp;</b> <span><span>'.$object->getUsername().'</span></span></p>
			<p style="margin-bottom:15px">

			<b style="font-size:13px">Contrase&ntilde;a:&nbsp;</b> <span><span>'.$pass.'</span></span>&nbsp; <i><font size="1"><b>(puede cambiar esta contrase&ntilde;a en cualquier momento desde la plataforma)</b></font></i></p>
			<div><p style="font-size:13px;margin-bottom:15px">Puedes ingresar y utilizar la plataforma para generar los proyectos que desees en&nbsp;<a target="_blank" href="http://app.easydev.co/">http://app.easydev.co</a></p>

			<div><font face="Helvetica Neue, Arial, Helvetica, Geneva, sans-serif" color="#444444" style="line-height:normal"><span style="line-height:18px"><b>Un&nbsp;v&iacute;deo&nbsp;</b>demostrativo de 5 minutos =&gt;&nbsp;</span></font><span style="color:rgb(0,0,0);font-family:arial"><font face="Helvetica Neue, Arial, Helvetica, Geneva, sans-serif" color="#444444"><a target="_blank" href="http://www.youtube.com/watch?v=Oy1IPvXYUUw">http://www.youtube.com/<wbr></wbr>watch?v=Oy1IPvXYUUw</a></font></span><p style="font-size:13px;margin-bottom:15px">


			Agr&eacute;ganos! Nuestras cuentas para demostraciones son:</p><div><p style="font-size:13px;margin-bottom:15px"><b>Gplus</b>&nbsp; =&gt;<span style="color:rgb(0,0,205)">&nbsp;<a target="_blank" href="mailto:info@easydev.co">info@easydev.co</a></span><br style="line-height:13px">


			



			<b>skype</b>&nbsp;=&gt;&nbsp;<span style="color:rgb(0,0,255)"><a target="_blank" href="http://easydev.co/">easydev.co</a></span></p></div></div><div><p style="font-size:13px;margin-bottom:15px">Quedamos atentos a su respuesta.</p>


			</div></div></div></td></tr><tr style="border-collapse:collapse"><td width="580" height="10" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"></td></tr></tbody></table>


			</td><td width="30" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"></td></tr></tbody></table></td></tr><tr style="border-collapse:collapse"><td width="640" height="15" bgcolor="#ffffff" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			</td></tr><tr style="border-collapse:collapse"><td width="640" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"><table width="640" cellspacing="0" cellpadding="0" border="0" bgcolor="#000000" style="border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-right-radius:6px;border-bottom-left-radius:6px;background-color:rgb(0,0,0);color:rgb(136,136,136)">


			<tbody><tr style="border-collapse:collapse"><td width="30" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"></td><td width="360" height="30" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			</td><td width="60" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"></td><td width="160" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			</td><td width="30" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"></td></tr><tr style="border-collapse:collapse"><td width="30" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			</td><td width="360" valign="top" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"><p align="left" style="font-size:12px;line-height:15px;margin-top:0px;margin-bottom:15px">


			Est&aacute;s recibiendo este correo porque est&aacute;s inscrito a nuestra p&aacute;gina.</p><p align="left" style="font-size:12px;line-height:15px;margin-top:0px;margin-bottom:15px"><br></p></td><td width="60" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			</td><td width="160" valign="top" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"><p align="right" style="font-size:11px;line-height:16px;margin-top:0px;margin-bottom:15px;color:rgb(255,255,255)">


			</p></td><td width="30" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"></td></tr><tr style="border-collapse:collapse"><td width="30" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			</td><td width="360" height="15" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"></td><td width="60" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			</td><td width="160" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"></td><td width="30" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse">


			</td></tr></tbody></table></td></tr><tr style="border-collapse:collapse"><td width="640" height="60" style="font-family:\'Helvetica Neue\',Arial,Helvetica,Geneva,sans-serif;border-collapse:collapse"></td></tr></tbody></table>


			</td></tr></tbody></table></div>';

		return $html;

	}


	public function send_email($asunto,	$contenido,	$from = 'info@easydev.co', $addTo, $tipo, $parametros= array()) {
		
		switch ($tipo) {
			case 'smtp':
			try {
			
			$host = 'smtp.gmail.com';
			$param = array(
					'auth' => $parametros['auth'],
					'ssl' => $parametros['ssl'],
					'port' => $parametros['port'],
					'username' => $parametros['username'],
					'password' => $parametros['password']
			);

	
			// Asignamos el servidor del SMTP:
			$tr = new Zend_Mail_Transport_Smtp($host, $param);
			Zend_Mail::setDefaultTransport($tr);
		
			//Creamos nuestro Mail
		
			$mail = new Zend_Mail();		
	
			// Escribimos el Contenido del Mail con HTML
			$mail->setBodyHtml($contenido);
		
			// Agregamos el Remitente (el que envia el mil)
			$mail->setFrom($from, 'EasyDev');
		
			// Agregamos a quien le enviamos el Mail
			foreach ($addTo as $key => $value) {
				$mail->addTo($value['email'], $value['nombre']);
			}
		
			// Asunto del Mail
			$mail->setSubject($asunto);
		
			// Enviamos el Mail con la diferencia que le agregamos el servidor SMTP
			$mail->send();
				return "Se ha enviado la informacion de Cuenta al correo registrado al usuario <b></b>";
			} catch (Exception $e) {
				return "Ha ocurrido un error al enviar el correo. ";
			}
				break;
			case 'normal':
			try {
			
			$mail = new Zend_Mail();		
	
			// Escribimos el Contenido del Mail con HTML
			$mail->setBodyHtml($contenido);
		
			// Agregamos el Remitente (el que envia el mil)
			$mail->setFrom($from, 'EasyDev');
		
			// Agregamos a quien le enviamos el Mail
			foreach ($addTo as $key => $value) {
				$mail->addTo($value['email'], $value['nombre']);
			}
		
			// Asunto del Mail
			$mail->setSubject($asunto);
		
			// Enviamos el Mail con la diferencia que le agregamos el servidor SMTP
			$mail->send();
				return "Se ha enviado la informacion de Cuenta al correo registrado al usuario <b></b>";
			} catch (Exception $e) {
				return "Ha ocurrido un error al enviar el correo. ";
			}
				break;	
			
			default:
				# code...
				break;
		}
		
	}





	
	/* public core methods */		
	public function enviarMensajePersonalizado ($destinatario,
												$asunto,
												$subtitulo,
										 		$contenido,
										 		$from = 'info@easydev.co') {
		
		$html  	= $this->getHeader($asunto, $subtitulo);
		$html 	.= $this->getContent($contenido);
		$html 	.= $this->getFooter($footer);
		
		$mensaje = stripslashes($this->CSSToInline($html));

		$params = array('from' => $from,
						'to' => $destinatario,
						'subject' => $asunto,
						'text' => strip_tags($mensaje, TRUE),
						'html' => $mensaje);

		return ($this->send_message ($params));	
	}
	
	    
    /* metodos para enviar mensaje en formato HTML */
    
    private function htmlentities_keep_tags ($cadena) {
		
		$res = htmlentities($cadena, ENT_QUOTES, 'utf-8');
		
		$res = str_replace('&lt;',	'<', $res);
		$res = str_replace('&gt;',	'>', $res);
		$res = str_replace('&quot;','"', $res);
		$res = str_replace('&amp;',	'&', $res);
		
		return $res;
	
	}
	
	private function getHeader ($titulo, 
								$subtitulo) {
			
		$html = '<html>
					<head>
						<title>' . $titulo . '</title>
					</head>
					<body>
						<table class="mensaje">
							<thead>
								<tr>
									<td class="header">
										<a class="header" href="' . COPYRIGTH . '"></a>
										<h1>' . $subtitulo . '</h1>
									</td>
								</tr>
							</thead>
							<tbody>
								<tr>';
		
		return $html;
		
	}
	
	private function getContent ($contenido) {
		
		$html = '<td class="content">' . $contenido . '</td>';
		return $html;
		
	}
	
		
	private function getFooter ($contenido = '') {

		if(empty($contenido)){
			$html = '</tr></tbody></table></body></html>';
		}else{
			$html = '</tr><tr><td class="footer"><p class="footer">' . $contenido . '</p></td></tr></tbody></table></body></html>';
		}
		return $html;
		
	}
	
	/* reemplaza los tags con los css inline */
	
	private function tagsToCSS ($tag) {
		
		switch ($tag) {
			case '<body>':
				$style = '<body  bgcolor="#ffffff" style="background-color: #FFFFFF;">'; 
				break;
			case '<table class="mensaje">' :
				$style = '<table  bgcolor="#ffffff" style=" background: #FFFFFF; font-family: Helvetica, Arial, sans-serif; padding: 20px; width: 100%; ">';
				break;
			case '<h1>' :
				$style = '<h1 style="margin: 4px 0 0 0; font-size: 22px; color: #000; font-weight: bold;">';
				break;
			case '<h2>' :
				$style = '<h2 style="margin:0; font-size: 18px; font-weight: normal; color: #000;">';
				break;
			case '<h3>' :
				$style = '<h3 style="margin-bottom: 5px; font-size: 16px; color: #999;">';
				break;
			case '<h4>' :
				$style = '<h4 style="margin: 0; font-size: 13px; color: #000; font-weight: bold;">';
				break;
			case '<p>' :
				$style = '<p style="font-size: 12px; margin: 0 0 10px 0; line-height: 16px;">';
				break;
			case '<p class="destacado">' :
				$style = '<p style="font-size: 18px; margin: 0 0 10px 0; line-height: 16px;">';
				break;
			case '<p class="light">' :
				$style = '<p style="font-size: 12px; color: #999; margin-bottom: 20px;">';
				break;
			case '<a>' :
				$style = '<a style="color: ' . $this->color . '; font-weight: bold;">';
				break;
			case '<td>' :
				$style = '<td style="vertical-align: top;">';
				break;
			case '<span>' :
				$style = '<span style="font-size: 120px;">';
				break;
			case '<td class="header">' :
				$style = '<td style="vertical-align: top; border-bottom: 4px solid ' . $this->color . '; padding-bottom: 10px;">';
				break;
			case '<a class="header"' :
				$style 	= '<a style="color: ' . $this->color . '; text-decoration: none; font-size: 26px; font-weight: bold; margin-bottom: 6px;" ';
				break;
			case '<td class="content">' :
				$style = '<td style="vertical-align: top; padding-top: 10px; padding-right: 14px; width: 400px;">';
				break;
			case '<td class="footer">' :
				$style = '<td style="vertical-align: top; border-top: 1px dotted ' . $this->color . '; padding-top: 10px;">';
				break;
			case '<p class="footer">' :
				$style = '<p style="font-size: 12px; margin: 0 0 10px 0; line-height: 16px; color: #999;">';
				break;
			case '<a href=' :
				$style 	= '<a style="color: ' . $this->color . '; font-weight: bold;" href=';
				break;
			case '<hr />' :
				$style 	= '<hr style="border: none; border-top: 1px solid #DDD;" />';
				break;
			case '<li>' :
				$style 	= '<li style="margin-left: 20px; font-size: 12px; margin-bottom: 5px;">';
				break;
			case '<ul>' :
				$style 	= '<ul style="margin: 0; padding: 0;">';
				break;
			case '<ol>' :
				$style 	= '<ol style="margin: 0; padding: 0;">';
				break;
			case '<span class="highlighted">' :
				$style 	= '<span style="padding: 3px 6px 1px; background-color: #333; color: #FFF; -moz-border-radius: 3px; -webkit-border-radius: 3px; border-radius: 3px; font-weight: bold;">';
				break;
			default :
				$style = $tag;
				break;
		}
		
		return $style;
		
	} 
	
	private function CSSToInline ($html) {
	
		$tags = array 
		
		(
			'<body>',
			'<table class="mensaje">', 
			'<h1>', 
			'<h2>', 
			'<h3>', 
			'<h4>', 
			'<p>', 
			'<p class="destacado">',
			'<p class="light">',
			'<td>', 
			'<td class="header">', 
			'<a class="header"',
			'<td class="content">', 
			'<td class="aside">',
			'<td class="footer">',
			'<p class="footer">',
			'<a href=',
			'<hr />',
			'<li>',
			'<ul>',
			'<ol>',
			'<span class="highlighted">'
		);
	
		foreach ($tags as $tag) {
		
			$html = str_replace($tag, $this->tagsToCSS($tag), $html);
		
		}
		
		return ($this->htmlentities_keep_tags($html));
	
	}
  

}

?>