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
    	$this->_helper->layout()->setLayout("layoutlogin");
		
		$request = $this->getRequest();
		$form = new Form_Recovery();
		$this->view->errorMessage = "";
		$this->view->successMessage = "";
		if($request->isPost())
		{
			if($form->isValid($this->_request->getPost()))
			{
				$username = $form->getValue('username');
				$useremail = $form->getValue('useremail');
				$tableUsuarios = Model_AclusuariosMapper::getInstance();

				$user = $tableUsuarios->getByPropiedad("username", $username);

				//Validamos que el usuario exista para enviar confirmación o mensaje de usuario no econtrado
    			if($user->getId() > 0 && $user->getUseremail() == $useremail)
    			{

					$token = uniqid();
					$pass = md5($token);
					$imagenurl = 'http://app.easydev.co/img/logo.png';
					$url = 'http://' . $_SERVER['SERVER_NAME'];
					$asunto = 'Recuperación de contraseña [http://' . $_SERVER['SERVER_NAME'].'].';
					$mensajeText = 'Usted a solicitado un cambio de contraseña en la plataforma veolia
									por lo tanto se le ha generado la seguiente contraseña temporalmente.

									Nombre de usuario: 
									Contraseña: 
									
									Recuerde que debe cambiar la contraseña al momento que ingrese a la plataforma entrando en el menu superior en el ítem de "Mi perfil" -> "Contraseña"
									Si necesita ayuda, por favor comuníquese con el administrador.';

					$mensajeHtml = '<center><img src="' . $imagenurl .'"></center>
									Usted a solicitado un cambio de contraseña en la plataforma virtual de <b>FET</b><br>
									por lo tanto se le ha generado la seguiente contraseña temporalmente.<br>
									<br>
									Nombre de usuario: ' . $username .'<br>
									Contraseña: ' . $token . '<br>
									<br>
									Recuerde que debe cambiar la contraseña al momento que ingrese a la plataforma entrando en el menú superior en el ítem de "Mi perfil" -> "Contraseña".<br><br>
									Si necesita ayuda, por favor comuníquese con el administrador. 	';		          

					$mail = new Zend_Mail('UTF-8');
					$mail->setFrom('noreply@easydev.co', 'Recuperar contraseña FET.');
					$mail->addTo($useremail, $user->getUsernombres());
					$mail->setSubject($asunto);
					$mail->setBodyText($mensajeText);
					$mail->setBodyHtml($mensajeHtml);

					try {
					    $mail->send();
					    $this->view->successMessage = "Se ha enviado un mensaje a su correo, por favor revise en su bandeja principal y en su bandeja de spam y encontrará la informacion necesaria para poder continuar con el proceso de cambio de contraseña";
					    $tableUsuarios->UpdatePass(array("password" => $pass), $user->getId());
					} catch (Exception $e) {
					    $this->view->errorMessage = "Error al enviar el mensaje, revise que el correo ingresado sea un correo valido o comuniquese con el administrador";
					}

				}else{
					$this->view->errorMessage ="Error, El usuario o correo ingresado son incorrectos";
				}


			}else $this->view->errorMessage = "Error, El usuario o correo ingresado son incorrectos";
	    }

	    $this->view->form=$form;  
                      
    }
}

