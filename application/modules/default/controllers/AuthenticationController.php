<?php
class AuthenticationController extends Zend_Controller_Action{

    public function init(){
    	if($this->_request->isXmlHttpRequest())
			$this->_helper->layout()->disableLayout();
    }

	public function loginAction(){
    	$this->_helper->layout()->setLayout("layout_new_login");
    	if(Zend_Auth::getInstance()->hasIdentity())	$this->_redirect('index/index');
    	
    	$request=$this->getRequest();
    	$form = new Form_LoginForm();
    	$form_nuevo = new Form_Solucionadores();

    	if($request->isPost()){

    		if($form->isValid($this->_request->getPost())){
    			
		    	$authAdapter=$this->getAuthAdapter();
		        $username=$form->getValue('username');
		        $password=md5($form->getValue('password'));    
    			
		        $authAdapter->setIdentity($username)->setCredential($password);
		        
		        $auth=Zend_Auth::getInstance();
		        $auth->setStorage(new Zend_Auth_Storage_Session('veoliaauth'));
		        $result=$auth->authenticate($authAdapter);
		        $tableUsuarios = Model_AclusuariosMapper::getInstance();
				$tableUsuariosOnline = Model_AclusuariosonlineMapper::getInstance();
				
		        if($result->isValid()){
		        	
	    			$Obj_User=$tableUsuarios->getByPropiedad("username", $username);
 
					if($Obj_User->getActivo() == 1)
					{
	    				$_userOnline = $tableUsuariosOnline->getByPropiedad("usuario_id", $Obj_User->getId());
	    				if($_userOnline->getId()>0){
 							$tableUsuariosOnline->DeleteData($_userOnline->getId());
		        		}		
			        
		        		$identity=$authAdapter->getResultRowObject();

		        		$authStorage=$auth->getStorage();
		        		$authStorage->write($identity);		       
        				$ip=$_SERVER['REMOTE_ADDR'];
			        	$data=array("usuario_id"=>$Obj_User->getId(), "ip"=>$ip, "ultimoacceso"=>date('Y-n-j H:i:s'),"tiempo"=>0);										
			        	
			        	$_auth = new Zend_Session_Namespace('veoliaZend_Auth');
			        	$_auth->aclusuariosonline_id = $tableUsuariosOnline->add($data);

			        	$aclhistorialusuariosDB = Model_AclhistorialusuariosMapper::getInstance();		        	 
						$data=array("aclhusuario"=>$Obj_User->getId(), "aclhip"=>$ip, "aclhfecha"=>date('Y-n-j H:i:s'));
						$aclhistorialusuariosDB->add($data);
						
						// guarda en session las variables principales para la autenticación
						$_auth->usuario_id=$Obj_User->getId();
						$_auth->rol=$Obj_User->getRole();
						Zend_Registry::set('role', $_auth->rol);  
						$_auth->_acl = new Model_LibraryAcl();
						
						$_navigation = new Zend_Session_Namespace('veoliaZend_Navigation');
						unset($_navigation->renderMenu);
						
						$this->_redirect('index/index/');
					}else{
						$this->view->errorMessage="Usuario Inactivo. Consulte con el administrador.";
					}
				}else {
		        	// Se muestra un mensaje de error si los datos no son validos
		        	$this->view->errorMessage="User name or password is wrong.";
		        }    			
    		}
    	}
    	// Se muestra el formulario
    	$this->view->form_login = $form;   
    	$this->view->form_nuevo = $form_nuevo;   

    	// 	
   	}


    public function logoutAction(){
    	$_auth = new Zend_Session_Namespace('veoliaZend_Auth');
    	$tableUsuariosOnline = Model_AclusuariosonlineMapper::getInstance();	
    	$tableUsuariosOnline->DeleteData($_auth->aclusuariosonline_id); 
		// Se destruye la sesion
		$auth=Zend_Auth::getInstance();
		$auth->setStorage(new Zend_Auth_Storage_Session('veoliaauth'));
        $auth->clearIdentity();
        
		$_navigation = new Zend_Session_Namespace('veoliaZend_Navigation');
		unset($_navigation->renderMenu);		
		unset($_auth->_acl);                
		unset($_auth->aclusuariosonline_id);
		unset($_auth->rol);
		unset($_auth->usuario_id);
        $this->_redirect('index/index');
    }
    
	private function getAuthAdapter(){
		// Se definen cuales van a ser los campos utilizados para la comprobacion de la identidad del usuario
    	$authAdapter=new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
    	$authAdapter->setTableName('ve_aclusuarios')
	    	->setIdentityColumn('username')
	    	->setCredentialColumn('password');
    	
    	$authAdapter->setTableName('ve_aclusuarios')
    	->setIdentityColumn('username')
    	->setCredentialColumn('password');
    	
    	return $authAdapter;
    }
    
	public function recoveryAction()
  {  
  	$this->_helper->layout()->setLayout("layout_new_login");
    if(Zend_Auth::getInstance()->hasIdentity())	$this->_redirect('index/index');
		
		$request = $this->getRequest();		
		$this->view->errorMessage = "";
		$this->view->successMessage = "";
		if($request->isPost())
		{	
				$form = $request->getParams();
				$useremail = $form['email'];
				$tableUsuarios = Model_AclusuariosMapper::getInstance();
				$user = $tableUsuarios->getByPropiedad("email", $useremail);

				//Validamos que el usuario exista para enviar confirmación o mensaje de usuario no econtrado
    			if($user->getId() > 0)
    			{

    				$rstDate = $user->getResetdate();
    				if (is_null($rstDate)) {
    					//Se genera nuevo token
    					$ahora = new DateTime();
    					$tableUsuarios->UpdateData(array("aclusuarios_id"=> $user->getId(), "resetdate"=>$ahora->format("Y-m-d H:i:s")));
    					$rstoken = md5($ahora->format("Y-m-d H:i:s").$user->getId());    					
    				} else {
    					//se verifica si ha pasado más de 24 horas o se reenvía el mismo.						
							$ultimoReset = new DateTime($rstDate);
							$ahora = new DateTime();
							$interval = $ahora->diff($ultimoReset);
							if ($interval->format('%d') >= "1") {
								//si pasa un día sin reestablecer su contraseña
								//Se genera un nuevo rstoken
								$rstoken = md5($ahora->format("Y-m-d H:i:s").$user->getId());
								//se procede a actualizar el registro del usuario con la nueva fecha generada
								$tableUsuarios->UpdateData(array("aclusuarios_id"=> $user->getId(), "resetdate"=>$ahora->format("Y-m-d H:i:s")));
							} else {
								$rstoken = md5($rstDate.$user->getId());
							}
    				}
					
					$username = $user->getUsername();
					$imagenurl = $_SERVER['HTTP_HOST'].'/public/img/logo.png';
					$url = $_SERVER['HTTP_HOST']."/public".'/authentication/resetpass/token/'.$rstoken.'/usuario/'.$user->getId();
					$asunto = 'Recuperar contraseña en Cámara de comercio de armenia';
					$mensajeText = 'Has solicitado un cambio de contraseña en la plataforma de Cámara de comercio de armenia
									por lo tanto se le ha generado la siguiente contraseña temporalmente.

									Nombre de usuario: ' . $username .'
									Copia y pega la siguiente URL para que puedas reasignar tu contraseña: ' . $url . '
																		
									Si necesitas ayuda, por favor comunícate al correo contacto@retocamaraarmenia.com.co

									Atentamente,
									El equipo de soporte Cámara de comercio de armenia';

					$mensajeHtml = '<center><img src="' . $imagenurl .'"></center>
									<h3>' . $username .'</h3> <br>
									<br>
									<b>Has solicitado un cambio de contraseña en la plataforma de <b>Cámara de comercio de armenia</b>
									<br>									
									<a href="'.$url.'">Reasignar contraseña: '.$url.'</a>
									<br>
									
									Si necesitas ayuda, por favor comunícate al correo <br> <b>contacto@retocamaraarmenia.com.co</b>.<br>
									<br>
									Atentamente,
									El equipo de soporte Cámara de comercio de armenia';		          

					$mail = new Zend_Mail('UTF-8');
					$mail->setFrom('contacto@retocamaraarmenia.com.co', 'Cámara de comercio de armenia');
					$mail->addTo($useremail, $username);
					$mail->setSubject($asunto);
					$mail->setBodyText($mensajeText);
					$mail->setBodyHtml($mensajeHtml);

					try {
					    $mail->send();
					    $this->view->successMessage = "Se ha enviado un mensaje a su correo, por favor revise en su bandeja principal o bandeja de spam. <b>Encontrará un correo</b> con las instrucciones de acceso.";					    
					} catch (Exception $e) {
					    $this->view->errorMessage = "Error al enviar el mensaje, revise que el correo sea valido o envíe un correo a <b>contacto@retocamaraarmenia.com.co</b>";
					}

				}else{
					$this->view->errorMessage ="El correo ingresado no fue encontrado en nuestra base de datos.";
				}


			
	    }

	
  }

  public function resetpassAction()
  {
		$this->_helper->layout()->setLayout("layout_new_login");

		$UsDB = Model_AclusuariosMapper::getInstance();
		$recoveryURL = "/public".'/authentication/recovery';
		if($this->getRequest()->isPost()){			
			$pr = $this->getRequest()->getParams();
			$password=$pr['password'];
			$passwordRe=$pr['passwordRe'];			
			$usuario = $UsDB->getById($pr['usuario']);
			if ($pr["token"] == md5($usuario->getResetdate().$usuario->getId())) {
				if ($password == $passwordRe) {
					$UsDB->UpdateData(array("aclusuarios_id"=> $usuario->getId(), 
																	"password0"=> $usuario->getPassword(),
																	"resetdate"=> NULL,
																	"password"=> md5($password)));
					
					$this->view->successMessage = "<br> Tu nueva contraseña fue asignada. Ya puedes ingresar de nuevo. </b>";
				} else {
					$this->view->errorMessage = "Debes escribir la contraseña dos veces exactamente igual";
				}			
			} else {
				
				$this->view->errorMessage = "Tu  Link para reasignar la contraseña ha caducado por favor intentalo de nuevo en el siguiente LINK:".'<a target="_self" href="'.$recoveryURL.'">'.$recoveryURL.'</a>';
			}
		} else {
			$Data = $this->getRequest()->getParams();
			if (isset($Data["token"]) && isset($Data["usuario"])) {
				$usuario = $UsDB->getById($Data["usuario"]);		
				if ($Data["token"] == md5($usuario->getResetdate().$usuario->getId())) {
					$this->view->token = $Data["token"];
					$this->view->usuario = $Data["usuario"];		  			
				} else {
					$this->view->wrongURLMessage = "Tu  URL a caducado o es erronea, por favor intentalo de nuevo en el siguiente LINK:".'<a target="_self" href="'.$recoveryURL.'">'.$recoveryURL.'</a>';
				}		
			} else {				
					$this->view->wrongURLMessage = "Tu  URL a caducado o es erronea, por favor intentalo de nuevo en el siguiente LINK:".'<a target="_self" href="'.$recoveryURL.'">'.$recoveryURL.'</a>';
			}	
		}	
  }
}

