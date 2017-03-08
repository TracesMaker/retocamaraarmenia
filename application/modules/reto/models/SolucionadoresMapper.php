<?php
/**
 * Clase que procesas las consultas de personalizadas para las vistas
 *
 * @author EasyDev:Team
 **/
class Reto_Model_SolucionadoresMapper extends Model_DataMapperAbstract
{
    private static $_instance = null;    
	private $_objectFilter = null;


    public function  __construct() {
		$this->_objectFilter = new Reto_Model_Solucionadores();		
		$this->_primarykey = 'solucionadores_id';
   		$this->_nametable = $this->_prefijo.'_solucionadores';
    }    

	protected function getSelectInit(){
		$db = $this->getDb();

        $select = $db->select();
       	$select->from(array('a' => $this->_nametable));
       	$select->columns(array( 'a.*'));
		return $select;
	}

	/**
	* Optiene la información de un registro especifico por el Id
	*
	* @author EasyDev:Team
	*/
    public function getById($id){
    	if( !$id > 0)return new Reto_Model_Solucionadores();
    	$db = $this->getDb();
		$select = $this->getSelectInit();
		$select->where('a.'.$this->_primarykey.' = ?', $id);
       	
		$result = $db->fetchRow($select);
		return $this->_populate($result);
    }

	/**
	 * Función para agregar un registro a la base de dato
	 * @author EasyDev:Team
	 * @param  $data Array de argumentos
	 */
	public function Add($data){

		$_auth = new Zend_Session_Namespace('veoliaZend_Auth');
        $id = $_auth->usuario_id;
		$data['usuario'] = $id;
		$bckData = $data;
		$db = $this->getDb();
		$db->insert($this->_nametable, $data);
		$id =  $db->lastInsertId($this->_nametable);
		$this->filePrivados($data, $id);
		return $id;	
	}

	public function UpdateData($data){
		if(array_key_exists('diagramasolucion', $data) && $data['diagramasolucion']=="")
			unset($data['diagramasolucion']);
		$db = $this->getDb();
		$where = array(0 => "solucionadores_id = ".$data["solucionadores_id"]);
		return $db->update($this->_nametable, $data, $where);
	}

	public function UpdateDatafile($data){
		var_dump($data);
		if(isset($data["file"]["file"]["type"]))
		{
			if ($data["file"]["file"]["error"] > 0){
				return -1;
			}else{
				$sourcePath = $data['file']["file"]['tmp_name'];

				move_uploaded_file($sourcePath,"../Files/solucionadoresdiagramasolucion/".$data["solucionadores_id"]);
			}
		}
		unset($data['file']);
		$db = $this->getDb();
		$where = array(0 => "solucionadores_id = ".$data["solucionadores_id"]);
		$ret = $db->update($this->_nametable, $data, $where);
		return $ret;
	}

	/**
	 * Elimina un registro de la BD por el ID
	 * @author EasyDev:Team
	 */
    public function DeleteData($id){
    	$db = $this->getDb();
   		$where = array(0 => "solucionadores_id = ".$id);
		$db->delete($this->_nametable, $where);		
	}


	protected function BuildWhere($select){
		if($this->_objectFilter->getUsuario() > 0) 
			$select->where("a.usuario = ?",$this->_objectFilter->getUsuario());
		if($this->_objectFilter->getReto() > 0) 
			$select->where("a.reto = ?",$this->_objectFilter->getReto());
		if($this->_objectFilter->getEstadodemadurez() > 0) 
			$select->where("a.estadodemadurez = ?",$this->_objectFilter->getEstadodemadurez());
        if($this->_objectFilter->getPropiedadintelectual() != "" ) 
            $select->where("a.propiedadintelectual = ?",$this->_objectFilter->getPropiedadintelectual());
        if($this->_objectFilter->getPoliticapropiedadintelectual() != "" ) 
            $select->where("a.politicapropiedadintelectual = ?",$this->_objectFilter->getPoliticapropiedadintelectual());
        if($this->_objectFilter->getAutenticidad() != "" ) 
            $select->where("a.autenticidad = ?",$this->_objectFilter->getAutenticidad());
        if($this->_objectFilter->getPresentacionpublica() != "" ) 
            $select->where("a.presentacionpublica = ?",$this->_objectFilter->getPresentacionpublica());
        if($this->_objectFilter->getAcuerdoconfidencialidadconautor() != "" ) 
            $select->where("a.acuerdoconfidencialidadconautor = ?",$this->_objectFilter->getAcuerdoconfidencialidadconautor());

		if(strlen($this->_objectFilter->get_Fbuscar())>1){
			$select->where(' a.titulo like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.correoelectronico like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.resumenejecutivo like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.impactodesolucion like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.nombredelaempresa like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.nit like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.telefono like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.paginaweb like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.nombredepersonadecontacto like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.celulardelproponente like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.correoelectronicoproponente like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.descripciondesolución like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.porquelasolucion like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.inspiracion like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.descripciontrayectoria like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.descripcionpropiedadintelecual like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.descripcionpoliticapropiedadintelecual like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.descripcionautorpropiedad like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.cuando like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.conquien like "%'.$this->_objectFilter->get_Fbuscar().'%" OR a.requisitosusuario like "%'.$this->_objectFilter->get_Fbuscar().'%" ');
		}
		if(count($this->_objectFilter->getOrderBy())>0){
			$select->order($this->_objectFilter->getOrderBy());
		}else{

            $select->order("solucionadores_id desc");
		}
		
		return $select;
	}



	/**
     * Pobla el objeto con los valores del array de datos
     * @author EasyDev:Team
     * @param  Array con la info de la BD
     */
	public function _populate($data){
		$object = new Reto_Model_Solucionadores();
		if($data == null)return $object;
		$label = null;
		if(array_key_exists("solucionadores_id", $data))$object->setId($data["solucionadores_id"]);
		if(array_key_exists("titulo", $data))$object->setTitulo($data["titulo"]);
		if(array_key_exists("duracionenmeses", $data))$object->setDuracionenmeses($data["duracionenmeses"]);
		if(array_key_exists("correoelectronico", $data))$object->setCorreoelectronico($data["correoelectronico"]);
		if(array_key_exists("resumenejecutivo", $data))$object->setResumenejecutivo($data["resumenejecutivo"]);
		if(array_key_exists("impactodesolucion", $data))$object->setImpactodesolucion($data["impactodesolucion"]);
		if(array_key_exists("nombredelaempresa", $data))$object->setNombredelaempresa($data["nombredelaempresa"]);
		if(array_key_exists("nit", $data))$object->setNit($data["nit"]);
		if(array_key_exists("telefono", $data))$object->setTelefono($data["telefono"]);
		if(array_key_exists("paginaweb", $data))$object->setPaginaweb($data["paginaweb"]);
		if(array_key_exists("nombredepersonadecontacto", $data))$object->setNombredepersonadecontacto($data["nombredepersonadecontacto"]);
		if(array_key_exists("celulardelproponente", $data))$object->setCelulardelproponente($data["celulardelproponente"]);
		if(array_key_exists("correoelectronicoproponente", $data))$object->setCorreoelectronicoproponente($data["correoelectronicoproponente"]);
		if(array_key_exists("descripciondesolucion", $data))$object->setDescripciondesolucion($data["descripciondesolucion"]);
		if(array_key_exists("diagramasolucion", $data))$object->setDiagramasolucion($data["diagramasolucion"]);
		if(array_key_exists("porquelasolucion", $data))$object->setPorquelasolucion($data["porquelasolucion"]);
		if(array_key_exists("inspiracion", $data))$object->setInspiracion($data["inspiracion"]);
		if(array_key_exists("personal", $data))$object->setPersonal($data["personal"]);
		if(array_key_exists("serviciotecnico", $data))$object->setServiciotecnico($data["serviciotecnico"]);
		if(array_key_exists("equipos", $data))$object->setEquipos($data["equipos"]);
		if(array_key_exists("software", $data))$object->setSoftware($data["software"]);
		if(array_key_exists("materialeseinsumos", $data))$object->setMaterialeseinsumos($data["materialeseinsumos"]);
		if(array_key_exists("viajes", $data))$object->setViajes($data["viajes"]);
		if(array_key_exists("otrosrubros", $data))$object->setOtrosrubros($data["otrosrubros"]);
		if(array_key_exists("descripciontrayectoria", $data))$object->setDescripciontrayectoria($data["descripciontrayectoria"]);
		if(array_key_exists("propiedadintelectual", $data))$object->setPropiedadintelectual($data["propiedadintelectual"]);
		if(array_key_exists("descripcionpropiedadintelecual", $data))$object->setDescripcionpropiedadintelecual($data["descripcionpropiedadintelecual"]);
		if(array_key_exists("politicapropiedadintelectual", $data))$object->setPoliticapropiedadintelectual($data["politicapropiedadintelectual"]);
		if(array_key_exists("descripcionpoliticapropiedadintelecual", $data))$object->setDescripcionpoliticapropiedadintelecual($data["descripcionpoliticapropiedadintelecual"]);
		if(array_key_exists("autenticidad", $data))$object->setAutenticidad($data["autenticidad"]);
		if(array_key_exists("descripcionautorpropiedad", $data))$object->setDescripcionautorpropiedad($data["descripcionautorpropiedad"]);
		if(array_key_exists("cuando", $data))$object->setCuando($data["cuando"]);
		if(array_key_exists("conquien", $data))$object->setConquien($data["conquien"]);
		if(array_key_exists("presentacionpublica", $data))$object->setPresentacionpublica($data["presentacionpublica"]);
		if(array_key_exists("acuerdoconfidencialidadconautor", $data))$object->setAcuerdoconfidencialidadconautor($data["acuerdoconfidencialidadconautor"]);
		if(array_key_exists("requisitosusuario", $data))$object->setRequisitosusuario($data["requisitosusuario"]);
		if(array_key_exists("estadodemadurezotro", $data))$object->setEstadodemadurezotro($data["estadodemadurezotro"]);
		if(array_key_exists("enviado", $data))$object->setEnviado($data["enviado"]);
	if(array_key_exists("usuario", $data)){
		$object->setUsuario($data["usuario"]);
		if($this->getPerezoso()){
			$usuarioDB = new Model_AclusuariosMapper();
			$usuarioDB->setPerezoso(false);
			//$objectRelacion = $usuarioDB->getById(0);	
			$objectRelacion = $usuarioDB->getById($data["usuario"]);	
			$object->setUsuarioObject($objectRelacion);
		}	
	}

	if(array_key_exists("reto", $data)){
		$object->setReto($data["reto"]);
		if($this->getPerezoso()){
			$retoDB = new Reto_Model_RetoMapper();
			$retoDB->setPerezoso(false);
			//$objectRelacion = $retoDB->getById(0);	
			$objectRelacion = $retoDB->getById($data["reto"]);	
			$object->setRetoObject($objectRelacion);
		}	
	}

	if(array_key_exists("estadodemadurez", $data)){
		$object->setEstadodemadurez($data["estadodemadurez"]);
		if($this->getPerezoso()){
			$estadodemadurezDB = new Reto_Model_EstadosdemadurezMapper();
			$estadodemadurezDB->setPerezoso(false);
			//$objectRelacion = $estadodemadurezDB->getById(0);	
			$objectRelacion = $estadodemadurezDB->getById($data["estadodemadurez"]);	
			$object->setEstadodemadurezObject($objectRelacion);
		}	
	}

	if(array_key_exists("solucionadores_id", $data)){
		$acum = 0;
		$sumEsperado = 0;
		for ($i=1; $i < 8; $i++) { 
			$a = $this->getProgresoPorSeccion($data["solucionadores_id"], $i);
			$sumEsperado += $a['progresoEsperado'];
			$acum += $a['conteo'];
		}
		if ($sumEsperado != 0) {
			// $object->setProgreso($acum);			
			// $object->setProgreso($sumEsperado);			
			$object->setProgreso(($acum * 100) / $sumEsperado);			
		}
	}


 		return $object;
	}

	/**
     * Combirte el objeto enviado en un array de atributos
     * @author EasyDev:Team
     * @return  Array con los atrubutos del mapper
     */
	public function _depopulate($object){
		$_array = array(); 
		if($object == null)return $_array;
		$_array["solucionadores_id"]=$object->getId();
		$_array["titulo"] = $object->getTitulo();
		$_array["duracionenmeses"] = $object->getDuracionenmeses();
		$_array["correoelectronico"] = $object->getCorreoelectronico();
		$_array["resumenejecutivo"] = $object->getResumenejecutivo();
		$_array["impactodesolucion"] = $object->getImpactodesolucion();
		$_array["nombredelaempresa"] = $object->getNombredelaempresa();
		$_array["nit"] = $object->getNit();
		$_array["telefono"] = $object->getTelefono();
		$_array["paginaweb"] = $object->getPaginaweb();
		$_array["nombredepersonadecontacto"] = $object->getNombredepersonadecontacto();
		$_array["celulardelproponente"] = $object->getCelulardelproponente();
		$_array["correoelectronicoproponente"] = $object->getCorreoelectronicoproponente();
		$_array["descripciondesolucion"] = $object->getDescripciondesolucion();
		$_array["diagramasolucion"] = $object->getDiagramasolucion();
		$_array["porquelasolucion"] = $object->getPorquelasolucion();
		$_array["inspiracion"] = $object->getInspiracion();
		$_array["personal"] = $object->getPersonal();
		$_array["serviciotecnico"] = $object->getServiciotecnico();
		$_array["equipos"] = $object->getEquipos();
		$_array["software"] = $object->getSoftware();
		$_array["materialeseinsumos"] = $object->getMaterialeseinsumos();
		$_array["viajes"] = $object->getViajes();
		$_array["otrosrubros"] = $object->getOtrosrubros();
		$_array["descripciontrayectoria"] = $object->getDescripciontrayectoria();
		$_array["propiedadintelectual"] = $object->getPropiedadintelectual();
		$_array["descripcionpropiedadintelecual"] = $object->getDescripcionpropiedadintelecual();
		$_array["politicapropiedadintelectual"] = $object->getPoliticapropiedadintelectual();
		$_array["descripcionpoliticapropiedadintelecual"] = $object->getDescripcionpoliticapropiedadintelecual();
		$_array["autenticidad"] = $object->getAutenticidad();
		$_array["descripcionautorpropiedad"] = $object->getDescripcionautorpropiedad();
		$_array["cuando"] = $object->getCuando();
		$_array["conquien"] = $object->getConquien();
		$_array["presentacionpublica"] = $object->getPresentacionpublica();
		$_array["acuerdoconfidencialidadconautor"] = $object->getAcuerdoconfidencialidadconautor();
		$_array["requisitosusuario"] = $object->getRequisitosusuario();
		$_array["usuario"] = $object->getUsuario();
		$_array["reto"] = $object->getReto();
		$_array["estadodemadurez"] = $object->getEstadodemadurez();
		$_array["estadodemadurezotro"] = $object->getEstadodemadurezotro();
		$_array["enviado"] = $object->getEnviado();
 		return $_array;
	}

	/**
	 * Agrega los filtros del buscador en la consulta
	 * @author EasyDev:Team
	 */
	public function _populateFiltros($data){
		$this->_objectFilter = new Reto_Model_Solucionadores();
		if($data == null)return;
		$this->setPerezoso(false);
		$this->_objectFilter = $this->_populate($data);
		if(array_key_exists("buscar", $data)) $this->_objectFilter->set_Fbuscar($data["buscar"]);
		if(array_key_exists("sort", $data) && strlen($data["sort"]) > 1)	$this->_objectFilter->addOrderBy($data["sort"]);
	}


	/**
	 * Retorna listado resultado de una consulta con o sin filtro.
	 *
	 * @author EasyDev:Team
	 **/
	public function getList($perezoso = true){
		$select = $this->getListSelect();
		$stmt = $select->query();
		$objects = array();
		$this->setPerezoso($perezoso);
		foreach ($stmt->fetchAll() as $row){
			$objects[]= $this->_populate($row);
		}
		return $objects;
	}
	
	/**
	 * Retorna Contador de resultado de una consulta con o sin filtro.
	 *
	 * @author EasyDev:Team
	 **/
	public function getCountList(){
		$select = $this->getListSelect();
		$stmt = $select->query();
		$objects = array();
		return count($stmt->fetchAll());
	}

	public function getPaginator($page, $nregistro){ 
		$paginator= new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($this->getListSelect()));
		$paginator->setItemCountPerPage($nregistro)->setCurrentPageNumber($page);
		$paginator->_objects = array();
		$this->setPerezoso(true);
		foreach ($paginator as $row){
			$paginator->_objects[]= $this->_populate($row);
		}
		return $paginator;
	}


	/**
	 * Reinicia el objeto de filtros.
	 *
	 * @author EasyDev:Team
	 **/
	public function CleanFilter(){
		$this->_objectFilter = new Reto_Model_Solucionadores();
	}	

  
	private function filePrivados($data, $id)
	{
		if(array_key_exists('diagramasolucion', $data) && strlen($data['diagramasolucion'])>0 )
		{
			copy("../Files/temp/solucionadoresdiagramasolucion/".$data['diagramasolucion'], "../Files/solucionadoresdiagramasolucion/".$id);
			unlink("../Files/temp/solucionadoresdiagramasolucion/".$data['diagramasolucion']);
		}
		if(array_key_exists('porquelasolucion', $data) && strlen($data['porquelasolucion'])>0 )
		{
			copy("../Files/temp/solucionadoresporquelasolucion/".$data['porquelasolucion'], "../Files/solucionadoresporquelasolucion/".$id);
			unlink("../Files/temp/solucionadoresporquelasolucion/".$data['porquelasolucion']);
		}
		if(array_key_exists('inspiracion', $data) && strlen($data['inspiracion'])>0 )
		{
			copy("../Files/temp/solucionadoresinspiracion/".$data['inspiracion'], "../Files/solucionadoresinspiracion/".$id);
			unlink("../Files/temp/solucionadoresinspiracion/".$data['inspiracion']);
		}
	}
    public static function getInstance(){
        if(is_null(self::$_instance)){
            $c = __CLASS__;
            self::$_instance = new $c;
        }
        return self::$_instance;
    }

    public function getByPropiedad($propiedad, $valor){
		$db = $this->getDb();
		$select = $this->getSelectInit();
        $select->where($propiedad.' = ?', $valor);

        $_auth = new Zend_Session_Namespace('veoliaZend_Auth');
        $id = $_auth->usuario_id;

        $select->where('usuario = ?', $id);
		$result = $db->fetchRow($select);
        $this->_perezoso = false;
		return $this->_populate($result);
	}

    public function getProgresoPorSeccion($solucion, $seccion) {

    	if ($seccion == NULL || $seccion == '' || $solucion == NULL || $solucion == '') {
			return;
    	}

		$secciones = array(
			'1' => array('1','2','3','4','5'), 					//Datos Generales
			'2' => array('26','27','28','29','30','31'), 	//Datos del proponente
			'3' => array('6','7', '8', '9', '10', '11', '12'),	//Solución
			'4' => array('13', '14', '15', '16', '17', '18'), 	//Metodología
			'5' => array('19'), 									//Presupuesto
			'6' => array('20','21'), 							//Capacidad
			'7' => array('22','23','24','25')					//Propiedad intelectual
			);

		$iaeDB = Reto_Model_ItemaevaluarMapper::getInstance();
		$items = $iaeDB->getItems($secciones[$seccion]);

		$progresoEsperado = count($items);

		$isol = 0;
		$itabla = 0;
		$icustom = 0;
		$evalitem = "";
		$evaltabla = "";

		foreach ($items as $key => $item) {
			if ($item['tabla'] == "ve_solucionadores") {
				if ($isol != 0) {
					$evalitem .= "+";
				}
				$evalitem .= " IF(ISNULL(NULLIF(".$item['columna'].",'')),0,1) ";

				$isol += 1;

			} else if($item['tabla'] == "otratabla") {
				if ($itabla > 0) {
					$evaltabla .= " + ";
				}

				$evaltabla .= "(
					SELECT 	IF(COUNT(*)=0,0,1)
						FROM
						".$item['columna']."
						WHERE
						solucionador = ".$solucion."
					)";

				$itabla += 1;

			} else if($item['tabla'] == "vistacustom") {
				if ($icustom != 0 OR $isol != 0) {
					$evalitem .= " + ";
				}
 				if ($item['columna'] == "madurezsolucion"){
 					$evalitem .= " IF(ISNULL(NULLIF(estadodemadurez,'')),0,1) ";
 				} else if ($item['columna'] == "diagramasolucion") {
 					$evalitem .= " IF(ISNULL(NULLIF(diagramasolucion,'')),0,1) ";
 				} else if ($item['columna'] == "planteamientopresupuestal") {
 					$progresoEsperado += 6;
 					$evalitem .= " IF(ISNULL(NULLIF(personal,'')),0,1) ";
					$evalitem .= "+ IF(ISNULL(NULLIF(serviciotecnico,'')),0,1) ";
					$evalitem .= "+ IF(ISNULL(NULLIF(equipos,'')),0,1) ";
					$evalitem .= "+ IF(ISNULL(NULLIF(software,'')),0,1) ";
					$evalitem .= "+ IF(ISNULL(NULLIF(materialeseinsumos,'')),0,1) ";
					$evalitem .= "+ IF(ISNULL(NULLIF(viajes,'')),0,1) ";
					$evalitem .= "+ IF(ISNULL(NULLIF(otrosrubros,'')),0,1) ";
 				} else if ($item['columna'] == "esprotegida") {
 					$evalitem .= " IF(propiedadintelectual=1 AND !ISNULL(descripcionpropiedadintelecual),1,0) ";
 					//$evalitem .= "+ IF(ISNULL(NULLIF(descripcionpropiedadintelecual,'')),0,1) ";
 				} else if ($item['columna'] == "tienepolitica") {
 					$evalitem .= " IF(politicapropiedadintelectual=1 AND !ISNULL(descripcionpoliticapropiedadintelecual),1,0) ";
 					// $evalitem .= "+ IF(,0,1) ";
 				} else if ($item['columna'] == "elautoresproponente") {
 					$evalitem .= " IF(autenticidad=0 AND !ISNULL(descripcionautorpropiedad),1,0) ";
 					// $evalitem .= "+ IF(ISNULL(NULLIF(descripcionautorpropiedad,'')),0,1) ";
 				} else if ($item['columna'] == "exposiciondelasolucion") {
 					$progresoEsperado += 3;
 					$evalitem .= " IF(ISNULL(NULLIF(cuando,'')),0,1) ";
					$evalitem .= "+ IF(ISNULL(NULLIF(conquien,'')),0,1) ";
					$evalitem .= "+ IF(ISNULL(NULLIF(presentacionpublica,'')),0,1) ";
					$evalitem .= "+ IF(ISNULL(NULLIF(acuerdoconfidencialidadconautor,'')),0,1) ";
 				}

				$icustom += 1;
			}
		}

		$query = "";
		if ($evalitem != "" OR $evaltabla != "") {

			$query = " SELECT ";

			if ($isol > 0 OR $icustom > 0) {
				$query .= "(SELECT
						  (".$evalitem." + 0) AS conteo
						FROM ve_solucionadores
						WHERE solucionadores_id = ".$solucion.")";
			}

			if ($evaltabla != "") {
				$query .= "	+ ";
			}

			$query .= $evaltabla;
			$query .= " AS total ";

		}

		$progreso = 0;


		if ($query != "") {

			$db = $this->getDb();
			$rst = $db->query($query);
			$res = $rst->fetch();

			$progreso = $res['total'];
		}
		$varprogreso = $progresoEsperado > 0 ? (($progreso * 100) / $progresoEsperado):  0;
		return array("query"=> $query,
					"progreso" => $varprogreso,
					"progresoEsperado" => $progresoEsperado,
					"conteo" => $progreso,
					"seccion" => $seccion);

    }

}
