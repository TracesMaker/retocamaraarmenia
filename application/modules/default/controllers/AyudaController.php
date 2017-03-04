<?php

class AyudaController extends Zend_Controller_Action
{

	public function init()
	{
	}

	public function indexAction()
	{
		$auth = new Zend_Session_Namespace('veoliaZend_Auth');	
		$rol = Zend_Registry::get('role');
		include('pdf/mpdf.php');
		$mpdf = new mPDF('c','A4','','1',32,25,27,25,16,13);
		$mpdf->mirrorMargins = 0;
		$mpdf->setFooter('{PAGENO}');
		$mpdf->AddPage('','','','','on');
		$mpdf->WriteHTML($this->view->render('ayuda/head.phtml'));
		$tablacontenido = '<tocpagebreak paging="on" links="on" toc-odd-header-name="html_tocHTMLHeader" toc-even-headr-name="html_tocHTMLHeaderEven" toc-odd-footer-name="html_tocHTMLFooter" toc-even-footr-name="html_tocHTMLFooterEven" toc-odd-header-value="on" toc-even-header-value="on" toc-odd-footr-value="on" toc-even-footer-value="on" toc-preHTML="&lt;h2&gt;Tabla de Contenido&lt;/h2&gt;" tocbookmarkText="Content list" resetpagenum="1" pagenumstyle="1" odd-header-name="html_myHTMLHeader" oddheader-value="on" even-header-name="html_myHTMLHeaderEven" even-header-value="ON" odd-foote-
-name="html_myHTMLFooter" odd-footer-value="on" even-footer-name="html_myHTMLFooterEven" even-foote-
-value="on" outdent="2em" />';
		$mpdf->AddPage('','','1','1','off');
		$mpdf->WriteHTML($tablacontenido);
		$mpdf->h2toc = array('H1'=>0,'H3'=>2);
		$mpdf->h2bookmarks = array('H1'=>0,'H3'=>2);
		$contenido = $this->view->render('ayuda/body.phtml');
		$mpdf->WriteHTML($contenido,2);
		$lista = '';
		$html = '';
		$mpdf->WriteHTML('<ul>'.$lista.'</ul>');
		$mpdf->WriteHTML($html);
		$mpdf->h2toc = array();
		$mpdf->h2bookmarks = array();		
		$mpdf->AddPage('','','','','on');
		$mpdf->WriteHTML($this->view->render('ayuda/footer.phtml'));
		$mpdf->Output();
		exit;
	}
	
}

