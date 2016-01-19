<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Landing extends MY_controller {
	/**
     * Call to CI_controller constructor
     */
    function __construct() {
        parent::__construct();
    }

    public function index( $landing_page = NULL ) {

    	$landing_pages = array('bioplus', 'entrenador', 'sucrance', 'promelite', 'argel', 'dynoral', 'inufib', 'osteoferol', 'cados', 'prevescar', 'nitrozin');

    	if( isset($landing_page) && in_array($landing_page, $landing_pages) ) {
    		$data = array();
    		$data['landing_resources_url'] = '/assets/landing_resources/'.$landing_page.'/';

    		$this->load->view('landing_pages/'.$landing_page.'/index', $data);
    	}else{
    		show_404();
    	}

    }
}


?>
