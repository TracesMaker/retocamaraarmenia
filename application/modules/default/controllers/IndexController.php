<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->view->baseUrl = $this->_request->getBaseUrl();
        $this->_helper->layout()->setLayout("layout_new");

        if($this->_request->isXmlHttpRequest())
            $this->_helper->layout()->disableLayout();

        $this->RetoDB = Reto_Model_RetoMapper::getInstance();
        $this->SolucionadoresDB = Reto_Model_SolucionadoresMapper::getInstance();
    }

    public function indexAction()
    {
        // action body
        $filterreceived = "";
        $this->view->pagination = $this->RetoDB->getList();
        
        $_auth = new Zend_Session_Namespace('veoliaZend_Auth');
        $id = $_auth->usuario_id;
        $this->SolucionadoresDB->_populateFiltros(array("usuario" => $id));
        $this->view->misretos = $this->SolucionadoresDB->getList();

    }
    public function retoAction()
    {
        $id = $this->getRequest()->getParam('id');
        $Obj = $this->RetoDB->getById($id);
        $this->view->datos = $Obj;
        
    }
    public function solucionAction()
    {

        $reto = $this->_getParam('id', 0);
        if($reto <= 0){
            $this->_redirect('/index/index');
        }
        //falta comprobar si este reto esta activo

        $object = $this->SolucionadoresDB->getByPropiedad("reto", $reto);

        if($object->getId() == ""){
            $id = $this->SolucionadoresDB->Add(array('reto' => $reto ));
            $object = $this->SolucionadoresDB->getById($id);
        }

        $_auth = new Zend_Session_Namespace('veoliaZend_Auth');
        $_auth->solucionador = $object->getId();

        $this->view->solucionador = $object;
        $RetoDB = Reto_Model_RetoMapper::getInstance();
        $this->view->reto = $RetoDB->getById($object->getReto());


        $datosArray = $this->SolucionadoresDB->_depopulate($object);


        // información de la propuesta
        $form_informaciongeneral = new Reto_Form_Solucionadoresinformaciongeneralpropuesta();
        $this->view->form_informaciongeneral = $form_informaciongeneral;
        $form_informaciongeneral->_populateHidden($datosArray);
        $form_informaciongeneral->populate($datosArray);

        // información del proponente
        $form_proponente = new Reto_Form_Solucionadoresinformaciongeneralproponente();
        $this->view->form_proponente = $form_proponente;
        $form_proponente->_populateHidden($datosArray);
        $form_proponente->populate($datosArray);


        // Solucion  y pertinencia
        $form_solucion = new Reto_Form_Solucionadoressolucionysupertinencia();
        $this->view->form_solucion = $form_solucion;
        $form_solucion->_populateHidden($datosArray);
        $form_solucion->populate($datosArray);

        // Solucion Archivo
        $form_solucionfile = new Reto_Form_Solucionfile();
        $this->view->form_solucionfile = $form_solucionfile;
        $form_solucionfile->_populateHidden($datosArray);
        $form_solucionfile->populate($datosArray);
        
        // Metodologia debe llevar al index

        // Presupuesto
        $form_presupuesto = new Reto_Form_Solucionadoresplanteamientopresupuestal();
        $this->view->form_presupuesto = $form_presupuesto;
        $form_presupuesto->_populateHidden($datosArray);
        $form_presupuesto->populate($datosArray);

        // Capacidad del solucionador debe llevar al index

        // Propiedad intelectual
        $form_intelectual = new Reto_Form_Solucionadorespropiedadintelectual();
        $this->view->form_intelectual = $form_intelectual;
        $form_intelectual->_populateHidden($datosArray);
        $form_intelectual->populate($datosArray);

        //Trayectoria
        $form_trayectoria = new Reto_Form_Solucionadorestrayectoria();
        $this->view->form_trayectoria = $form_trayectoria;
        $form_trayectoria->_populateHidden($datosArray);
        $form_trayectoria->populate($datosArray);

        //Madurez
        $form_madurez = new Reto_Form_Solucionadoresmadurez();
        $this->view->form_madurez = $form_madurez;
        $form_madurez->_populateHidden($datosArray);
        $form_madurez->populate($datosArray);


    }
    

    public function loginAction(){
        
        $request=$this->getRequest();
        $form=new Form_LoginForm();

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
        // Se define el titulo de la pagina
        $this->view->title='Welcome';
        // Se muestra el formulario
        $this->view->form=$form;        
    }

    public function terminosycondicionesAction(){
        
    }
}
